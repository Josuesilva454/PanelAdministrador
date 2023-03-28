<?php

include 'conexao.php';

$nome = $_POST['nome'];
$mail = $_POST['mail'];
$telefone = $_POST['telefone'];
$arquivo = $_FILES['foto'];

if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"],$ext);

    if($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "imagens/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'],$caminho_arquivo);

        $sql = "INSERT INTO `cliente`(`nome`, `email`, `telefone`,  `imagem`) VALUES ('$nome','$mail','$telefone','$nome_arquivo')";
        $inserir = mysqli_query($conexao,$sql);

    }
}



header('Location: formCliente.php?msg=1');



?>