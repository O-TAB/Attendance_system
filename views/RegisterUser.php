<?php ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4">Criar conta</h2>

            <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= isset($userModel) ? $userModel->Getf_HTML('nome') : '' ?>" required>
                </div>
                <div class="mb-3">
                    <label>Telefone (DDD + número) *</label>
                    <input type="text" name="telefone" class="form-control" required maxlength="11" minlength="11"
                        value="<?= isset($userModel) ? $userModel->Getf_HTML('telefone') : '' ?>"
                        pattern="[0-9]{11}" title="Digite o número com DDD (11 dígitos)">
                    <small class="text-muted">Exemplo: 11999999999 (11 dígitos)</small>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= isset($userModel) ? $userModel->Getf_HTML('email') : '' ?>"
                    required>
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" value="<?= isset($userModel) ? $userModel->Getf_HTML('senha') : '' ?>"
                    required>
                </div>
                <div class="mb-3">
                    <label for="tipo_usuario" class="form-label">Modalidade *</label>
                    <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                        <option value="">Selecione uma modalidade</option>
                        <option value="ADM"        >Usuário administrador</option>
                        <option value="Responsavel">Usuário Responsavel</option>
                        <option value="Professor"  >Professor</option> 
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione uma modalidade.
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
                <div class="text-center mt-3">
                    <a href= "<?= $_URLPATH?>">Voltar ao login</a>
                </div>
            </form>
        </div>
    </div>
</div>