<?php
session_start();
require_once '../database/pokedb.php';

$database = new PokeDB();
$login_error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'], $_POST['contrasenia'])) {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    
    $encontrado = $database->query("SELECT * FROM usuarios WHERE usuario = '$usuario' LIMIT 1");
    
    if (!empty($encontrado) && $contrasenia === $encontrado[0]['contrasenia']) {
        $_SESSION['usuario'] = $encontrado[0]['usuario'];
        header("Location: ../index.php");
        exit;
    }else {
        $login_error = true;
    }
}

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: ../index.php");
    die();
}

if ($login_error) {
    $_SESSION['login_error'] = true;
    header("Location: ../index.php");
    exit;
}

?>