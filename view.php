<?php
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
$prato1 = 'SELECT prato1 FROM cardapio';
$result = $conn->query($prato1);
while ($row = $result->fetch_assoc()) {
    echo $row['prato1']."<br>";
    if($row['prato1'] == null ){
        echo "salve";
    }
}

?>