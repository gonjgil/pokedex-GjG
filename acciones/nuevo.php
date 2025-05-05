<?php
session_start();
require_once '../database/pokedb.php';

$database = new PokeDB();

try {    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuario'])) {
        $datos = [
            $_POST['numero'],
            $_POST['nombre'],
            $_POST['tipo1'],
            !empty($_POST['tipo2']) ? $_POST['tipo2'] : null,
            $_POST['descripcion']
        ];

        $consulta = $database->queryParametros(
            "INSERT INTO pokemons (numero, nombre, tipo1, tipo2, descripcion) VALUES (?, ?, ?, ?, ?)",
            $datos
        );
        
        header("Location: ../index.php");
        exit;
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

require_once '../includes/header.php';
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Nuevo Pokémon</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="./nuevo.php">
                <div class="mb-3">
                    <label class="form-label">Número</label>
                    <input type="number" name="numero" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo Principal</label>
                    <input type="text" name="tipo1" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo Secundario (opcional)</label>
                    <input type="text" name="tipo2" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Guardar Pokémon</button>
            </form>
        </div>
    </div>
</div>