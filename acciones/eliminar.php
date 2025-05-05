<?php
session_start();
require_once '../database/pokedb.php';

if (isset($_GET['id'])) {
    $database = new PokeDB();
    $database->queryParametros(
        "DELETE FROM pokemons WHERE numero = ?",
        [$_GET['id']]
    );
}

header("Location: ../index.php");
exit;
?>