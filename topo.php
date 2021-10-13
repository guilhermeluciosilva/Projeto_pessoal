<?php
include('verifica_login.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Controle Plantio</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/album.css" rel="stylesheet">
    <style>
      a { 
          color: inherit; 
        }

      a:hover {
          color: inherit;
        }
    </style>
  </head>

  <body style="background: #f2f7fa!important;">

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Sobre</h4>
              <p class="text-white">Ainda estou andando.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Opções</h4>
              <ul class="list-unstyled">
                <li><a href="usuario_formulario.php" class="text-white">Alterar Senha</a></li>
                <?php switch($_SESSION['nivel']){ 
                  case 0:
                
                ?>

                <li><a href="usuario_cadastrar_formulario.php" class="text-white">Cadastrar usuário</a></li>
                <li><a href="usuario_excluir.php" class="text-white">Editar\Excluir usuário</a></li>
                
                <?php 
                  break;
                  case 1:
                    
                    break;
                }?>
                
                <li><a href="logout.php" class="text-white">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a style="color:white" class="navbar-brand d-flex align-items-center">
            <strong>Olá, <?php echo $_SESSION['usuario']?></strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

     

    
