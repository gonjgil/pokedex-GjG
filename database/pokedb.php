<?php
class PokeDB {

    private $connection;
    
    public function __construct() {
        
        $config = parse_ini_file('connection.ini');
        
        $this->connection = new MySqli(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['db']);
        }
        
    public function __destruct() {
        $this->connection->close();
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        $datos = $this->connection->query($sql);
        return $datos->fetch_all(MYSQLI_ASSOC);
    }

    public function queryParametros($sql, $parametros = []) {
        $consulta = $this->connection->prepare($sql);
        if (!empty($parametros)) {
            $tipo = str_repeat('s', count($parametros));
            $consulta->bind_param($tipo, ...$parametros);
        }
        $consulta->execute();
        return $consulta;
    }
 }

?>