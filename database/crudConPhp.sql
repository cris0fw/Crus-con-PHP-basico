create database crudConPhp;

use crudConPhp

/* Esta es la base de datos que usare para hacer la CRUD */
create table tareas (
    idTareas integer(10) primary key AUTO_INCREMENT,
    titulo varchar(100) not null,
    descripcion text(255) not null,
    creacion timestamp not null default CURRENT_TIMESTAMP
)