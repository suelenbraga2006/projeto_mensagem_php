<?php
class Mensagens extends model {

	public function adicionarMensagem($categoria, $usuario, $mensagem){	

		$sql = $this->db->prepare("INSERT INTO mensagem SET id_usuario = :id_usuario, id_categoria = :id_categoria, mensagem = :mensagem, data_hora = NOW()");
		$sql->bindValue(":id_usuario", $usuario);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":mensagem", $mensagem);
		$sql->execute();

	}

	public function getMensagens($id,$nivel){
		$array = array();

		if($nivel == 1){
			$sql = $this->db->query("SELECT *, (select categoria.nome from categoria where categoria.id = mensagem.id_categoria) as categoria, (select usuario.nome from usuario where mensagem.id_usuario = usuario.id) as usuario FROM mensagem");

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}else{
			$sql = $this->db->prepare("SELECT *, (select categoria.nome from categoria where categoria.id = mensagem.id_categoria) as categoria, (select usuario.nome from usuario where mensagem.id_usuario = usuario.id) as usuario FROM mensagem WHERE id_usuario = :id_usuario OR id_usuario = 0");
			$sql->bindValue(":id_usuario", $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}
	}

	public function getMensagem($id){
		$array = array();

		$sql = $this->db->prepare("SELECT *, (select categoria.nome from categoria where categoria.id = mensagem.id_categoria) as categoria, (select usuario.nome from usuario where mensagem.id_usuario = usuario.id) as usuario FROM mensagem WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function editMensagem($categoria, $usuario, $mensagem, $id){
		
		$sql = $this->db->prepare("UPDATE mensagem SET id_categoria = :id_categoria, id_usuario = :id_usuario, mensagem = :mensagem WHERE id = :id");
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $usuario);
		$sql->bindValue(":mensagem", $mensagem);
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

	public function excluirMensagem($id){

		$sql = $this->db->prepare("DELETE FROM mensagem WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

	public function getMensagensHome($id, $id_categoria){
		$array = array();

		$sql = $this->db->prepare("SELECT mensagem, data_hora FROM mensagem WHERE id_categoria = :id_categoria AND (id_usuario = 0 OR id_usuario = :id_usuario)");
		$sql->bindValue(":id_categoria", $id_categoria);
		$sql->bindValue(":id_usuario", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

}
?>