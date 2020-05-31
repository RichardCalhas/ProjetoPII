<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['id_Cliente']))
	{
		header("location: index.php");
		exit;
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>
			Projeto
		</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./css/estylo.css">
		    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body >
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="?page=main" style="color: white;">Help</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="?page=main" style="color: white;">Inicio</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="?page=Anuncios" style="color: white;">Serviços</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
						Minha conta
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?page=Editar-Cadastro-C">Editar Cadastro</a>
						</div>
					</li>
				</ul>
				<ul class="nav justify-content-end">
  					<li class="nav-item">
					<li class="nav-item">
						<a class="btn btn-secondary" href="?page=Logout-Cliente" role="button">Sair</a>
					</li>
				</ul>
			</div>	
		</nav>
			<div id="area">
				<div class="col-lg-12">
					<?php
						include ("config.php");

						switch(@$_REQUEST["page"])
						{
							case "Editar-Cadastro-C":
								include("Editar-Cadastro-C.php");
							break;
							case "Excluir-Cadastro-C":
								include("Excluir-Cadastro-C.php");
							break;
							case "Anuncios":
							include("Anuncios.php");
							break;
							case "main":
								include("main.php");
							break;
							case "Logout-Cliente":
								include("Logout-Cliente.php");
							break;
						}
					?>
				</div>
			</div>
		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>