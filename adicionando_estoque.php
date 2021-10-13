<?php

include('conexao.php');
session_start();

if(isset($_POST['Cliente']) && isset($_POST['CodProduto']) && isset($_POST['DesProduto']) && isset($_POST['Quantidade']) && isset($_POST['valor'])&& isset($_POST['data']) && isset($_POST['numitem'])){ 

    $Cliente = filter_input(INPUT_POST, 'Cliente', FILTER_SANITIZE_STRING);
    
    $CodProduto = filter_input(INPUT_POST, 'CodProduto', FILTER_SANITIZE_STRING);
    $DesProduto = filter_input(INPUT_POST, 'DesProduto', FILTER_SANITIZE_STRING);
    $Quantidade = filter_input(INPUT_POST, 'Quantidade', FILTER_SANITIZE_NUMBER_INT);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
    $data = $_POST['data'];
    $Valor_total = $Quantidade * $valor;
    $usuario = $_SESSION['usuario'];
    $numitem = filter_input(INPUT_POST, 'numitem', FILTER_SANITIZE_NUMBER_INT);

    

    $query_entrada = $conn->prepare("INSERT INTO entradas (cliente,data_entrada,valor_total,usuario_logado) values ('$Cliente', '$data', '$Valor_total', '$usuario')");
    $query_itens = $conn->prepare("INSERT INTO itens_entradas (cliente,numero_item,codigo_produto,descricao_produto,qtde,valor_unitario,valor_total,usuario_logado) values ('$Cliente', '$numitem', '$CodProduto','$DesProduto' ,'$Quantidade','$valor','$Valor_total','$usuario')");
    $query_entrada->execute();
    $query_itens->execute();
    $num = $query_entrada->rowCount();
    $num1 = $query_itens->rowCount();

    if($num == 1 && $num1 == 1){
        $_SESSION['Cadastro_efetuado'] = TRUE;
        header('Location: adicionar_estoque.php');
            exit();
    }else{
        $_SESSION['n_efetuado'] = TRUE;
        header('Location: adicinar_estoque.php');
        exit;
    }
}else{
    $_SESSION['n_efetuado'] = TRUE;
        header('Location: adicionar_estoque.php');
        exit;
    }