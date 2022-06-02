<?php
if(isset($_GET['message']) ){
  if(($_GET['message'])=='inserido' ){
     echo "Restaurante inserido no MySQL";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Restaurante</title>
</head>

<body>

<form action="restauranteRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1">
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>Nome:</td>
    <td> <input type="text" name="fname"></td>
  </tr>
  <tr>
    <td>Hora de abertura:</td>
    <td><input type="text" name="openhour"></td>
  </tr>
  <tr>
    <td>Hora de fechar:</td>
    <td><input type="text" name="closehour"></td>
  </tr>
  <tr>
    <td>Adress:</td>
    <td><input type="text" name="adress"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>