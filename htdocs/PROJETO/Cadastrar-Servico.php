<!DOCTYPE html>
<?php
	if(!isset($_SESSION['id_Prestador']))
	{
		header("location: index.php");
		exit;
	}
	require_once './CLASSES/Prestador.php';
	$p = new Prestador;
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
	<body >
			<div id="edit-cad">
					<div class="card-body">	
			<h1>Solicitar Anuncio de servico</h1>
			<form method="POST">
				<p>
				<label>Descrição</label>
                <textarea name="descricao" placeholder="Descricao" maxlength="250" class="form-control"></textarea>
            	</p>
				<input type="hidden" name="idPrestador" value="<?php echo $row_Prestador['id_Prestador'];?>">
				<label>Valor</label>
				<input type="valor" name="valor" placeholder="Valor" maxlength="150" class="form-control">
					<div class="form-group">
					<label>Categoria</label>
					<select name="idCategoria" class="form-control">
					<option>== Selecione uma Categoria ==</option>
					<?php
					$sql = "SELECT * FROM categoria";			
					$res = $conn->query($sql) or die($conn->error);			
					$qtd = $res->num_rows;			
					if($qtd > 0){				
						while($row = $res->fetch_object()){
							print "<option value='".$row->id_Categoria."'>".$row->TipoCategoria."</option>";
						}
					}else{
						print "Nenhum dado encontrado";
					}
					?>
					</select>
					</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">Solicitar</button>				
					</form>				
					</div>
			<?php
				if(isset($_POST['descricao']))
				{
					$descricao = addslashes($_POST['descricao']);
					$valor = addslashes($_POST['valor']);
					$idPrestador = addslashes($_POST['idPrestador']);
					$idCategoria = addslashes($_POST['idCategoria']);
					if(!empty($descricao) && !empty($valor) && !empty($idPrestador) && !empty($idCategoria))
					{
						$p->conectar("Projeto","localhost", "root","");
						if($msgErro == "")
						{
							if($p->cadastrarServico($descricao, $valor, $idPrestador, $idCategoria))
							{
								?>
								<div id="msg-sucesso" style="text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);">
								SERVICO AGUARDANDO SOLICITACAO
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
			<button type="button" onclick="location.href='?page=main2'" class="btn btn-primary">Voltar</button>
		</p>
	</body>
</html>
