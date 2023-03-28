<?php

include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];



$sql = "UPDATE `cliente` SET `nome`='$nome',`email`='$mail',`telefone`='$telefone' WHERE id_cliente = $id";
$inserir = mysqli_query($conexao,$sql);





header('Location: formCliente.php?msg=1');



?>