<?php
class loginController extends controller{
	public function index(){
		$dados = array();

		$u = new Usuarios;
		if(isset($_POST['email']) && !empty($_POST['email'])){

			$email = addslashes($_POST['email']);
			$senha = $_POST['senha'];

			if($u->login($email, $senha)){
				$dados['logado'] = "ok";
				header('Location: '.BASE_URL);
			}else{
				$dados['msg'] = '<div class="alert alert-danger" role="alert">
						Usuário e/ou senha inválidos!
					</div>';
			}
			
		}

		$this->loadTemplate('login', $dados);
	}

	public function sair(){
		session_start();
		unset($_SESSION['cLogin']);
		unset($_SESSION['cNome']);
		unset($_SESSION['cNivel']);
		header("Location: ".BASE_URL."login");
	}
}
?>