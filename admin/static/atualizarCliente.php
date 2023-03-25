<?php

include 'conexao.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];


$sql = "UPDATE `cliente` SET `titulo`='$titulo', `descricao`='$descricao' WHERE id_cliente = $id";
$inserir = mysqli_query($conexao,$sql);



//header('Location: cadastro_cliente.php?msg=1');



?>