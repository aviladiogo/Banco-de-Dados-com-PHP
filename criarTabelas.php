<?php
$users = 'CREATE TABLE users (
    CPF VARCHAR(11) NOT NULL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    ordered VARCHAR(50),
    payment VARCHAR(50) NOT NULL,
    adress VARCHAR(50) NOT NULL,
    deliveryid INT(3)
)';

$entregador = 'CREATE TABLE entregador (
    ID SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    idpedido INT(11),
    nota INT(3)
)';

$restaurantes = 'CREATE TABLE restaurantes (
    ID SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    openhour TIME NOT NULL,
    closehour TIME NOT NULL,
    idpedido INT(11),
    nota INT(3),
    adress VARCHAR(50) NOT NULL,
)';

$pedido = 'CREATE TABLE pedido (
    id SERIAL PRIMARY KEY,
    payment INT(3),
    timeouti TIME,
    timein TIME,
    agendamento BOOLEAN,
    dia DATE,
    iduser INT(3),
    FOREIGN KEY (iduser) REFERENCES users(id)
    idrestaurante INT(3);
    FOREIGN KEY (idrestaurante) REFERENCES users(id)
    adress TEXT,
    prato VARCHAR(50) NOT NULL,
)';

?>