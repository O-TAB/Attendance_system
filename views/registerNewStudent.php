<?php ?>

<style>
    body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }

    .notebook-card {
        background: linear-gradient(135deg, #ffd89b 0%, #ffeaa7 100%);
        border: 3px solid #ffc107;
        border-radius: 8px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    
    .notebook-header {
        background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
        color: white;
        font-weight: bold;
        border-radius: 5px 5px 0 0;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    
    .notebook-body {
        background: linear-gradient(
            90deg,
            transparent 2%,
            rgba(200,200,200,0.08) 2%,
            rgba(200,200,200,0.08) 2.2%,
            transparent 2.2%
        );
        background-size: 100% 28px;
    }
    
    .form-step {
        display: none;
    }
    
    .form-step.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .form-control {
        background: rgba(255,255,255,0.8);
        border: 2px solid #ffc107;
    }
    
    .form-control:focus {
        background: white;
        border-color: #ff6b6b;
        box-shadow: 0 0 0 0.2rem rgba(255,107,107,0.25);
    }
    
    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .notebook-spine {
        position: absolute;
        left: 5px;
        top: 0;
        bottom: 0;
        width: 4px;
        background: repeating-linear-gradient(
            0deg,
            #333 0px,
            #333 8px,
            transparent 8px,
            transparent 12px
        );
        opacity: 0.3;
    }
</style>

<a href="/" class="btn btn-warning btn-sm mb-4">← Voltar</a>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card notebook-card">
            <div class="notebook-spine"></div>
            <div class="card-header notebook-header">
                <h5 class="mb-0">📝 Registro de Aluno</h5>
            </div>

            <?php if (isset($erro)): ?>
            <div class="alert alert-danger m-3 mb-0">
                ❌ <?= htmlspecialchars($erro) ?>
            </div>
            <?php endif; ?>

            <div class="card-body notebook-body">

                <form method="POST" id="formCadastro">
                    <div class="form-step active" id="step-1">
                        <h6 class="mb-3" style="color: #333; font-weight: 700;">👤 Dados Pessoais</h6>
                        <div class="mb-3">
                            <label class="form-label" style="color: #333; font-weight: 600;">Nome Completo *</label>
                            <input type="text" name="nome_completo" class="form-control" required
                                placeholder="Ex: João Silva"
                                value="<?= isset($_POST['nome_completo']) ? htmlspecialchars($_POST['nome_completo']) : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="color: #333; font-weight: 600;">Data de Nascimento *</label>
                            <input type="date" name="data_nascimento" class="form-control" required
                                value="<?= isset($_POST['data_nascimento']) ? htmlspecialchars($_POST['data_nascimento']) : '' ?>">
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-warning ms-auto" onclick="nextStep()">Próximo →</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

