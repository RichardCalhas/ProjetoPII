<!DOCTYPE html>
<h1>Listar Prestadores</h1>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
	$sql = "SELECT id_Prestador, nome,id_Login FROM prestador";
	
	$res = $conn->query($sql) or die($conn->error);
	
	$qtd = $res->num_rows;
	
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultados</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>ID Prestador</th>";	
		print "<th>Nome do Prestador</th>";
		print "<th>ID Login</th>";
		print "<th>Ações</th>";
		print "</tr>";
		$count = 1;
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_Prestador."</td>";	
			print "<td>".$row->nome."</td>";
			print "<td>".$row->id_Login."</td>";
			print "<td>
						<button class='btn btn-success' onclick=\"\">Editar</button>
						
						<button class='btn btn-danger' onclick=\"\">Excluir</button>
			       </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Nenhum dado encontrado";
	}
?>






