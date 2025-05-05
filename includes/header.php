<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <img src="logo.svg" alt="logo" class="img-fluid" style="max-width: 150px;">
                </div>
                <div class="col-md-8 text-end">
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <span class="me-2">Bienvenido, <?= $_SESSION['usuario'] ?></span>
                            <a href="./login/procesar_login.php?logout=1" class="btn btn-danger btn-sm">Salir</a>
                        </div>
                    <?php else: ?>
                        <form class="d-flex gap-2 justify-content-end" action="./login/procesar_login.php" method="POST">
                            <input type="text" name="usuario" class="form-control form-control-sm" placeholder="<?= isset($_SESSION['login_error']) ? 'Intentar nuevamente' : 'Usuario' ?>" required>
                            <input type="password" name="contrasenia" class="form-control form-control-sm" placeholder="Contraseña" required>
                            <button type="submit" class="btn btn-primary btn-sm">Iniciar</button>
                            <?php
                            if (isset($_SESSION['login_error'])) {
                                unset($_SESSION['login_error']);
                            }
                            ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>