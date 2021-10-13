<?php

include('conexao.php');
session_start();
if(isset($_POST['usuario_novo']) && !empty($_POST['usuario_novo']) && isset($_POST['senha_novo_usuario']) && !empty($_POST['senha_novo_usuario']) && isset($_POST['senha_novo_usuario1']) && !empty($_POST['senha_novo_usuario1']) && $_POST['senha_novo_usuario'] == $_POST['senha_novo_usuario1']){
    $usuario = filter_input(INPUT_POST,'usuario_novo', FILTER_SANITIZE_STRING);
    $senha = md5(filter_input(INPUT_POST, 'senha_novo_usuario', FILTER_SANITIZE_STRING));
    $tipo = filter_input(INPUT_POST,'tipo', FILTER_SANITIZE_STRING);

    $query_cadastro = $conn->prepare("INSERT INTO usuario (usuario, senha, nivel) values ('$usuario', '$senha', '$tipo')");
    $query_cadastro->execute();
    $num = $query_cadastro->rowCount();
    
    if($num == 1){
        $_SESSION['Cadastro_efetuado'] = TRUE;
        header('Location: painel.php');
            exit();
    } else{
        $_SESSION['n_efetuado'] = TRUE;
        header('Location: usuario_cadastrar_formulario.php');
        exit;
    }

} else{
    if($_POST['senha_novo_usuario'] != $_POST['senha_novo_usuario1']){
        $_SESSION['s_diferente'] = TRUE;
        header('Location: usuario_cadastrar_formulario.php');
        exit; 
    }else{
    $_SESSION['n_efetuado'] = TRUE;
        header('Location: usuario_cadastrar_formulario.php');
        exit;
    }
}