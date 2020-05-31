<!DOCTYPE html>
<?php
	if(!isset($_SESSION['id_Prestador']))
	{
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Prestador.php';
	$p = new Prestador;
	include_once("config.php");
	$result_Prestador = "SELECT id_Prestador, nome, cpf, telefone, endereco, email, senha FROM Prestador WHERE id_Prestador=".$_SESSION['id_Prestador'];
	$resultado_Prestador = mysqli_query($conn, $result_Prestador);
	$row_Prestador = mysqli_fetch_assoc($resultado_Prestador);
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
			<title>
				Projeto
			</title>
	</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<h1>Excluir</h1>
			<form method="POST" >
				<input type="hidden" name="id" value="<?php echo $row_Prestador['id_Prestador'];?>">
				<input type="text" name="nome" placeholder="Nome Completo" value="<?php echo $row_Prestador['nome'];?>" maxlength="150" class="form-control">
				<input type="text" name="cpf" placeholder="CPF" value="<?php echo $row_Prestador['cpf'];?>" maxlength="11" class="form-control">
				<input type="text" name="telefone" placeholder="Telefone" value="<?php echo $row_Prestador['telefone'];?>" maxlength="11" class="form-control">
				<input type="text" name="endereco" placeholder="Endereço" value="<?php echo $row_Prestador['endereco'];?>" maxlength="150" class="form-control">
				<input type="text" name="email" placeholder="Email" value="<?php echo $row_Prestador['email'];?>" maxlength="150" class="form-control">
				<input type="password" name="senha" placeholder="Senha" maxlength="15" class="form-control">
				<input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15" class="form-control">
				<button type="submit" class="btn btn-danger">Excluir</button>
			</form>
		</div>
	</div>
	<?php
		if(isset($_POST['nome']))
		{	
		$senha = addslashes($_POST['senha']);
		$confsenha = addslashes($_POST['confsenha']);
		if(!empty($senha) && !empty($confsenha))
		{
		$p->conectar("Projeto","localhost", "root","");
			if($msgErro == "")
			{
				if($senha == $confsenha)
				{

					if($p->excluir($senha, $confsenha))
					{
						?>
						<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
							PRESTADOR EXCLUIDO COM SUCESSO!
						<?php
							session_start();
							unset($_SESSION['id_Prestador'])
						?>
							<script>location.href='index.php'</script>
							<a href="Logout-Prestador.php"><strong>CADASTRE PARA ENTRAR</strong>
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
					<?php echo "ERRO: ".$p->msgErro;?>
					</div>
				<?php
			}
		}
	}                        
	?>
</body>
<p>
	<button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
	<div class="alert alert-danger" role="alert">
  		ATENÇÃO! Esta ação não poderá ser desfeita!
	</div>
</p>
</html>