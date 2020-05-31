<h1>Editar Categoria</h1>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
	$sql = "SELECT * FROM categoria WHERE id_Categoria=".$_REQUEST["id_Categoria"];
	
	$res = $conn->query($sql);
	
	$row = $res->fetch_object();
?>
<form action="?page=Salvar-Categoria" method="POST">
	<div class="form-group">
		<input type="text" name="TipoCategoria" placeholder="Categorias" class="form-control" value="<?php print $row->TipoCategoria; ?>">
	</div>
	<div class="form-group">
		<input type="hidden" name="acao" value="editarcat">
		<input type="hidden" name="id_Categoria" value="<?php print $row->id_Categoria; ?>">
		<button type="submit" class="btn btn-success">
			Salvar
		</button>
	</div>
</form>