<?php
include('conexao.php');
require "FPDF/fpdf.php";

class myPDF extends FPDF{
  function header(){
    //$this->Image('Almoxarifado.png',10,6);
    $this->SetFont('Arial','B',14);
    $this->Cell(276,5,'ALMOXARIFADO',0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(276,10,'fgmaiss',0,0,'C');
    $this->Ln(20);

  }
  function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
  function headerTable(){
    $this->SetFont('Times','B',12);
    $this->Cell(20,10,'cliente',1,0,'C');
    $this->Cell(40,10,'numero_entrada',1,0,'C');
    $this->Cell(40,10,'descricao',1,0,'C');
    $this->Cell(20,10,'data',1,0,'C');
    $this->Cell(36,10,'quantidade',1,0,'C');
    $this->Cell(30,10,'valor_unitario',1,0,'C');
    $this->Cell(50,10,'valor_total',1,0,'C');
    $this->Cell(50,10,'usuario',1,0,'C');
    $this->Ln();
    
  }
  function viewTable($conn){
    $this->SetFont('Times','',12);
    $query_itens = $conn->prepare("SELECT * FROM itens_entradas");
    $query_entradas = $conn->prepare("SELECT * FROM entradas");
    $query_itens->execute();
    $query_entradas->execute();
    
      while(($dados = $query_itens->fetch(PDO::FETCH_ASSOC)) && ($dados2 = $query_entradas->fetch(PDO::FETCH_ASSOC))){
        $cliente =$dados2['cliente'];
        $numero_entrada = $dados2['numero_entrada'];
        $descricao = $dados['descricao_produto'];
        $data = $dados2['data_entrada'];
        $quantidade = $dados['qtde'];
        $valor_unitario = $dados['valor_unitario'];
        $valor_total = $dados['valor_total'];
        $usuario = $dados['usuario_logado'];
        
        $this->Cell(20,10,$cliente,1,0,'L');
        $this->Cell(40,10,$numero_entrada,1,0,'L');
        $this->Cell(40,10,$descricao,1,0,'L');
        $this->Cell(20,10,$data,1,0,'L');
        $this->Cell(36,10,$quantidade,1,0,'L');
        $this->Cell(30,10,$valor_unitario,1,0,'L');
        $this->Cell(50,10,$valor_total,1,0,'L');
        $this->Cell(50,10,$usuario,1,0,'L');
        $this->Ln();
        
      }

      
  }

}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4', 0);
$pdf->headerTable();
for($i = 0; $i <10; $i++){
$pdf->viewTable($conn);
}
$pdf->Output();