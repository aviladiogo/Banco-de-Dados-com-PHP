<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mywebsite';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT CPF, firstname, lastname, ordered, payment, adress, deliveryid date FROM users";
// podemos usar o SELECT DISTINCT  para pegar todos com um atributo diferente
// podemos usar o SELECT DISTINCT  para pegar um atributo especifico -- $sql = "SELECT * FROM users WHERE firstname ='bob";
// podemos usar o SELECT para localizar o nome de pessoas que possuem um atributo especifico "SELECT firstname FROM users WHERE id=8;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          echo "CPF: " . $row["CPF"]. " - Nome: " . $row["firstname"]. " " . $row["lastname"]. " - " . $row["adress"]." - " . $row["ordered"]." - " . $row["payment"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>



