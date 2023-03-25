<?php
$server = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'bd_php';

$conexao = mysqli_connect($server,$usuario,$senha,$base);
   
if (!$conexao ){
  echo("erro no banco" .$conexao);
}

?>