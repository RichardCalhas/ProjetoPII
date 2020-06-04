<!DOCTYPE html>
<?php
	Class Administrador
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
		public function cadastrar($nome, $dica, $email, $senha)
		{
			global $pdo;
			$sql = $pdo->prepare("SELECT id_Login FROM login WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();

			if($sql->rowCount() >  0) {
				return false;
			} else {
				$sql = $pdo->prepare("INSERT INTO Login(dica, email, senha, nivel) VALUES (:di, :e, :s,'1')");
				$sql->bindValue(":di",$dica);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->execute();
				$sql = $pdo->prepare("INSERT INTO Administrador(nome, id_Login) VALUES (:n, LAST_INSERT_ID())");
				$sql->bindValue(":n",$nome);
				$sql->execute();
				return true;
			}
		}
		public function editar($nome)
		{
			global $pdo;
			$sql = $pdo->prepare("SELECT * FROM administrador WHERE id_Login=".$_SESSION['id_Administrador']);
			$sql = $pdo->prepare("UPDATE Administrador SET nome=:n WHERE id_Login=".$_SESSION['id_Administrador']);
			$sql->bindValue(":n",$nome);
			$sql->execute();
		}
		public function excluir($email, $senha)
		{	
			
			global $pdo;
			$sql = $pdo->prepare("SELECT id_Administrador FROM administrador WHERE email = :e");
			$sql->bindValue(":e",$email);
			$sql->execute();
			if($sql->rowCount() >  0) 
			{
				return false;
			} else {
				$sql = $pdo->prepare("DELETE FROM administrador WHERE id_Administrador=".$_SESSION['id_Administrador']);
				$sql->execute();
				return true;
			}
		}
		public function logar($email, $senha)
		{
			global $pdo;

			$sql = $pdo->prepare("SELECT id_Login FROM Login WHERE email = :e AND senha = :s And nivel='1'");
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			if($sql->rowCount() > 0){
				$dadoa = $sql->fetch();
				session_start();
			$_SESSION['id_Administrador'] = $dadoa['id_Login'];

				return true;
			} else {
				return false;
			}
		}
		public function cadastrarCategoria($tipoCategoria)
		{
			global $pdo;
			$sql = $pdo->prepare("SELECT id_Categoria FROM categoria WHERE tipoCategoria=:tc");
			$sql->bindValue(":tc",$tipoCategoria);
			$sql->execute();
			if($sql->rowCount() >  0) {
				return false;
			} else {
				$sql = $pdo->prepare("INSERT INTO Categoria(tipoCategoria) VALUES (:tc)");
				$sql->bindValue(":tc",$tipoCategoria);
				$sql->execute();
				return true;
			}
		}	
	}
?>