CREATE TABLE IF NOT EXISTS categoria(
	id_categoria INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    descripcion VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_categoria)
);

CREATE TABLE IF NOT EXISTS libro(
	id_libro INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(20) NOT NULL,
    isbn INT NOT NULL,
    id_categoria INT NOT NULL,
    PRIMARY KEY (id_libro),
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)
);