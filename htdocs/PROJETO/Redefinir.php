<?php
include "config.php";

$email = $_POST['email'];
$dica = $_POST['dica'];
$senha = $_POST['senha'];

/*$sql = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email'");
	while($dados=mysqli_fetch_assoc($sql))
	{
		$e = $dados['email'];
	}
	if($e == $email){
		echo "EMAIL EXISTE";
	}
	else
	{
		echo "<a href='Recuperar-senha.php'>VOLTAR A TELA DE REDEFINIÇÃO";
	}*/
	$result_email = "SELECT email, dica FROM login WHERE email='$email'";
	$resultado_email = mysqli_query($conn, $result_email);
	$row_email = mysqli_fetch_assoc($resultado_email);
	if($email != "")
	{
		if($email == @$row_email['email'] && $dica == @$row_email['dica']){
			print "<table class='table table-borderless table-dark'>";
			print "<tr>";
   			print "<thead>" ;    	
      		print "<th scope='col'>Campos conferem!</th>";
    		print "</thead>";
    		print "</tr>";
    		print "<td scope='col'>Email:".$row_email['email']."</td>";
    		print "</tr>";
    		print "<td scope='col'>Dica: ".$row_email['dica']."</td>";
    		print "</tr>";
    		print "<td scope='col'>Nova senha: ".$senha."</td>";
			print "</tr>";
			print "</table>";
			$sql = "UPDATE login SET senha=md5('$senha') WHERE email='$email'";
			$res = $conn->query($sql) or die($conn->error);
			?>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./css/estylo.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
								<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
								SENHA REDEFINIDA! <a href="index.php"><strong>ACESSE PARA ENTRAR</strong></a>
								</div>
								<?php
		}
		else{
			echo "ERRO!!!!!!! CAMPOS NÃO CONFEREM <a href='Recuperar-senha.php'> DIGITE NOVAMENTE</a>";
		}
	}
	else
	{
		header("location:Recuperar-senha.php");
	}


?>