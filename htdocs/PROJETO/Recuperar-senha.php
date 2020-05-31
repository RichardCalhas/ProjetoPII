<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Redefinir Senha</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./css/estylo.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="corpo-index">		
  				<div class="card-body">	
		<h1>Recuperar Senha</h1>
			<form action="redefinir.php" method="POST">
				<label>Email</label>
				<input type="text" name="email" placeholder="Digite o email cadastrado" class="form-control" required>
				<label>Dica</label>
				<input type="text" name="dica" placeholder="Digite a dica cadastrada" class="form-control" required>
				<label>Nova senha</label>
				<input type="password" name="senha" placeholder="Digite a nova senha" class="form-control" required>
				<button type="submit" value="Redefinir" class="btn btn-secondary btn-lg btn-block">Redefinir</button>
			</form>
		</div>
	</div>
<p>
<button type="button" onclick="location.href='Login.php'" class="btn btn-primary">Voltar</button>
</p>
	</body>

</html>