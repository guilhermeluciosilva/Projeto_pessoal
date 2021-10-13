<?php
session_start();


include('topo.php');
include('conexao.php');

$var = 1;

    $query_cadastro = $conn->prepare("SELECT id FROM count");
    $query_cadastro->execute();
    $certo = $query_cadastro->fetch(PDO::FETCH_ASSOC);
    $id = $certo['id'];

    $query_update = $conn->prepare("UPDATE count SET id = $id + $var where id = $id");
    $query_update->execute();
    $finali = $query_update->fetch(PDO::FETCH_ASSOC);
    
    $query_cadastro = $conn->prepare("SELECT id FROM count");
    $query_cadastro->execute();
    $certo = $query_cadastro->fetch(PDO::FETCH_ASSOC);
    

?>

<div class="row" >
  
    <div class="card" style="width: 18rem; margin: 50px 10% 20px;;">
        <img src="Almoxarifado.png" class="card-img-top" alt="Almoxarifado">
        <div class="card-body">
            <h5 class="card-title">Cadastrar estoque</h5>
            <p class="card-text">Chegou mercádoria? Adicione aqui!</p>
            <a href="adicionar_estoque.php" class="btn btn-primary">Cadastrar</a>
            <h1><?php echo "     ".$certo['id']; ?></h1>
    </div>
    </div>
    <?php switch($_SESSION['nivel']){ 
                  case 0:
                
                ?>
    <div class="card" style="width: 18rem; margin: 50px 30px 20px;">
        <img src="COMO-TRABALHA-O-PROFISSIONAL-DE-AUXILIAR-DE-ALMOXARIFADO-1200x675.jpg" class="card-img-top" alt="adicionar">
        <div class="card-body">
            <h5 class="card-title">Controle de estoque</h5>
            <p class="card-text">Veja o estoque total </p>
            <a href="controle_estoque.php" class="btn btn-primary">Acessar</a>
        </div>
    </div>
    <?php 
                  break;
                  case 1:
                    
                    break;
                }?>
</div>






























<?php
if (isset($_SESSION['alterado_sucesso'])) {
    ?>
    <script language="JavaScript">
    
    alert("Senha alterada com sucesso!");
    
    </script>
    <?php

}
unset($_SESSION['alterado_sucesso']);


if (isset($_SESSION['Cadastro_efetuado'])) {
    ?>
    <script language="JavaScript">
 
    alert("Cadastro efetuado com sucesso!");
    //window.location = 'Login/painel.php';
   
    </script>
    <?php

}
unset($_SESSION['Cadastro_efetuado']);

if (isset($_SESSION['PERMISSAO_NEGADA'])) {
    ?>
    <script language="JavaScript">
   
    alert("VOCÊ NÃO TEM PERMISSÃO PARA EXCLUIR");
    //window.location = 'Login/painel.php';
    
    </script>
    <?php

}
unset($_SESSION['PERMISSAO_NEGADA']);
?>
<?php
include('footer.php');
?>