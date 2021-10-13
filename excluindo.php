<?php
include('conexao.php');
session_start();
if($_SESSION['nivel'] == 0 && $_GET['nivel'] == 'Usuário'){
    if(isset($_GET['id'])){
        
        $id=$_GET['id'];
        
        $query_delete = $conn->prepare("DELETE from usuario WHERE usuario_id='$id'");
        $query_delete->execute();
        $num = $query_delete->rowCount();
        if($num == 1){
            $_SESSION['excluido_sucesso'] = TRUE;
            header('Location: usuario_excluir.php');
            exit();
        } else {
            $_SESSION['excluido_erro'] = true;
            header('Location: usuario_excluir.php');
            
            exit();
        
        }  
    
    } else {
        $_SESSION['excluido_erro'] = true;
        header('Location: usuario_excluir.php');
        
        exit();
    
    }  
} else {
    $_SESSION['PERMISSAO_NEGADA'] = TRUE;
    header("Location: painel.php");
    exit();
}
