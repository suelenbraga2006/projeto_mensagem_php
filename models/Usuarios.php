<?php
class Usuarios extends model {

	public function adicionarUsuario($nome, $email, $senha, $nivel){	

		$sql = $this->db->prepare("SELECT id FROM usuario WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0){
			
			$sql = $this->db->prepare("INSERT INTO usuario SET nome = :nome, email = :email, senha = :senha, nivel = :nivel");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", MD5($senha));
			$sql->bindValue(":nivel", $nivel);
			$sql->execute();

			return true;
		}else{
			return false;
		}

	}

	public function getUsuario($id){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM usuario WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function editUsuario($nome, $email, $senha, $nivel, $id){

		$senhaatual = '';

		$sql = $this->db->prepare("SELECT senha FROM usuario WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$senhaatual = $sql->fetch();
		}
		
		$sql = $this->db->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id = :id");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		if($senhaatual['senha'] != $senha){
			$sql->bindValue(":senha", MD5($senha));
		}else{
			$sql->bindValue(":senha", $senha);
		}
		$sql->bindValue(":nivel", $nivel);
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

	public function excluirUsuario($id){

		$sql = $this->db->prepare("DELETE FROM usuario WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

	public function login($email, $senha){	

		$sql = $this->db->prepare("SELECT id, nome, nivel FROM usuario WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", MD5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){

			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			$_SESSION['cNome'] = $dado['nome'];
			$_SESSION['cNivel'] = $dado['nivel'];

			return true;
		}else{
			return false;
		}


	}

	public function buscaUsuario($texto){
		$array = array();

        $sql = $this->db->prepare("SELECT * FROM usuario WHERE nome LIKE :texto");
        $sql->bindValue(":texto", '%'.$texto.'%');
        $sql->execute();

        if($sql->rowCount() > 0) {

            foreach($sql->fetchAll() as $pessoa) {
                $array[] = array('nome'=>utf8_encode($pessoa['nome']), 'id'=>$pessoa['id']);
            }

        }

        return $array;
	}

	public function getlista(){

		$array = array();

		$sql = $this->db->query("SELECT * FROM usuario");

		if($sql->rowCount() > 0){

			$array = $sql->fetchAll();

		}

		return $array;

	}
}
?>