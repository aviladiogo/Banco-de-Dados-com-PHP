<?php
if(isset($_GET['message']) ){
  if(($_GET['message'])=='inserido' ){
     echo "pedido inserido no MySQL";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fazer pedido</title>
</head>

<body>

<form action="pedidoRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1" align=center>
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>insira o seu CPF:</td>
    <td> <input type="text" name="iduser"></td>
  </tr>
  <tr>
    <td>insira o ID do restaurante:</td>
    <td> <input type="text" name="idrestaurante"></td>
  </tr>
  <tr>
    <td>insira o ID do seu entregador:</td>
    <td> <input type="text" name="identregador"></td>
  </tr>
  <tr>
    <td>Prato escolhido (1, 2, 3, 4, 5,6):</td>
    <td><input type="text" name="prato"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>