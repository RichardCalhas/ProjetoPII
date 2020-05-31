<?php
	switch($_REQUEST["acao"]){

		case "permitir":
			$sql = "UPDATE servico SET status='Ativo' WHERE id_Servico=".$_REQUEST['id_Servico'];
			
			$res = $conn->query($sql) or die($conn->error);
			
			if($res==true){
				print "<br><div id='msg-sucesso' style='text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);'>PERMITIDO COM SUCESSO!</div>";
			}else{
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>NÃO FOI POSSIVEL PERMITIR.</div>";
			}
		break;
		case "desativar":
			$sql = "UPDATE servico SET status='Em Análise' WHERE id_Servico=".$_REQUEST['id_Servico'];
			
			$res = $conn->query($sql) or die($conn->error);
			
			if($res==true){
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>DESATIVADO COM SUCESSO!</div>";
			}else{
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>NÃO FOI POSSIVEL DESATIVAR.</div>";
			}
		break;
		case "editarcat":
			$sql = "UPDATE categoria SET TipoCategoria='".$_REQUEST["TipoCategoria"]."' WHERE id_Categoria=".$_REQUEST['id_Categoria'];
			
			$res = $conn->query($sql) or die($conn->error);
			
			if($res==true){
				print "<br><div id='msg-sucesso' style='text-align: center; background-color: rgba(50,205,50,.3); border: 1px solid rgb(34,139,34);'>EDITADO COM SUCESSO!</div>";
			}else{
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>NÃO FOI POSSIVEL EDITAR.</div>";
			}
		break;

		case "excluir":
			$sql = "DELETE FROM categoria WHERE id_categoria=".$_REQUEST["id_categoria"];
			
			$res = $conn->query($sql) or die($conn->error);
			
			if($res==true){
				print "<br><div class='alert alert-success'>Excluído com sucesso!</div>";
			}else{
				print "<br><div class='alert alert-danger'>Não foi possível excluir.</div>";
			}
		break;
	}
?>
<p>
	<button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
</p>
<p>
	<button type="button" onclick="location.href='?page=Listar-Categorias';" class="btn btn-success">Listar Categorias</button>
	<button type="button" onclick="location.href='?page=Listar-Servicos';" class="btn btn-success">Listar Solicitações</button>
	<button type="button" onclick="location.href='?page=Listar-Servicos-Permitidos';" class="btn btn-success">Listar Serviços Permitidos</button>
</p>







