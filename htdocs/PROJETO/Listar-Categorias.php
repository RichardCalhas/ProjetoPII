<!DOCTYPE html>
<h1>Listar Categorias</h1>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
	$sql = "SELECT * FROM categoria";
	
	$res = $conn->query($sql) or die($conn->error);
	
	$qtd = $res->num_rows;
	
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultados</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Categorias</th>";
		print "<th>Ação</th>";
		print "</tr>";
		$count = 1;
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$count++."</td>";
			print "<td>".$row->TipoCategoria."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"location.href='?page=Editar-Categoria&id_Categoria=".$row->id_Categoria."';\">Editar</button>
			       </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Nenhum dado encontrado";
	}
?>






