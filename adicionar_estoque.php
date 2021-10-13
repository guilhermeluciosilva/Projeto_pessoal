<?php
session_start();


include('topo.php');
?>


<div style=" width: 600px; position: relative; left: 50%; margin-left: -300px; margin-top: 5%;">
    <div class="mb-3 row">
        
        <div class="col-sm-10">
    <?php
        if(isset($_SESSION['n_efetuado'])){
        ?>
            <div>
                <p style="background-color: red;">ERRO: As senhas são diferentes ou inválidas.</p>
            </div>
        <?php
        }
        unset($_SESSION['n_efetuado']);
    ?>
    <?php
        if(isset($_SESSION['Cadastro_efetuado'])){
        ?>
            <div>
                <p style="background-color: green;">Cadastro Efetuado com sucesso</p>
            </div>
        <?php
        }
        unset($_SESSION['Cadastro_efetuado']);
    ?>
    </div>
    </div>
    
    <form action="adicionando_estoque.php" method="POST">



    


    







   
    <div class="mb-3 row">
        
        <div class="col-sm-10">
            <input required placeholder="Descrição do produto" type="text" name="DesProduto" class="form-control" id="inputPassword">
        </div>
</div>
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input required placeholder="Numero do item" maxlength="3" min="1" max="999" type="number" name="numitem" class="form-control" id="inputPassword">
            </div>
            
    </div>
    
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input required placeholder="Código do produto" maxlength="6" type="text" name="CodProduto" class="form-control" id="inputPassword">
            </div>
    </div>
    
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input required placeholder="Quantidade" min="1" type="number" name="Quantidade" class="form-control" id="inputPassword">
            </div>
            
    </div>
    <div class="mb-3 row">
        
            <div class="col-sm-10">
                <input required placeholder="Valor por produto" min="0.00" step="0.01" type="number" name="valor" class="form-control" id="inputPassword">
            </div>
            
    </div>
    <div class="mb-2 row">
        
        <div class="col-sm-10">
            <input required placeholder="Cliente" type="text" name="Cliente" class="form-control" id="inputPassword">
        </div>
    </div>
    <div class="mb-1 row">
        
            <div class="col-sm-10">
                <label for="exampleInputEmail1" class="form-label">Data de entrada:</label>
                <input required placeholder="Repetir senha" type="date" name="data" class="form-control" id="">
            </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
    
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./js/jquery-slim.min.js"><\/script>')</script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/holder.min.js"></script>






