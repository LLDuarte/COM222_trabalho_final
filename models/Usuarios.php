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

		$sql = $this->db->prepare("SELECT id FROM usuario WHERE email = :email AND senha = :senha");
		
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

		$md5_name = '';

		if(count($foto) > 0){
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			
			if(in_array($foto['type'], $tipos)){
				
				$md5_name = md5(time().rand(0,999));
				
				switch ($foto['type']) {
					case 'image/jpeg':
						$md5_name .= '.jpeg';
						break;
					case 'image/jpg':
						$md5_name .= '.jpg';
						break;	
					case 'image/png':
						$md5_name .= '.png';
						break;					
				}

				move_uploaded_file($foto['tmp_name'], 'assets/images/images_users/'.$md5_name);
			}
		}

		$foto = $md5_name;

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

	public function getNome($id){
		$sql = $this->db->prepare("SELECT nome, sobrenome FROM usuario WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$resultado = $sql->fetch();
			return $resultado['nome']." ".$resultado['sobrenome'];
		}else{
			return '';
		}
	}

	public function getFoto($id){
		$sql = $this->db->prepare("SELECT foto FROM usuario WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$resultado = $sql->fetch();

			return $resultado['foto'];
		}else{
			return '';
		}
	}
}