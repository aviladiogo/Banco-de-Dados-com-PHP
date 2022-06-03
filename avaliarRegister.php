<?php
$idEntregador = val($_POST["idEntregador"]);  
$idrestaurante = val($_POST["idrestaurante"]);
$notaRestaurante = val($_POST["notaRestaurante"]);  
$notaEntregador = val($_POST["notaEntregador"]);

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// delete the requests
$sql = "UPDATE restaurantes SET idpedido = '0' WHERE ID = $idrestaurante";
if ($conn->query($sql) === TRUE) {
    echo "...Pedido apagado";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "UPDATE entregador SET idpedido = '0' WHERE ID = idEntregador";
if ($conn->query($sql) === TRUE) {
    echo "...Pedido apagado";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// rate the deliveryman 

$sql = "UPDATE entregador SET nota = '$notaEntregador' WHERE ID = $idEntregador";
if ($conn->query($sql) === TRUE) {
    echo "...Nota enviada";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// rate the restaurant

$sql = "UPDATE restaurantes SET Nota = '$notaRestaurante' WHERE ID = $idrestaurante";
if ($conn->query($sql) === TRUE) {
    echo "...Nota enviada";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//header("location:avaliar.php?");
$conn->close();
?>