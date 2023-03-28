<?php

include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];




$sql = "DELETE FROM cliente WHERE id_cliente = $id";
$inserir = mysqli_query($conexao,$sql);



header('Location: formCliente.php?msg=1');



?>
