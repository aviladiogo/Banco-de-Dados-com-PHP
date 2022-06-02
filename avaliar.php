<?php
if(isset($_GET['entregador']) ){
    $identregador=($_GET['entregador']);
}
if(isset($_GET['restaurante'])){
    $idrestaurante=($_GET['restaurante']);
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fazer pedido</title>
</head>

<body>

<form action="avaliarRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1" align=center>
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>insira o ID do entregador:</td>
    <td> <input type="text" name="idEntregador"></td>
  </tr>
  <tr>
    <td>insira o ID do restaurante:</td>
    <td> <input type="text" name="idrestaurante"></td>
  </tr>
  <tr>
    <td>insira uma nota para o restaurante:</td>
    <td> <input type="text" name="notaRestaurante"></td>
  </tr>
  <tr>
    <td>insira uma nota para o entregador:</td>
    <td> <input type="text" name="notaEntregador"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>