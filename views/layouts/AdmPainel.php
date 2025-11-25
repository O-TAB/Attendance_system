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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
    /* Highlighted nav items */
    .navbar .nav-link {
        padding: .45rem .8rem;
        border-radius: .45rem;
        font-weight: 600;
        color: #0456d5;
        transition: transform .15s ease, box-shadow .15s ease, background .15s;
    }
    .navbar .nav-link:hover {
        transform: translateY(-3px);
        background: rgba(43,140,246,0.06);
        box-shadow: 0 6px 12px rgba(11,88,203,0.06);
    }
    .navbar .nav-link.active {
        color: #fff !important;
        background: linear-gradient(90deg,#2b8cf6,#2bc3a3);
        box-shadow: 0 6px 20px rgba(43,140,246,0.18);
    }
    .navbar .nav-item + .nav-item { margin-left: .4rem; }
    .navbar .bi { vertical-align: -.125em; }
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
                    <li class="nav-item"><a class="nav-link <?= ($_CURRENTPATH === '/' ) ? 'active' : '' ?>" href="<?= $_URLPATH?>/"><i class="bi bi-house-door-fill me-1"></i>Início</a></li>
                    <li class="nav-item"><a class="nav-link <?= strpos($_CURRENTPATH, '/cadastro') === 0 ? 'active' : '' ?>"            href="<?= $_URLPATH?>/cadastro"><i class="bi bi-person-plus me-1"></i>Cadastro</a></li>
                    <li class="nav-item"><a class="nav-link <?= strpos($_CURRENTPATH, '/alunos') === 0 ? 'active' : '' ?>"              href="<?= $_URLPATH?>/alunos"><i class="bi bi-people-fill me-1"></i>Alunos</a></li>
                    <li class="nav-item"><a class="nav-link <?= strpos($_CURRENTPATH, '/justificativas') === 0 ? 'active' : '' ?>"      href="<?= $_URLPATH?>/justificativas"><i class="bi bi-check2-square me-1"></i>Justificativas</a></li>
                    <li class="nav-item"><a class="nav-link <?= strpos($_CURRENTPATH, '/relatorios') === 0 ? 'active' : '' ?>"          href="<?= $_URLPATH?>/relatorios"><i class="bi bi-file-earmark-text me-1"></i>Relatório</a></li>
                    <li class="nav-item"><a class="nav-link <?= strpos($_CURRENTPATH, '/usuarios') === 0 ? 'active' : '' ?>"            href="<?= $_URLPATH?>/usuarios/create"><i class="bi bi-person-badge me-1"></i>Cadastrar usuário</a></li>
                </ul>

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
                                <li><a class="dropdown-item" href="perfil.php">Configurações</a></li>
                                <!-- <li><hr class="dropdown-divider"></li> -->
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

    <div class="container mt-4">
        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>