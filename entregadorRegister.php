<?php

$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
 

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



$sql = "INSERT INTO entregador (firstname, lastname)
VALUES ('$fname', '$lname')";

if ($conn->query($sql) === TRUE) {
    header("location:entregador.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>