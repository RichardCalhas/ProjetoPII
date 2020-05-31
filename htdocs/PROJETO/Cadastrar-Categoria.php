<!DOCTYPE html>
	<h1>Cadastrar Categoria</h1>
	<form method="POST">
		<div class="form-group">
			<input type="text" name="tipoCategoria" placeholder="Nome Categoria" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success">
				Salvar
			</button>
			<button type="button" onclick="location.href='?page=Listar-Categorias';" class="btn btn-primary">Listar</button>
		</div>
	</form>

<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
require_once './CLASSES/Administrador.php';
$a = new Administrador;


if(isset($_POST['tipoCategoria']))
	{
		$tipoCategoria = addslashes($_POST['tipoCategoria']);
		if(!empty($tipoCategoria))
		{
			$a->conectar("Projeto","localhost", "root","");
			if($msgErro == "")
			{

				if($a->cadastrarCategoria($tipoCategoria))
				{
					?>
					<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
					CATEGORIA CADASTRADA COM SUCESSO!
					</div>
					<?php
				}

				else
				{	
					?>	
					<div class="msg-erro"  style="text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);">
					CATEGORIA JÁ CADASTRADA!
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