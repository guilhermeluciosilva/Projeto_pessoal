<?php
session_start();
include('topo.php');
include('funcoes.php');
$usuario = $_GET['usuario'];
$_SESSION['edusuario'] = $usuario;
$_SESSION['edid'] = $_GET['id'];

?>

<div style=" width: 600px; position: relative; left: 50%; margin-left: -300px; margin-top: 10%;">
    <?php
        if(isset($_SESSION['nao_autenticado'])){
        ?>
            <div>
                <p style="background-color: red;">ERRO: As senhas são diferentes ou inválidas.</p>
            </div>
        <?php
        }
        unset($_SESSION['nao_autenticado']);
    ?>
    
    <form action="editar_usuario.php" method="POST">
    
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input placeholder="Nome usuario" type="text" name="nome_usuario" class="form-control" id="inputPassword" value="<?php echo $usuario ?>">
            </div>
    </div>
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input placeholder="Senha nova" type="password" name="senha_nova" class="form-control" id="inputPassword">
            </div>
    </div>
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input placeholder="Repetir senha" type="password" name="senha_nova1" class="form-control" id="inputPassword">
            </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
    </form>
</div>






<?php
include('footer.php');
?>