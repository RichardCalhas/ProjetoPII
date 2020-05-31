<!DOCTYPE html>
<?php
	Class Prestador
	{
		private $pdo;
		public $msgErro = "";

		public function conectar($base, $host, $user, $pass)
		{
			global $pdo;
			global $msgErro;
			try {
				$pdo = new PDO("mysql:dbname=".$base.";host=".$host, $user, $pass);
			} catch (PDOException $e) {
				$msgErro = $e->getMessage();
			}

		}
		public function cadastrar($nome, $sobrenome, $cpf, $telefone, $cidade, $dica, $email, $senha)
		{
			global $pdo;
			$sql = $pdo->prepare("SELECT id_Login FROM login WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();

			if($sql->rowCount() >  0) {
				return false;
			} else {
				$sql = $pdo->prepare("INSERT INTO Login(dica, email, senha, nivel) VALUES ( :di, :e, :s, '2')");
				$sql->bindValue(":di",$dica);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->execute();
				$sql = $pdo->prepare("INSERT INTO Prestador(nome, sobrenome, cpf, telefone, cidade, id_Login) VALUES (:n, :s, :c, :t, :e1, LAST_INSERT_ID())");
				$sql->bindValue(":n",$nome);
				$sql->bindValue(":s",$sobrenome);
				$sql->bindValue(":c",$cpf);
				$sql->bindValue(":t",$telefone);
				$sql->bindValue(":e1",$cidade);
				$sql->execute();
				return true;
			}
		}
		public function editar($nome, $sobrenome, $cpf, $telefone, $cidade)
		{
			global $pdo;
			$sql = $pdo->prepare("UPDATE Prestador SET nome=:n, sobrenome=:s, cpf=:c,telefone=:t,cidade=:e1 WHERE `prestador`.`id_Login`=".$_SESSION['id_Prestador']);
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":s",$sobrenome);
			$sql->bindValue(":c",$cpf);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e1",$cidade);
			$sql->execute();
		}
		public function excluir($email, $senha)
		{	
			
			global $pdo;
			$sql = $pdo->prepare("SELECT id_Prestador FROM Prestador WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() >  0) 
			{
				return false;
			} else {
				$sql = $pdo->prepare("DELETE FROM Prestador WHERE id_Prestador=".$_SESSION['id_Prestador']);
				$sql->execute();
				return true;
			}
		}
		public function logar($email, $senha)
		{
			global $pdo;

			$sql = $pdo->prepare("SELECT id_Login FROM Login WHERE email = :e AND senha = :s AND nivel = '2'");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0){
				$dadop = $sql->fetch();
				$_SESSION['id_Prestador'] = $dadop['id_Login'];
				session_start();
				
				return true;
			} else {
				return false;
			}
		}
		public function cadastrarServico($descricao, $valor, $idPrestador, $idCategoria)
		{
			global $pdo;
				$sql = $pdo->prepare("INSERT INTO Servico(descricao, valor, status, id_Prestador, id_Categoria) VALUES (:dc , :va , 'Em Análise' , :idp, :idc)");
				$sql->bindValue(":dc",$descricao);
				$sql->bindValue(":va",$valor);
				$sql->bindValue(":idp",$idPrestador);
				$sql->bindValue(":idc",$idCategoria);
				$sql->execute();
				return true;
		}
	}
?>