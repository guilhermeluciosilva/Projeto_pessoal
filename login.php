<?php

include('conexao.php');
session_start();


if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){ 

    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
    
    $query_login = $conn->prepare("SELECT * FROM usuario where usuario = '$usuario' and senha='$senha'");
    $query_login->execute();
    //$query_login->fetch(PDO::FETCH_ASSOC);
    $dados = $query_login->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id_usuario'] = $dados['usuario_id'];
    $_SESSION['senha'] = $dados['senha'];
    $_SESSION['nivel'] = $dados['nivel'];
    


    $num = $query_login->rowCount();

        if($num == 1){
            $_SESSION['usuario'] = $usuario;
            header('Location: painel.php');
            exit();

        } else {
            $_SESSION['nao_autenticado'] = true;
            header('Location: index.php');
            exit();
        }

} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}