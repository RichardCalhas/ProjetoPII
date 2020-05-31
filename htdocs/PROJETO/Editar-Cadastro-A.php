<!DOCTYPE html>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Administrador.php';
	$a = new Administrador;
	include_once("config.php");
	$result_Administrador = "SELECT id_Administrador, nome FROM Administrador WHERE id_Login=".$_SESSION['id_Administrador'];
	$resultado_Administrador = mysqli_query($conn, $result_Administrador);
	$row_Administrador = mysqli_fetch_assoc($resultado_Administrador);
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
				<form method="POST">
				<input type="hidden" name="id" value="<?php echo $row_Administrador['id_Administrador'];?>">
				<label>Nome</label>
				<input type="text" name="nome" placeholder="Nome" value="<?php echo $row_Administrador['nome'];?>" maxlength="150" class="form-control">
				
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
						if(!empty($nome))
						{
							$a->conectar("Projeto","localhost", "root","");
							if($msgErro == "")
							{
								?>
									<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
									ADMIN EDITADO COM SUCESSO!<a href="?page=Editar-Cadastro-A"><strong> ATUALIZE A PAGINA</strong></a>
									</div>
								<?php
								if($a->editar($nome))
								{
										
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
			
		</body>
</html>