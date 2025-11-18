
function validarIdade(input) {
    const dataNascimento = new Date(input.value);
    const hoje = new Date();
    let idade = hoje.getFullYear() - dataNascimento.getFullYear();
    const mes = hoje.getMonth() - dataNascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    const responsavelObrigatorio = document.getElementById('responsavelObrigatorio');
    const responsavelInfo = document.getElementById('responsavelInfo');
    const nomeResponsavel = document.getElementById('nomeResponsavel');

    if (idade < 18) {
        responsavelObrigatorio.style.display = 'inline';
        responsavelInfo.style.display = 'block';
        nomeResponsavel.required = true;
    } else {
        responsavelObrigatorio.style.display = 'none';
        responsavelInfo.style.display = 'none';
        nomeResponsavel.required = false;
    }

    // Atualiza as turmas disponíveis baseado na idade
    const turmasContainer = document.querySelector('#turmas-container');
    const turmasValidas = turmas.filter(turma => {
        return idade >= turma.idade_min && idade <= turma.idade_max;
    });

    // Limpa o container antes de adicionar as novas turmas
    turmasContainer.innerHTML = '';

    if (turmasValidas.length === 0) {
        turmasContainer.innerHTML =
            '<div class="alert alert-warning">Nenhuma turma disponível para a idade informada.</div>';
    } else {
        // Usa um Set para garantir que não haja duplicatas
        const turmasUnicas = new Set();

        turmasValidas.forEach(turma => {
            // Cria uma chave única para cada turma incluindo o dia da semana
            const turmaKey =
                `${turma.id}-${turma.nome}-${turma.faixa_etaria}-${turma.horario}-${turma.dia_sem}`;

            // Só adiciona se ainda não existir
            if (!turmasUnicas.has(turmaKey)) {
                turmasUnicas.add(turmaKey);

                const div = document.createElement('div');
                div.classList.add('form-check', 'mb-2');

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'turmas[]';
                checkbox.value = turma.id;
                checkbox.id = 'turma_' + turma.id;
                checkbox.classList.add('form-check-input');

                const label = document.createElement('label');
                label.htmlFor = 'turma_' + turma.id;
                label.classList.add('form-check-label');
                label.textContent =
                    `${turma.nome} - ${turma.faixa_etaria} - ${turma.dia_sem} - ${turma.horario}`;

                div.appendChild(checkbox);
                div.appendChild(label);
                turmasContainer.appendChild(div);
            }
        });
    }
}

// Validação do telefone
const telefoneInput = document.querySelector('input[name="telefone"]');
telefoneInput.addEventListener('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});

// Validação do formulário antes do envio
document.getElementById('formCadastro').addEventListener('submit', function(e) {
    const telefone = telefoneInput.value.replace(/[^0-9]/g, '');
    if (telefone.length !== 11) {
        e.preventDefault();
        alert('O número de telefone deve conter exatamente 11 dígitos (DDD + número).');
        return false;
    }

    const dataNascimento = new Date(document.querySelector('input[name="data_nascimento"]').value);
    const hoje = new Date();
    let idade = hoje.getFullYear() - dataNascimento.getFullYear();
    const mes = hoje.getMonth() - dataNascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    if (idade < 18 && !document.querySelector('input[name="nome_responsavel"]').value.trim()) {
        e.preventDefault();
        alert('Para alunos menores de 18 anos, o nome do responsável é obrigatório.');
        return false;
    }
});

const dataNascimentoInput = document.querySelector('input[name="data_nascimento"]');
const turmasContainer = document.querySelector('#turmas-container');
//const turmas = <?php echo json_encode($turmas, JSON_UNESCAPED_UNICODE); ?>;

// Remove a chamada duplicada do evento change
dataNascimentoInput.addEventListener('change', function() {
    validarIdade(this);
});
document.addEventListener('DOMContentLoaded', function() {
    validarIdade(dataNascimentoInput);
});
