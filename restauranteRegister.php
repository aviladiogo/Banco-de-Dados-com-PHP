<?php
 
$fname = val($_POST["fname"]);  
$openhour = val($_POST["openhour"]);
$closehour = val($_POST["closehour"]);
$adress = val($_POST["adress"]);

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



$sql = "INSERT INTO restaurantes (firstname, openhour, closehour, adress)
VALUES ('$fname','$openhour','$closehour','$adress')";

if ($conn->query($sql) === TRUE) {
    header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//inicializa o cardapio para terem mesma ID

$sql = "INSERT INTO cardapio ()
VALUES ()";

if ($conn->query($sql) === TRUE) {
    header("location:restaurante.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>