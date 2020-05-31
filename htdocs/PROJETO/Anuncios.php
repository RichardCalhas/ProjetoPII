<!DOCTYPE html>
<h1>Anúncios</h1>
<?php
	if(!isset($_SESSION['id_Cliente']))
	{
		header("location: index.php");
		exit;
	}
	$sql = "SELECT * FROM servico as s inner join categoria as c on s.id_Categoria=c.id_Categoria inner join prestador as p on s.id_Prestador=p.id_Prestador WHERE status='Ativo'";
	
	$res = $conn->query($sql) or die($conn->error);
	
	$qtd = $res->num_rows;
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultados</p>";
		print "<div id='corpo-tab'>";
		print "<div class='tab'>";
		print "<table class='table table-borderless table-dark'>";
		print "<tr>";
   		print "<thead>" ;    	
      	print "<th scope='col'>Detalhes</th>";
    	print "</thead>";
    	print "</tr>";
		$count = 1;
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>
			<button class='btn btn-success' onclick=\"if(confirm('Tem certeza que deseja Solicitar?')){location.href='?page=Salvar-Categoria&acao=solicitar&id_Servico=".$row->id_Servico."';}else{false;}\">Solicitar</button></td>";
			print "</tr>";
			print "<th scope='col'>Nome:</th><td>".$row->Nome."</td>";
			print "</tr>";
			print "<th scope='col'>Telefone:</th><td>".$row->Telefone."</td>";
			print "</tr>";
			print "<th scope='col'>Cidade:</th><td>".$row->Cidade."</td>";
			print "</tr>";
			print "<th scope='col'>Categoria:</th><th>".$row->TipoCategoria."</th>";
			print "</tr>";
			print "<th style='word-wrap: break-word;'>Descrição:</th><td style='word-wrap: break-word;'>".$row->Descricao."</td>";
			print "</tr>";
			print "<th scope='col'>Valor:</th><td>".$row->Valor."</td>";
			print "</tr>";
			print "<th colspan='2'>=======================================================================</th>";
			print "</tr>";
		}
		print "</table>";
		print "</div>";
		print "</div>";
	}else{
		print "Nenhum dado encontrado";
	}
?>






