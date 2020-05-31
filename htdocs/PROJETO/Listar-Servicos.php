<!DOCTYPE html>
<h1>Listar Solicitações </h1>
<?php
	if(!isset($_SESSION['id_Administrador']))
	{

		unset($_SESSION['id_Cliente']);
		unset($_SESSION['id_Prestador']);
		header("location: index.php");
		exit;
	}
	$sql = "SELECT * FROM servico as s inner join categoria as c on s.id_Categoria=c.id_Categoria inner join prestador as p on s.id_Prestador=p.id_Prestador WHERE status='Em Análise' ";
	
	$res = $conn->query($sql) or die($conn->error);
	
	$qtd = $res->num_rows;
	
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultados</p>";
		print "<table class='table table-borderless table-dark'>";
		print "<tr>";
   		print "<thead>" ;    	
      	print "<th scope='col'>Detalhes</th>";
    	print "</thead>";
    	print "</tr>";
		$count = 1;
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td><button class='btn btn-success' onclick=\"if(confirm('Tem certeza que deseja permitir?')){location.href='?page=Salvar-Categoria&acao=permitir&id_Servico=".$row->id_Servico."';}else{false;}\">Permitir</button></td>";
			print "</tr>";
			print "<th scope='col'>Status:</th><td>".$row->Status."</td>";
			print "</tr>";
			print "<th scope='col'>Nome:</th><td>".$row->Nome."</td>";
			print "</tr>";
			print "<th scope='col'>Telefone:</th><td>".$row->Telefone."</td>";
			print "</tr>";
			print "<th scope='col'>Cidade:</th><td>".$row->Cidade."</td>";
			print "</tr>";
			print "<th scope='col'>Categoria:</th><th>".$row->TipoCategoria."</th>";
			print "</tr>";
			print "<th scope='col'>Descrição:</th><td>".$row->Descricao."</td>";
			print "</tr>";
			print "<th scope='col'>Valor:</th><td>".$row->Valor."</td>";
			print "</tr>";
			print "<th scope='col'>ID Prestador:</th><td>".$row->id_Prestador."</td>";
			print "</tr>";
			print "<th scope='col'>ID Serviço:</th><td>".$row->id_Servico."</td>";
			print "</tr>";
			print "<th colspan='2'>=======================================================================</th>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "Nenhum dado encontrado";
	}
?>






