<?php //<?php if (isset($_SESSION['usuario']['admin']) && $_SESSION['usuario']['admin']): ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagiana principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
    .hoje {
        background-color: #e9f7ef !important;
    }
    </style>
</head>

<body>
    <div class="card p-3 mb-4 shadow-sm">
        <div class="d-flex flex-wrap gap-3">

            <!-- visualizar versção antiga depois pois ha uma logica de acesso aqui -->
            
            <!-- Botões para administradores -->
            <a href="listar_alunos.php" class="btn btn-secondary">👥 Ver Lista de Alunos</a>
            <a href="cadastrar_aluno.php" class="btn btn-success">➕ Cadastrar Novo Aluno</a>
            <a href="relatoriogeral.php" class="btn btn-info">📊 Relatório Geral por Aluno</a>
            <a href="visualizar_chamadas.php" class="btn btn-warning">📑 Visualizar Chamadas</a>
            <a href="listar_modalidades.php" class="btn btn-danger">🎯 Gerenciar Modalidades</a>
            <a href="listar_turmas.php" class="btn btn-primary">📋 Gerenciar Turmas</a>
            
        </div>
    </div>

    {{content}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>