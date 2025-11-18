<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Chamadas - Modalidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
    .hoje {
        background-color: #e9f7ef !important;
    }
    .brand-badge {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: 700;
        color: #fff;
        background: linear-gradient(135deg,#2b8cf6,#2bc3a3);
        box-shadow: 0 2px 6px rgba(43,140,246,0.18);
        margin-right: 10px;
    }
    .nav-small { font-size: .95rem; }
    </style>
</head>

<body class="bg-light">

    <!-- Main navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <div class="brand-badge">📋</div>
                <div class="d-flex flex-column">
                    <span class="fw-bold">Sistema Noah</span>
                    <small class="text-muted">Painel administrativo</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-small">
                    <li class="nav-item"><a class="nav-link" href="">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Cadastro</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Alunos</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Validar justificativas</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Relatorio de faltas</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Cadastrar usuário</a></li>
                </ul>

                <form class="d-flex me-3" role="search" action="buscar.php" method="get">
                    <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Pesquisar turmas, alunos..."
                        aria-label="Search">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Buscar</button>
                </form>

                <div class="d-flex align-items-center">
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <?php $username = $_SESSION['usuario']['username'] ?? 'Usuário';
                              $initial = strtoupper(substr($username, 0, 1)); ?>
                        <div class="dropdown">
                            <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="brand-badge me-2" style="width:36px;height:36px;padding:0;">
                                    <?php echo htmlspecialchars($initial); ?>
                                </div>
                                <strong><?php echo htmlspecialchars($username); ?></strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-primary btn-sm">Entrar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Secondary toolbar for quick actions (visible to admins) -->
    <?php if (isset($_SESSION['usuario']['admin']) && $_SESSION['usuario']['admin']): ?>
    <div class="bg-white border-bottom">
        <div class="container py-2 d-flex gap-2 flex-wrap">
            <a class="btn btn-sm btn-secondary" href="listar_alunos.php">👥 Alunos</a>
            <a class="btn btn-sm btn-success" href="cadastrar_aluno.php">➕ Novo Aluno</a>
            <a class="btn btn-sm btn-info" href="relatoriogeral.php">📊 Relatórios</a>
            <a class="btn btn-sm btn-warning" href="visualizar_chamadas.php">📑 Chamadas</a>
            <a class="btn btn-sm btn-danger" href="listar_modalidades.php">🎯 Modalidades</a>
            <a class="btn btn-sm btn-primary" href="listar_turmas.php">📋 Turmas</a>
        </div>
    </div>
    <?php endif; ?>

    <div class="container mt-4">
        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>