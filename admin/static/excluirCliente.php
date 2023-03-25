<?php

include 'conexao.php';

$id = $_POST['id'];
$nome = $_POST['titulo'];




$sql = "DELETE FROM cliente WHERE id_cliente = $id";
$inserir = mysqli_query($conexao,$sql);



header('Location: cadastro_cliente.php?msg=1');



?>
