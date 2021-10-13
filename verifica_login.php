<?php
if(!$_SESSION['usuario']){
    $_SESSION['nao_autenticado'] = TRUE;
    header('Location: index.php');
    exit();
}