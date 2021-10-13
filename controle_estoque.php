<?php
session_start();

include('conexao.php');
include('topo.php');

$query_itens = $conn->prepare("SELECT * FROM itens_entradas");
$query_entradas = $conn->prepare("SELECT * FROM entradas");
$query_itens->execute();
$query_entradas->execute();

?>
<a href="gerarpdf.php">Clique</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Numero da entrada</th>
      <th scope="col">Descrição produto</th>
      <th scope="col">Data entrada</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor por item</th>
      <th scope="col">Valor total</th>
      <th scope="col">Usuario On</th>
    </tr>
  </thead>
  <tbody>


  <?php
  while(($dados = $query_itens->fetch(PDO::FETCH_ASSOC)) && ($dados2 = $query_entradas->fetch(PDO::FETCH_ASSOC))){
        $cliente =$dados2['cliente'];
        $numero_entrada = $dados2['numero_entrada'];
        $descricao = $dados['descricao_produto'];
        $data = $dados2['data_entrada'];
        $quantidade = $dados['qtde'];
        $valor_unitario = $dados['valor_unitario'];
        $valor_total = $dados['valor_total'];
        $usuario = $dados['usuario_logado'];

        
       
          echo"
          <tr>
          <th scope='row'>$cliente</th>
          <td>$numero_entrada</td>
          <td>$descricao</td>
          <td>$data</td>
          <td>$quantidade</td>
          <td>$valor_unitario</td>
          <td>$valor_total</td>
          <td>$usuario</td>
          </tr>";
        

    }
    ?>

  </tbody>
</table>












<?php
include('footer.php');
?>