<?php

$id = val($_POST["id"]);  
$fname = val($_POST["name"]);  
$tipo = val($_POST["tipo"]);
$obs = val($_POST["obs"]);
$acompanhamentos = val($_POST["acompanhamentos"]);
$descrição = val($_POST["descrição"]);
$prato = $fname."/". $tipo."/". $obs. "/". $acompanhamentos."/". $descrição;

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
$sql = "UPDATE cardapio SET prato1 = '$prato' WHERE id='$id'";
$prato1 = "SELECT prato1 FROM cardapio";
$result = $conn->query($prato1);
while ($row = $result->fetch_assoc()) {
    if($row['prato1'] == null ){
        $sql = "UPDATE cardapio SET prato1 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
$prato2 = "SELECT prato2 FROM cardapio";
$result = $conn->query($prato2);
while ($row = $result->fetch_assoc()) {
    if($row['prato2'] == null ){
        $sql = "UPDATE cardapio SET prato2 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
$prato3 = "SELECT prato3 FROM cardapio";
$result = $conn->query($prato3);
while ($row = $result->fetch_assoc()) {
    if($row['prato3'] == null ){
        $sql = "UPDATE cardapio SET prato3 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
$prato4 = "SELECT prato4 FROM cardapio";
$result = $conn->query($prato4);
while ($row = $result->fetch_assoc()) {
    if($row['prato4'] == null ){
        $sql = "UPDATE cardapio SET prato4 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
$prato5 = "SELECT prato5 FROM cardapio";
while ($row = $result->fetch_assoc()) {
    if($row['prato5'] == null ){
        $sql = "UPDATE cardapio SET prato5 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
$prato6 = "SELECT prato6 FROM cardapio";
while ($row = $result->fetch_assoc()) {
    if($row['prato6'] == null ){
        $sql = "UPDATE cardapio SET prato6 = '$prato' WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            header("location:prato.php?message=inserido");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}

if ($conn->query($sql) === TRUE) {
    header("location:prato.php?message=inserido");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>