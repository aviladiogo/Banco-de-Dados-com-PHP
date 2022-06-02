<?php
if(isset($_GET['message']) ){
  if(($_GET['message'])=='inserido' ){
     echo "Usuário inserido no MySQL";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> PHP - MySQL Lesson </title>
</head>

<body>

<form action="clienteRegister.php" method="post">
<table width="600" border="0" cellspacing="1" cellpadding="1">
  <tr>
  <td><a href="./inicial.php">Voltar</a></td>
  </tr>
  <tr>
    <td>CPF:</td>
    <td> <input type="text" name="cpf"></td>
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
    <td>Endereço:</td>
    <td><input type="text" name="adress"></td>
  </tr>
  <tr>
    <td>Pedido:</td>
    <td><input type="text" name="order"></td>
  </tr>
  <tr>
    <td>Metodo de pagamento (1- dinheiro, 2- cartão, 3- pix):</td>
    <td><input type="int" name="payment"></td>
  </tr>
  <tr>
    <td>codigo do pedido:</td>
    <td><input type="int" name="deliveryid"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"></td>
  </tr>
</table>

</form>

</body>

</html>