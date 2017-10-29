<?php 

/**
* 
*/
class Usuarios extends model{
	
	public function cadastra_usuario($nome, $sobrenome ,$email, $senha, $foto){
		$sql = $this->db->prepare("SELECT id FROM usuario WHERE email = :email");
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

			header("Location: ".BASE_URL);

		} else {
			return "Este email já está cadastrado.";
		}

	}
}