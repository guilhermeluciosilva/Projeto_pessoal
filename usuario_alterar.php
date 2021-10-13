<?php
include('conexao.php');
session_start();

if(isset($_POST['senha_antiga']) && !empty($_POST['senha_antiga']) && isset($_POST['senha_nova']) && !empty($_POST['senha_nova']) && isset($_POST['senha_nova1']) && !empty($_POST['senha_nova1']) && $_POST['senha_nova1'] == $_POST['senha_nova'] && $_SESSION['senha'] == md5($_POST['senha_antiga'])){
    $senha_antiga = md5(filter_input(INPUT_POST, 'senha_antiga', FILTER_SANITIZE_STRING));
    $senha_nova = md5(filter_input(INPUT_POST,'senha_nova',FILTER_SANITIZE_STRING));
    $senha_nova1 = md5(filter_input(INPUT_POST,'senha_nova1',FILTER_SANITIZE_STRING));
    $id = $_SESSION['id_usuario'];
    
    $query_senha = $conn->prepare("UPDATE usuario SET senha = '$senha_nova' where usuario_id = '$id'");
    $query_senha->execute();
    
    $num = $query_senha->rowCount();
    if($num == 1){
        $_SESSION['alterado_sucesso'] = TRUE;
        $_SESSION['senha'] = $senha_nova;
        header('Location: painel.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: usuario_formulario.php');
        
        exit();
    
    }  
    
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: usuario_formulario.php');
    exit();

}