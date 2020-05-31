<!DOCTYPE html>
<?php
	require_once './CLASSES/Cliente.php';
	require_once './CLASSES/Prestador.php';
	require_once './CLASSES/Administrador.php';
	$c = new Cliente;
	$p = new Prestador;
	$a = new Administrador;
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
			<title>
				Projeto Login
			</title>
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
				<link rel="stylesheet" type="text/css" href="./css/estylo.css">
				    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
		<body >		
			<div id="corpo-index">		
  				<div class="card-body">	
					<form method="POST">
      					<label for="exampleInputEmail1">Email</label>
    					<input type="email" name="email" placeholder="Digite seu Email" class="form-control">
   						<label for="exampleInputPassword1">Senha</label>
    					<input type="password" name="senha" placeholder="Digite sua Senha" class="form-control">
    					<a href="Recuperar-Senha.php">Esqueceu a senha?
						</a>
 					    <button type="submit" class="btn btn-primary btn-lg btn-block">Acessar</button>
  						<a href="Cadastrar.php">CADASTRO DE 
							<strong> 
								CLIENTE<br>
							</strong>
						</a>
						<a href="Cadastrar-Prestador.php">CADASTRO DE
							<strong> 
								PRESTADOR DE SERVIÇOS
							</strong>
						</a>
					</form>												
				</div>
			</div>
<?php
	if(session_start())
	{
		unset($_SESSION['id_administrador']);
		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
	}
	else{
		header("location: index.php");
	}
?>
<?php
if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	if(!empty($email) && !empty($senha))
	{
		$c->conectar("Projeto","localhost", "root","");
		$p->conectar("Projeto","localhost", "root","");
		$a->conectar("Projeto","localhost", "root","");
		if($c->msgErro =="")
		{
			if($c->logar($email,$senha))
			{
				header("location: AreaPrivadaC.php");
			}else if($p->logar($email,$senha))
			{
				header("location: AreaPrivadaP.php");
			}else if($a->logar($email,$senha))
			{
				header("location: AreaPrivadaA.php");
			}
			else
			{
				?>
				<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
					EMAIL E/OU SENHA ESTÃO INCORRETOS! 
				</div>
				<?php
			}
		}
		else
		{
			echo "ERRO: ".$c->msgErro;
		} 
	}else
	{
		?>
		<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
			PREENCHA TODOS OS CAMPOS!
		</div>
		<?php
	}
}
?>
		</body>
</html>