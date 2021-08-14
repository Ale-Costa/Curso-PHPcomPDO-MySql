<?php

function validaProdutos($dados){

$erro = false;

if($dados['titulo'] == '' and $dados['descricao'] == '' and $dados['valor'] == ''){
    $erro .= '<p> Preencha os dados!</p>';
}

else{

if($dados['titulo'] == ''){
    $erro .= '<p>Preencha um titulo!</p>';

}
if($dados['descricao'] == ''){
    $erro .= '<p>Preencha uma descricao!</p>';

}
if($dados['valor'] == ''){
    $erro .= '<p>Preencha um valor!</p>';

}
}
return $erro;
}