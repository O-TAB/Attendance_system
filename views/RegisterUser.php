<?php ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4">Criar conta</h2>

            <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Telefone (DDD + número) *</label>
                    <input type="text" name="telefone" class="form-control" required maxlength="11" minlength="11"
                        value="<?=$userModel->Getf_HTML('telefone') ?>"
                        pattern="[0-9]{11}" title="Digite o número com DDD (11 dígitos)">
                    <small class="text-muted">Exemplo: 11999999999 (11 dígitos)</small>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="admin" id="adminSwitch" value="1">
                    <label class="form-check-label" for="adminSwitch">Usuário Administrador</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
                <div class="text-center mt-3">
                    <a href="login.php">Voltar ao login</a>
                </div>
            </form>
        </div>
    </div>
</div>