<?php
session_start();


include('topo.php');
?>

<div style=" width: 600px; position: relative; left: 50%; margin-left: -300px; margin-top: 10%;">
    <?php
        if(isset($_SESSION['n_efetuado'])){
        ?>
            <div>
                <p style="background-color: red;">ERRO: Cadastro não efetuado</p>
            </div>
        <?php
        }
        unset($_SESSION['n_efetuado']);
    ?>
    <?php
        if(isset($_SESSION['s_diferente'])){
        ?>
            <div>
                <p style="background-color: red;">ERRO: As senhas são diferentes.</p>
            </div>
        <?php
        }
        unset($_SESSION['s_diferente']);
    ?>
    <form action="usuario_cadastrar.php" method="POST">
        <div class="mb-3 row">
           
            <div class="col-sm-10">
                <input placeholder="Nome" type="text" class="form-control" name="usuario_novo" required>
            </div>
        </div>
        <div class="mb-3 row">
            
            <div class="col-sm-10" >
                <input placeholder="Senha" type="password" class="form-control" id="inputPassword" name="senha_novo_usuario" required>
            </div>
        </div>
        <div class="mb-3 row">
            
            <div class="col-sm-10">
                <input placeholder="Confirmar senha" type="password" class="form-control" id="inputPassword" name="senha_novo_usuario1" required>
            </div>
        </div>
        <select name="tipo" class="form-control"  style="width: 50%;" required>
            <option value = "">Tipo do Usuário</option>
            <option value = "0">Administrador</option>
            <option value = "1">Usuario</option>   
        </select><br>
        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
    </form>

</div>


<?php
include('footer.php');
?>