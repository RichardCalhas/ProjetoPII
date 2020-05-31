<?php
	switch($_REQUEST["acao"]){
		case "desativarP":
			$sql = "UPDATE servico SET status='Em Análise' WHERE id_Servico=".$_REQUEST['id_Servico'];
			
			$res = $conn->query($sql) or die($conn->error);
			
			if($res==true){
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>DESATIVADO COM SUCESSO!</div>";
			}else{
				print "<br><div class='msg-erro'  style='text-align: center; background-color: rgba(250,128,114,.3); border: 1px solid rgb(165,42,42);'>NÃO FOI POSSIVEL DESATIVAR.</div>";
			}
		break;
	}
?>
<p>
	<button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
</p>