<?php ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Cadastro de Aluno</h2>
            <a href="index.php" class="btn btn-outline-primary">← Voltar para o Painel</a>
        </div>

        <?php if (isset($erro)): ?>
        <div class="alert alert-danger">❌ <?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" class="card p-4 shadow-sm bg-white rounded" id="formCadastro">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nome completo *</label>
                    <input type="text" name="nome_completo" class="form-control" required
                        value="<?= isset($_POST['nome_completo']) ? htmlspecialchars($_POST['nome_completo']) : '' ?>">
                </div>
                <div class="col-md-6">
                    <label>Nome social</label>
                    <input type="text" name="nome_social" class="form-control"
                        value="<?= isset($_POST['nome_social']) ? htmlspecialchars($_POST['nome_social']) : '' ?>">
                </div>
                <div class="col-md-4">
                    <label>Data de nascimento *</label>
                    <input type="date" name="data_nascimento" class="form-control" required
                        value="<?= isset($_POST['data_nascimento']) ? htmlspecialchars($_POST['data_nascimento']) : '' ?>"
                        onchange="validarIdade(this)">
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
            </div>
        </form>
    </div>