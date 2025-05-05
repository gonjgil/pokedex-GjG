<?php
session_start();
require_once 'includes/header.php';
require_once 'database/pokedb.php';
$database = new PokeDB();
require_once 'database/buscar_pokemon.php';
?>

<div class="container mt-4">
    <form method="POST" class="d-flex mb-4">
        <input type="text" name="search" class="form-control me-2"
            placeholder="<?= (isset($vacia) && $vacia) ? 'Pokémon inexistente' : 'Ingrese nombre, tipo o número' ?>">
        <button type="submit" class="btn btn-primary">¿Quién es este Pokémon?</button>
    </form>

    <?php
    $pokemons = !empty($encontrados) ? $encontrados : $database->query("SELECT * FROM pokemons");
    require_once 'tabla.php';
    ?>

    <?php if (isset($_SESSION['usuario'])): ?>
        <div class="d-grid mt-3">
            <a href="acciones/nuevo.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Pokémon
            </a>
        </div>
    <?php endif; ?>
</div>