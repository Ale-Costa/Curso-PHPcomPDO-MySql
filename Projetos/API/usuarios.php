<?php
function getUsers(){
    $dados = [
        ["nome"=>"Alexandre","email"=>"ale@mail.com"],
        ["nome"=>"Guilerme","email"=>"gui@mail.com"],
        ["nome"=>"Pedro","email"=>"pedro@mail.com"]
    ];
    return $dados;
}

function showUser(){
    $usuarios = getUsers();
    $html = "";

         foreach ($usuarios as $usuario){
            $nome = $usuario["nome"];
            $email = $usuario["email"];
            $html .= "<li>Nome:$nome - E-mail:$email</li>";
        }
 return $html;
}    
?>