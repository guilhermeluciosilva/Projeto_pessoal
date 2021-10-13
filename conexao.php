<?php
$dbhost = ' ';
$dbuser = ' ';
$pass = ' ';
$dbname = ' ';

//criar conexão com o banco de dados
$conn = new PDO("",$dbuser, $pass) or die ("Não foi possivel conectar");

if($conn)
    {
        //echo 'sucesso ';
    }