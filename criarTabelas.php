<?php
//clientes
$users = 'CREATE TABLE users (
    CPF VARCHAR(11) NOT NULL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    ordered VARCHAR(50),
    payment VARCHAR(50) NOT NULL,
    adress VARCHAR(50) NOT NULL,
    deliveryid INT(3)
)';
$usersEndereco = 'CREATE TABLE usersEndereco (
    CPF VARCHAR(11) NOT NULL PRIMARY KEY,
    FOREIGN KEY (CPF) REFERENCES users(CPF),
    logradouro VARCHAR(50) NOT NULL,
    complemento VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL
)';

$entregador = 'CREATE TABLE entregador (
    ID SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    nota INT(3),
    localizacao VARCHAR(50),
    idpedido INT(3),
    FOREIGN KEY (idpedido) REFERENCES pedido(id)
)';

$restaurantes = 'CREATE TABLE restaurantes (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    openhour TIME,
    closehour TIME,
    nota INT(3),
    adress INT(3),
    FOREIGN KEY (adress) REFERENCES usersEndereco(idrestaurante),
    idcardapio INT(3),
    FOREIGN KEY (idcardapio) REFERENCES prato(id)
)';
$cardapio = 'CREATE TABLE cardapio (
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(ID),
    pratos VARCHAR(50),
    FOREIGN KEY (pratos) REFERENCES prato(nome)
)';
$restauranteEndereco = 'CREATE TABLE restauranteEndereco (
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(id),
    logradouro VARCHAR(50) NOT NULL,
    complemento VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL
)';
$responsavel = 'CREATE TABLE responsavel (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(ID)

)';

$pedido = 'CREATE TABLE pedido (
    id SERIAL PRIMARY KEY,
    payment INT(3),
    timeouti TIME,
    timein TIME,
    agendamento BOOLEAN,
    dia DATE,
    adress TEXT,
    prato VARCHAR(50) NOT NULL,
    iduser INT(3),
    FOREIGN KEY (iduser) REFERENCES users(id),
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(ID),
    idavaliar INT(3),
    FOREIGN KEY (idavaliar) REFERENCES avaliar(id)
)';

$tecnico = 'CREATE TABLE tecnico (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    idpedido INT(3),
    nota INT(3)
)';

$prato = 'CREATE TABLE prato (
    nome VARCHAR(50) NOT NULL PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    obs TEXT,
    acompanhamento VARCHAR(50) NOT NULL,
    descricao INT(3),
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(ID)
)';

$pratoAcompanhamento = 'CREATE TABLE pratoAcompanhamento (
    molhos VARCHAR(50) NOT NULL,
    adicionais VARCHAR(50) NOT NULL,
    idprato INT(3),
    FOREIGN KEY (idprato) REFERENCES prato(nome)
)';

$avaliar = 'CREATE TABLE avaliar (
    id SERIAL PRIMARY KEY,
    notaRestaurante INT(5) NOT NULL,
    notaEntrega INT(5) NOT NULL,
    motivo TEXT
)';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ifome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// delete the requests
$arr = array($users, $usersEndereco, $entregador,  $restauranteEndereco, $restaurantes, $cardapio, $responsavel, $pedido, $tecnico, $prato, $pratoAcompanhamento, $avaliar);
foreach($arr as &$valor ){
    if ($conn->query($valor) === TRUE) {
        echo "sucesso no ".$valor ."; \r\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>