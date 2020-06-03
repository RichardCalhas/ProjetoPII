<!DOCTYPE html>
<?php
	require_once './CLASSES/Administrador.php';
	$a = new Administrador;
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
			<title>
				Projeto
			</title>
			<link rel="stylesheet" type="text/css" href="./css/estylo.css">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body >
		<div id="edit-cad">
					<div class="card-body">	
				<h1>Cadastro de Admin</h1>
				<form method="POST">
					<input type="text" name="nome" placeholder="Nome Completo" maxlength="150" class="form-control" >
					<input type="text" name="dica" placeholder="Dica necessária para redefinição de senha" maxlength="50" class="form-control">
					<input type="email" name="email" placeholder="Email" maxlength="50" class="form-control">
					<input type="password" name="senha" placeholder="Senha" maxlength="15" class="form-control">
					<input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15" class="form-control">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
				</form>	
			</div>
		</div>


		<?php
			if(isset($_POST['nome']))
			{
				$nome = addslashes($_POST['nome']);
				$dica = addslashes($_POST['dica']);
				$email = addslashes($_POST['email']);
				$senha = addslashes($_POST['senha']);
				$confsenha = addslashes($_POST['confsenha']);
				if(!empty($nome)&& !empty($email) && !empty($senha) && !empty($confsenha) && !empty($dica))
				{
					$a->conectar("Projeto","localhost", "root","");
					if($msgErro == "")
					{
						if($senha == $confsenha)
						{

							if($a->cadastrar($nome, $dica, $email, $senha, $confsenha))
							{
								?>
								<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
								ADMIN CADASTRADO COM SUCESSO!<a href="index.php"><strong>ACESSE PARA ENTRAR</strong></a>
								</div>
								<?php
							}

							else
							{	
								?>	
								<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
								EMAIL JÁ CADASTRADO!
								</div>
								<?php
							}	
						}

						else   	
						{	
							?>	
							<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
								CAMPOS DE SENHA NÃO CORRESPONDEM!
							</div>
							<?php
						}
					}

					else 
					{	
						?>	
						<div>				
						<?php echo "ERRO: ".$c->msgErro;?>
						</div>
						<?php
					}
				}

				else
				{	
					?>	
					<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
					PREENCHA TODOS OS CAMPOS!
					</div>
					<?php
				}
			}                   
		?>
		<p>
				<button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
		</p>
	</body>		
</html>