<?php
 
$iduser = val($_POST["iduser"]);  
$idrestaurante = val($_POST["idrestaurante"]);
$identregador = val($_POST["identregador"]);
$prato = val($_POST["prato"]);
$prato = "prato".$prato;

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

// Get the user payment method
$sql = "SELECT payment FROM users WHERE CPF =$iduser";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $payment=$row['payment'];
}
// Get the user adress
$sql = "SELECT adress FROM users WHERE CPF =$iduser";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $adress=$row['adress'];
}

$sql = "INSERT INTO pedido (iduser, idrestaurante, prato, adress, payment)
VALUES ('$iduser','$idrestaurante','$prato','$adress', '$payment')";

if ($conn->query($sql) === TRUE) {
    echo "pedido criado";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// get plateId
$sql = "SELECT id FROM pedido WHERE iduser =$iduser";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $plateid=$row['id'];
}
// Send the plateid to the deliveryman 

$sql = "UPDATE entregador SET idprato = '$plateid' WHERE ID =$identregador";
if ($conn->query($sql) === TRUE) {
    echo "...Entregador recebeu o ID do pedido";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Send the plateid to the deliveryman 

$sql = "UPDATE restaurantes SET idpedido = '$plateid' WHERE ID = $idrestaurante";
if ($conn->query($sql) === TRUE) {
    echo "...Restaurante recebeu o ID do pedido";
    //header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("location:avaliar.php?entregador=".$identregador."?restaurante=".$idrestaurante);
$conn->close();
?>