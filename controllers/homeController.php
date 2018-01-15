<?php
class homeController extends controller{

	public function index(){
		$dados = array();

		if(empty($_SESSION['cLogin'])){
			header('Location: '.BASE_URL."login");
			exit;
		}

        $c = new Categorias();

        $dados['categorias'] = $c->getlista();

		$this->loadTemplate('home', $dados);
	}

}

?>