create database market
    DEFAULT CHARACTER SET utf8;
use market;
create table usuarios(
		id int NOT NULL UNIQUE AUTO_INCREMENT,
		nombre varchar(100) NOT NULL UNIQUE,
		email varchar(255) NOT NULL UNIQUE,
		clave varchar(255) NOT NULL,
		fecha_registro DATETIME NOT NULL,
		activo tinyint NOT NULL,
		primary key(id)
);

CREATE TABLE entradas (
        id INT NOT NULL UNIQUE AUTO_INCREMENT,
        autor_id int not null,
        url VARCHAR(255) NOT NULL UNIQUE,
        titulo varchar(255) not null unique,
        valor INT NOT NULL,
        texto TEXT character set utf8 not null,
        fecha DATETIME not null,
        activa TINYINT not null,
        PRIMARY KEY(id),
        FOREIGN KEY(autor_id) references usuarios(id)
        on update cascade
        on delete restrict
);

CREATE TABLE comentarios (
        id int not null unique auto_increment,
        autor_id int not null,
        entrada_id int not null,
        titulo varchar(255) not null,
        texto TEXT character set utf8 not null,
        fecha DATETIME not null,
        primary key(id),
        foreign key(autor_id) references usuarios(id)
            on update cascade
            on delete restrict,
        foreign key(entrada_id) references entradas(id)
            on update cascade
            on delete restrict
);

CREATE TABLE recuperacion_clave (
        id int not null unique auto_increment,
        usuario_id int not null,
        url_secreta varchar(255) not null,
        fecha datetime not null,
        primary key(id),
        foreign key(usuario_id) references usuarios(id)
            on update cascade 
            on delete restrict
);

CREATE TABLE perfil (
        id INT NOT NULL UNIQUE AUTO_INCREMENT,
        usuario_id int not null,
        celular varchar(20),
        facebook varchar(200),
        twitter varchar(200),
        instagram varchar(200),
        PRIMARY KEY(id),        
        foreign key(usuario_id) references usuarios(id)
        on update cascade
        on delete restrict
);