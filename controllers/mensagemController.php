<?php
class mensagemController extends controller{
    
    public function index() {

        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        $id = $_SESSION['cLogin'];
        $nivel = $_SESSION['cNivel'];

        $u = new Usuarios();
        $m = new Mensagens();

        $dados['mensagens'] = $m->getMensagens($id, $nivel);  

        $this->loadTemplate('mensagens',$dados);

    }

    public function adicionar(){
        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        $m = new Mensagens();

        if(isset($_POST['categoria']) && !empty($_POST['categoria'])){

            $categoria = addslashes($_POST['categoria']);
            $usuario = addslashes($_POST['usuario']);
            $mensagem = addslashes($_POST['mensagem']);

            $m->adicionarMensagem($categoria, $usuario, $mensagem);
            
            $dados['msg'] = '<div class="alert alert-success" role="alert">
                  Mensagem adocionada com sucesso!!
                </div>';
        }

        $this->loadTemplate('adicionarMensagem', $dados);
    }

    public function editar($id){
        $dados = array();

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        $m = new Mensagens();

        if(isset($_POST['categoria']) && !empty($_POST['categoria'])){

            $categoria = addslashes($_POST['categoria']);
            $usuario = addslashes($_POST['usuario']);
            $mensagem = addslashes($_POST['mensagem']);

            $m->editMensagem($categoria, $usuario, $mensagem, addslashes($id));
            $dados['msg'] = '<div class="alert alert-success" role="alert">
                  Mensagem editada com sucesso!!
                </div>';
            }

        if(!empty($id)){
            $info = $m->getMensagem(addslashes($id));
        }else{
            header("Location: ".BASE_URL."mensagem");
            exit;
        }

        $dados['info'] = $info;

        $this->loadTemplate('editarMensagem', $dados);
    }

    public function excluir($id){

        if(empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."login");
            exit;
        }

        if(isset($_POST['id'])){

            $id = $_POST['id'];

            $m = new Mensagens();

            if(!empty($id)){

                $m->excluirMensagem(addslashes($id));

            }

            header("Location: ".BASE_URL."mensagem");
        }

    }

}
?>