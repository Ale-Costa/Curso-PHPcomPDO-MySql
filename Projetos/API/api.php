<?php	

include('configuracao.php');
include('db.php');
include('usuarios.php');
include('produtos.php');
include('validacao.php');

function getPaginas(){
$url = $_SERVER['REQUEST_URI'];
$url = explode("?", $url);
$url = $url[0];
$metodo = $_SERVER['REQUEST_METHOD'];

if($metodo === "GET"){
switch($url){
    case"/home":
        $produtos = getProdutos();
        include('Paginas/home.php');
        break;
    case"/sobre":
        include('Paginas/sobre.php');
        break;
    case"/contato":
        include('Paginas/contato.php');
        break;
    case"/produtos":
        $produtos = getProdutos();
        include('Paginas/produto.php');
        break;
    case"/busca":
        $produtos = buscaProdutos($_GET['busca']);
        include('Paginas/home.php');
        break;
    case"/produto/editar":
        $produtoEdit = buscaProdutoId($_GET['id']);
        $editando = true;
        $produtos = getProdutos();
        include('Paginas/home.php');
        break;
        case"/produto/excluir":
            //var_dump($_GET['id']);exit;
            $produtoDel = excluirProduto($_GET['id']);
            $produtos = getProdutos();
            include('Paginas/home.php');
            break;
    default:
    $produtos = getProdutos();
        include('Paginas/home.php');
        break;
        }
    }
//var_dump($_SERVER); exit;
// return include('Paginas/home.php');

if($metodo === "POST"){
switch($url){
    case"/produto/adicionar":

        $msg = validaProdutos($_POST);
            if ($msg){
                $produtos = getProdutos();
                $produtoEdit = $_POST;
                include('Paginas/home.php');
                break;                    
                }

        if  (!adicionarProdutos($_POST)){
            $msg = "Erro! Nao foi possivel inserir o registro.";
            $produtos = getProdutos();
            include('Paginas/home.php');
            break;
        }
        header('location:../');            
        break; 
        case"/produto/atualizar":
            $msg = validaProdutos($_POST);
            if ($msg){
                $produtos = getProdutos();
                $produtoEdit = $_POST;
                include('Paginas/home.php');
                    break;                    
            }
            if  (!atualizarProduto($_POST)){
                //var_dump($_POST);exit;
                $msg = "Erro! Nao foi possivel atualizar o registro.";
                $produtos = getProdutos();
                include('Paginas/home.php');
                break;
            }
            header('location:../');            
            break;               
    default:
        include('Paginas/home.php');
        break;
}
}
}