<?php
$busqueda = '';
$encontrados = [];

if (isset($_POST['search'])) {
    $busqueda = $_POST['search'];
    
    if (!empty($busqueda)) {
        $query = "SELECT * FROM pokemons 
                 WHERE numero = ? 
                 OR nombre LIKE LOWER(?)
                 OR tipo1 LIKE LOWER(?)
                 OR tipo2 LIKE LOWER(?)"; 
        $consulta = $database->getConnection()->prepare($query);
        $busqueda_parcial = "%$busqueda%";
        $consulta->bind_param('isss', $busqueda, $busqueda_parcial, $busqueda_parcial, $busqueda_parcial);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $encontrados = $resultado->fetch_all(MYSQLI_ASSOC);

        $vacia = empty($encontrados) && !empty($busqueda);
    }
}

?>