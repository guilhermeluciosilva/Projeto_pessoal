<?php
session_start();
include('topo.php');
include('conexao.php');

$query_usuarios = $conn->prepare("SELECT * FROM usuario ORDER BY usuario_id ASC");
$query_usuarios->execute();

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Nivel</th>
      <th scope="col">Funções</th>
    </tr>
  </thead>
  <tbody>

  <?php
        if(isset($_SESSION['excluido_sucesso'])){
        ?>
            <div>
                <p style="background-color: green;">EXCLUIDO COM SUCESSO</p>
            </div>
        <?php
        }
        unset($_SESSION['excluido_sucesso']);

  ?>
  <?php
        if(isset($_SESSION['excluido_erro'])){
        ?>
            <div>
                <p style="background-color: red;">ERRO AO EXCLUIR</p>
            </div>
        <?php
        }
        unset($_SESSION['excluido_erro']);
        
  ?>









    <?php
   
    while($dados = $query_usuarios->fetch(PDO::FETCH_ASSOC)){
        $idususario =$dados['usuario_id'];
        $usuario = $dados['usuario'];
        $nivel = $dados['nivel'];

        if($dados['nivel'] == 0){
            $nivel = 'Administrador';
        } else {
            $nivel = 'Usuário';
        }

        if($_SESSION['id_usuario'] == $idususario){
          continue;
        }else{
          echo"
          <tr>
          <th scope='row'>$idususario</th>
          <td>$usuario</td>
          <td>$nivel</td>
          <td><button type='button' class='btn btn-secondary'><a name='botao' style='hover;' href='editar_usuario_formulario.php?id=".$idususario."&usuario=".$usuario."'>Editar</a></button> <button name='botao' type='button' class='btn btn-danger' ><a name='botao' style='hover;' href='excluindo.php?id=".$idususario."&nivel=".$nivel."'>Excluir</a></button></td>
          </tr>";
        }

    }
    ?>

  </tbody>
</table>



























<?php
include('footer.php');
?>
