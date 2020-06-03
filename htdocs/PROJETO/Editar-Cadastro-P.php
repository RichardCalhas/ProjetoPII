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
	$result_Prestador = "SELECT id_Prestador, nome, sobrenome, cpf, telefone, cidade FROM Prestador WHERE id_Login=".$_SESSION['id_Prestador'];
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
		<div class="card-body">
		<h1>Editar Cadastro</h1>
			<form method="POST" >
				<input type="hidden" name="id" value="<?php echo $row_Prestador['id_Prestador'];?>">
				<label>Nome</label>
				<input type="text" name="nome" placeholder="Nome" value="<?php echo $row_Prestador['nome'];?>" maxlength="150" class="form-control">
				<label>Sobrenome</label>
				<input type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo $row_Prestador['sobrenome'];?>" maxlength="150" class="form-control">
				<label>CPF</label>
				<input type="text" name="cpf" placeholder="CPF" value="<?php echo $row_Prestador['cpf'];?>" maxlength="11" class="form-control">
				<label>Telefone</label>
				<input type="text" name="telefone" placeholder="Telefone" value="<?php echo $row_Prestador['telefone'];?>" maxlength="11" class="form-control">
				<label>Cidade</label>
				<input type="text" name="cidade" placeholder="Cidade" value="<?php echo $row_Prestador['cidade'];?>" maxlength="150" class="form-control">
				<button type="submit" class="btn btn-secondary btn-lg btn-block">Editar</button>
				<p>
				<button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
				</p>				
			</form>
	</div>
	<?php
		if(isset($_POST['nome']))
		{	
		$nome = addslashes($_POST['nome']);
		$sobrenome = addslashes($_POST['sobrenome']);
		$cpf = addslashes($_POST['cpf']);
		$telefone = addslashes($_POST['telefone']);
		$cidade = addslashes($_POST['cidade']);
		if(!empty($nome) && !empty($sobrenome) && !empty($cpf) && !empty($telefone) && !empty($cidade))
		{
		$p->conectar("Projeto","localhost", "root","");
			if($msgErro == "")
			{
			
				?>
					<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
					CLIENTE EDITADO COM SUCESSO!<a href="?page=Editar-Cadastro-P"><strong> ATUALIZE A PAGINA</strong></a>
					</div>
				<?php
				if($p->editar($nome, $sobrenome, $cpf, $telefone, $cidade))
				{
					
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
</body>
</html>