<?php
include('conexao.php');
session_start();

if(isset($_POST['senha_nova']) && !empty($_POST['senha_nova']) && isset($_POST['senha_nova1']) && !empty($_POST['senha_nova1']) && $_POST['senha_nova1'] == $_POST['senha_nova']){
    
    $senha_nova = md5(filter_input(INPUT_POST,'senha_nova',FILTER_SANITIZE_STRING));
    
    
    $id = $_SESSION['edid'];
    
    $query_senha = $conn->prepare("UPDATE usuario SET senha = '$senha_nova' where usuario_id = '$id'");
    $query_senha->execute();
    
    $num = $query_senha->rowCount();
    if($num == 1){
        $_SESSION['alterado_sucesso'] = TRUE;
        header('Location: painel.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: editar_usuario_formulari.php');
        
        exit();
    
    }  
    
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: editar_usuario_formulari.php');
    exit();

}