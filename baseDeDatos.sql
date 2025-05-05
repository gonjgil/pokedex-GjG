DROP DATABASE pokedex;

CREATE DATABASE IF NOT EXISTS pokedex;

USE pokedex;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, contrasenia) VALUES
('admin', '1234');

CREATE TABLE IF NOT EXISTS tipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) UNIQUE NOT NULL
);

INSERT INTO tipos (nombre) VALUES
('Normal'),
('Fuego'),
('Agua'),
('Eléctrico'),
('Planta'),
('Hielo'),
('Lucha'),
('Veneno'),
('Tierra'),
('Volador'),
('Psíquico'),
('Bicho'),
('Roca'),
('Fantasma'),
('Dragón');

CREATE TABLE IF NOT EXISTS pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero INT UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    tipo1 VARCHAR(10) NOT NULL,
    tipo2 VARCHAR(10),
    descripcion VARCHAR(255) NOT NULL,
    imagen VARCHAR(255),
    FOREIGN KEY (tipo1) REFERENCES tipos(nombre),
    FOREIGN KEY (tipo2) REFERENCES tipos(nombre)
);

INSERT INTO pokemons (numero, nombre, tipo1, tipo2, descripcion, imagen) VALUES
(1, 'Bulbasaur', 'Planta', 'Veneno', 'Este Pokémon tiene una planta bulbosa en su lomo que crece con él desde su nacimiento.', 'imagenes/pokemons/1.png'),
(2, 'Ivysaur', 'Planta', 'Veneno', 'El bulbo en su lomo crece más grande y muestra signos de una futura floración.', 'imagenes/pokemons/2.png'),
(3, 'Venusaur', 'Planta', 'Veneno', 'La flor en su lomo libera un dulce aroma que atrae a otros Pokémon.', 'imagenes/pokemons/3.png'),
(4, 'Charmander', 'Fuego', NULL, 'La llama en su cola muestra la fuerza vital de este Pokémon.', 'imagenes/pokemons/4.png'),
(5, 'Charmeleon', 'Fuego', NULL, 'Este Pokémon se vuelve agresivo en batalla, usando sus afiladas garras.', 'imagenes/pokemons/5.png'),
(6, 'Charizard', 'Fuego', 'Volador', 'Vuela por los cielos buscando oponentes poderosos para enfrentarse a ellos.', 'imagenes/pokemons/6.png'),
(7, 'Squirtle', 'Agua', NULL, 'Retrae su largo cuello en el caparazón para lanzar poderosos ataques de agua.', 'imagenes/pokemons/7.png'),
(8, 'Wartortle', 'Agua', NULL, 'Es reconocido como símbolo de longevidad por las marcas en su caparazón.', 'imagenes/pokemons/8.png'),
(9, 'Blastoise', 'Agua', NULL, 'Los chorros de agua que dispara pueden perforar hasta el acero.', 'imagenes/pokemons/9.png');