<!DOCTYPE html>
<html>
<?php
	if(!isset($_SESSION['id_Prestador']))
	{
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Prestador.php';
	include_once("config.php");
	$result_Prestador = "SELECT id_Prestador, nome, sobrenome, cpf, telefone, cidade FROM Prestador WHERE id_Login=".$_SESSION['id_Prestador'];
	$resultado_Prestador = mysqli_query($conn, $result_Prestador);
	$row_Prestador = mysqli_fetch_assoc($resultado_Prestador);
	$result_login = "SELECT id_Login, email FROM login WHERE id_Login=".$_SESSION['id_Prestador'];
	$resultado_login = mysqli_query($conn, $result_login);
	$row_login = mysqli_fetch_assoc($resultado_login);
?>
<head>
</head>
<body>
	<h1> Prestador, seja bem-vindo ao Help!</h1>
  <div class="tab">
<table class="table table-bordered table-dark">
    <tr>
      <th scope="row">Nome</th>
      <td><?php echo $row_Prestador['nome'];?></td>
    </tr>
    <tr>
      <th scope="row">Sobrenome</th>
      <td><?php echo $row_Prestador['sobrenome'];?></td>
    </tr>
    <tr>
      <th scope="row">CPF</th>
      <td ><?php echo $row_Prestador['cpf'];?></td>
    </tr>
    <tr>
      <th scope="row">Telefone</th>
      <td ><?php echo $row_Prestador['telefone'];?></td>
    </tr>
    <tr>
      <th scope="row">Cidade</th>
      <td ><?php echo $row_Prestador['cidade'];?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td ><?php echo $row_login['email'];?></td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>