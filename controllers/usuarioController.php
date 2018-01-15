<?php
class usuarioController extends controller{
    
    public function index() {

        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        if($_SESSION['cNivel'] == 0){
            header("Location: ".BASE_URL);
            exit;
        }

        $u = new Usuarios();

        $dados['usuarios'] = $u->getLista();  

        $this->loadTemplate('usuarios',$dados);

    }

    public function adicionar(){
        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        if($_SESSION['cNivel'] == 0){
            header("Location: ".BASE_URL);
            exit;
        }

        $u = new Usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])){

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $nivel = addslashes($_POST['nivel']);

            $u->adicionarUsuario($nome, $email, $senha, $nivel);
            
            $dados['msg'] = '<div class="alert alert-success" role="alert">
                  Usuário adocionado com sucesso!!
                </div>';
        }

        $this->loadTemplate('adicionarUsuario', $dados);
    }

    public function editar($id){
        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        if($_SESSION['cNivel'] == 0){
            header("Location: ".BASE_URL);
            exit;
        }

        $u = new Usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])){

            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $nivel = addslashes($_POST['nivel']);

            $u->editUsuario($nome, $email, $senha, $nivel, addslashes($id));
            $dados['msg'] = '<div class="alert alert-success" role="alert">
                  Usuário editado com sucesso!!
                </div>';
            }

        if(!empty($id)){
            $info = $u->getUsuario(addslashes($id));
        }else{
            header("Location: ".BASE_URL."usuario");
            exit;
        }

        $dados['info'] = $info;

        $this->loadTemplate('editarUsuario', $dados);
    }

    public function excluir($id){

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        if($_SESSION['cNivel'] == 0){
            header("Location: ".BASE_URL);
            exit;
        }

        if(isset($_POST['id'])){

            $id = $_POST['id'];

            $u = new Usuarios();

            if(!empty($id)){

                $u->excluirUsuario(addslashes($id));

            }

            header("Location: ".BASE_URL."usuario");
        }

    }

    public function busca(){
        $array = array();

        if(!empty($_POST['texto'])) {
            $texto = $_POST['texto'];

            $u = new Usuarios();

            $array = $u->buscaUsuario(addslashes($texto));

        }

        echo json_encode($array);
    }

}
?>