<?php
session_start();
require_once 'database/pokedb.php';

$database = new PokeDB();

$consulta = $database->queryParametros(
    "SELECT * FROM pokemons WHERE id = ? LIMIT 1",
    [$_GET['id']]
);

if (!$consulta) {
    die("Error en la consulta");
}

$resultado = $consulta->get_result();
$pokemon = $resultado->fetch_assoc();
$imagen_grande = str_replace('imagenes/pokemons/', 'imagenes/pokemons/grandes/', $pokemon['imagen']);

if (!$pokemon) {
    header("Location: index.php");
    exit;
}

require_once 'includes/header.php';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 text-center">
        <img src="<?= $imagen_grande ?>" alt="<?= $pokemon['nombre'] ?>" class="img-fluid" style="max-width: 400px;">
        </div>
        
        <div class="col-md-6">
            <div class="d-flex mb-4">
                <img src="imagenes/tipos/<?= strtolower($pokemon['tipo1']) ?>.svg" alt="<?= $pokemon['tipo1'] ?>" class="me-2" style="height: 40px;">
                <?php if ($pokemon['tipo2']): ?>
                    <img src="imagenes/tipos/<?= strtolower($pokemon['tipo2']) ?>.svg" alt="<?= $pokemon['tipo2'] ?>" style="height: 40px;">
                <?php endif; ?>
            </div>
            
            <h1 class="display-4 mb-3"><?= $pokemon['nombre'] ?></h1>
            <h2 class="text-muted mb-4">#<?= str_pad($pokemon['numero'], 3, '0', STR_PAD_LEFT) ?></h2>
            
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title h4">Descripción</h2>
                    <p class="card-text"><?= $pokemon['descripcion'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>