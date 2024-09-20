CREATE DATABASE horarios_db;

USE horarios_db;

CREATE TABLE imagenes_horario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    momento VARCHAR(20) NOT NULL,  -- Momento del día (mañana, tarde, noche)
    imagen VARCHAR(255) NOT NULL   -- Nombre del archivo de la imagen
);

-- Insertar los nombres de las imágenes correspondientes a cada momento del día
INSERT INTO imagenes_horario (momento, imagen)
VALUES
('mañana', 'buenos_dias.jpg'),
('tarde', 'buenas_tardes.jpg'),
('noche', 'buenas_noches.jpg');
