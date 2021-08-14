<?php
//phpinfo();exit;
function getProdutos(){

$dados = array(
    ["titulo"=>"PHP Basico", "descricao"=>"Curso de PHP Basico", "valor"=>"120.00"],
    ["titulo"=>"Mecanica basica", "descricao"=>"Curso de mecanica basica", "valor"=>"320.00"],
    ["titulo"=>"PHP com Laravel", "descricao"=>"Curso de PHP com framework laravel", "valor"=>"7200.00"]
);

$conexao = getConexao();

$select = "select * from produtos";

$ret = $conexao->query($select);

$produtos = $ret->fetchAll();


return $produtos;
}

function buscaProdutos($busca){
$produtos = getProdutos();
$resultado = [];
foreach($produtos as $produto){
    // $existe = in_array($busca,$produto);
    $existe = in_array(strtolower($busca),array_map('strtolower',$produto));
    if($existe){
        array_push($resultado, $produto);
    }
}
return $resultado;
}

function adicionarProdutos($dados){
$conexao = getConexao();
$insert = "Insert into produtos(titulo,descricao,valor) values (:titulo,:descricao,:valor)";
$stmt = $conexao->prepare($insert);
$stmt->bindValue(':titulo',$dados['titulo']);
$stmt->bindValue(':descricao',$dados['descricao']);
$stmt->bindValue(':valor',$dados['valor']);
$stmt->execute();

return $conexao->LastInsertId();    
}

function buscaProdutoId($id){
$conexao = getConexao();
$select = "select * from produtos where id=:id";
$stmt = $conexao->prepare($select);
$stmt->bindValue(':id',(int)$id);
$stmt->execute();
return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function atualizarProduto($dados){
//var_dump($dados);exit;
$conexao = getConexao();
$update = "update produtos set titulo=:titulo, descricao=:descricao, valor=:valor where id=:id";
$stmt = $conexao->prepare($update);
$stmt->bindValue(':titulo',$dados['titulo']);
$stmt->bindValue(':descricao',$dados['descricao']);
$stmt->bindValue(':valor',$dados['valor']);
$stmt->bindValue(':id',(int)$dados['id']);

$ret = $stmt->execute();

return $ret;
}

function excluirProduto($id){
//var_dump($id);exit;
$conexao = getConexao();
$delete = "delete from produtos where id=:id";
$stmt = $conexao->prepare($delete);
$stmt->bindValue(':id',(int)$id);

$ret = $stmt->execute();

return $ret;
}