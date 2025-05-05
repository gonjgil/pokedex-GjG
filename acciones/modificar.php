<?php
session_start();
require_once '../database/pokedb.php';
$database = new PokeDB();

$pokemon = null;

if (isset($_GET['id'])) {
    $consulta = $database->queryParametros(
        "SELECT * FROM pokemons WHERE numero = ? LIMIT 1",
        [$_GET['id']]
    );
    $resultado = $consulta->get_result();
    $pokemon = $resultado->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuario'])) {
    $datos = [
        $_POST['nombre'],
        $_POST['tipo1'],
        !empty($_POST['tipo2']) ? $_POST['tipo2'] : null,
        $_POST['numero']
    ];

    $database->queryParametros(
        "UPDATE pokemons SET nombre = ?, tipo1 = ?, tipo2 = ? WHERE numero = ?",
        $datos
    );

    header("Location: ../index.php");
    exit;
}

require_once '../includes/header.php';
?>

<div class="container mt-4">
    <?php if ($pokemon): ?>
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h2>Modificar Pokémon</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="./modificar.php">
                    <input type="hidden" name="numero" value="<?= $pokemon['numero'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= $pokemon['nombre'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Principal</label>
                        <input type="text" name="tipo1" class="form-control" value="<?= $pokemon['tipo1'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Secundario</label>
                        <input type="text" name="tipo2" class="form-control" value="<?= $pokemon['tipo2'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Pokémon no encontrado</div>
    <?php endif; ?>
</div>