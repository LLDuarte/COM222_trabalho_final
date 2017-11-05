<?php 

/**
* 
*/
class Usuarios extends model{
	
	public function verificarLogin(){
		if(!isset($_SESSION['login']) || (isset($_SESSION['login']) && empty($_SESSION['login']))){
			header("Location: ".BASE_URL."login");
			exit;
		}		
	}

	public function logar($email, $senha){
	
		$sql = $this->db->prepare("SELECT id, senha FROM usuario WHERE email = :email AND senha = :senha");
		
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		
		$sql->execute();

		if($sql->rowCount() == 1) {
			
			$resultado = $sql->fetch();

			$_SESSION['login'] = $resultado['id'];

			header("Location: ".BASE_URL);
			exit;
		}else{
			return "Email e/ou senha errados.";
		}
	}
	public function cadastra_usuario($nome, $sobrenome ,$email, $senha, $foto){
		$sql = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		//o email é unico
		//caso não tenha email cadastrado, ou seja, o usuario ainda nao existe
		if($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO usuario SET nome = :nome, sobrenome = :sobrenome, email = :email, senha = :senha, foto = :foto");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":sobrenome", $sobrenome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha)); //proteção a senha
			$sql->bindValue(":foto", $foto);
			$sql->execute();

			$id = $this->db->lastInsertId(); //pega o id do ultimo elemento inserido
			$_SESSION['login'] = $id;

			header("Location: ".BASE_URL);

		} else {
			return "Este email já está cadastrado.";
		}

	}
}