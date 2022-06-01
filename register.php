<?php

$CPF = val($_POST["cpf"]); 
$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
$adress = val($_POST["adress"]);
$order = val($_POST["order"]);
$payment = val($_POST["payment"]);  
$deliveryid = val($_POST["deliveryid"]);    

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



$sql = "INSERT INTO users (CPF, firstname, lastname, ordered, payment, adress, deliveryid)
VALUES ('$CPF','$fname', '$lname','$order','$payment','$adress', '$deliveryid')";

if ($conn->query($sql) === TRUE) {
    header("location:cliente.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>