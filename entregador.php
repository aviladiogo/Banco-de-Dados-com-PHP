<?php
if(isset($_GET['message']) ){
  if(($_GET['message'])=='inserido' ){
     echo "Entregador inserido no MySQL";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Entregador</title>
</head>

<body>

<form action="entregadorRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1" align=center>
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>Nome:</td>
    <td> <input type="text" name="fname"></td>
  </tr>
  <tr>
    <td>Sobrenome:</td>
    <td><input type="text" name="lname"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>