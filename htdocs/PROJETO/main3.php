<!DOCTYPE html>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Administrador.php';
	include_once("config.php");
	$result_Administrador = "SELECT id_Administrador, nome FROM Administrador WHERE id_Login=".$_SESSION['id_Administrador'];
	$resultado_Administrador = mysqli_query($conn, $result_Administrador);
	$row_Administrador = mysqli_fetch_assoc($resultado_Administrador);
	$result_login = "SELECT id_Login, email FROM login WHERE id_Login=".$_SESSION['id_Administrador'];
	$resultado_login = mysqli_query($conn, $result_login);
	$row_login = mysqli_fetch_assoc($resultado_login);
?>
<h1>Admin, seja bem-vindo!</h1>
  <div class="tab">
<table class="table table-bordered table-dark">
    <tr>
      <th scope="row">Nome</th>
      <td><?php echo $row_Administrador['nome'];?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td ><?php echo $row_login['email'];?></td>
    </tr>
  </tbody>
</table>
</div>