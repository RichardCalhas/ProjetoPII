<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['id_Cliente']))
	{
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Cliente.php';
	include_once("config.php");
	$result_Cliente = "SELECT id_Cliente, nome, sobrenome, cpf, telefone, cidade FROM Cliente WHERE id_Login=".$_SESSION['id_Cliente'];
	$resultado_Cliente = mysqli_query($conn, $result_Cliente);
	$row_Cliente = mysqli_fetch_assoc($resultado_Cliente);
	$result_login = "SELECT id_Login,dica , email FROM login WHERE id_Login=".$_SESSION['id_Cliente'];
	$resultado_login = mysqli_query($conn, $result_login);
	$row_login = mysqli_fetch_assoc($resultado_login);
?>
<head>
</head>
<body>
  <div class="tab">
	<h1> Cliente, seja bem-vindo ao Help!</h1>
<table class="table table-bordered table-dark">
    <tr>
      <th scope="row">Nome</th>
      <td><?php echo $row_Cliente['nome'];?></td>
    </tr>
    <tr>
      <th scope="row">Sobrenome</th>
      <td><?php echo $row_Cliente['sobrenome'];?></td>
    </tr>
    <tr>
      <th scope="row">CPF</th>
      <td ><?php echo $row_Cliente['cpf'];?></td>
    </tr>
    <tr>
      <th scope="row">Telefone</th>
      <td ><?php echo $row_Cliente['telefone'];?></td>
    </tr>
    <tr>
      <th scope="row">Cidade</th>
      <td ><?php echo $row_Cliente['cidade'];?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td ><?php echo $row_login['email'];?></td>
    </tr>
     <tr>
      <th scope="row">Dica</th>
      <td ><?php echo $row_login['dica'];?></td>
    </tr>

  </tbody>
</table>
</div>
</body>
</html>
