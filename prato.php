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
    <title>Cadastro Pratos</title>
</head>

<body>

<form action="pratoRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1" align=center>
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>Id do seu restaurante:</td>
    <td> <input type="text" name="id"></td>
  </tr>
  <tr>
    <td>Nome do prato:</td>
    <td> <input type="text" name="name"></td>
  </tr>
  <tr>
    <td>Tipo do prato (normal, vegano, sem lactose):</td>
    <td><input type="text" name="tipo"></td>
  </tr>
  <tr>
    <td>observações:</td>
    <td><input type="text" name="obs"></td>
  </tr>
  <tr>
    <td>acompanhamentos:</td>
    <td><input type="text" name="acompanhamentos"></td>
  </tr>
  <tr>
    <td>descrição do prato:</td>
    <td><input type="text" name="descrição"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>