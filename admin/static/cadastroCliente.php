<?php

include 'conexao.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$arquivo = $_FILES['imagem'];

if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"],$ext);

    if($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "imagens/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'],$caminho_arquivo);

        $sql = "INSERT INTO `cliente`( `titulo`, `descricao`, `imagem`) VALUES ('$titulo','$descricao','$nome_arquivo')";

        $inserir = mysqli_query($conexao,$sql);

        if (  $inserir === false) {
            echo 'Erro de sintaxe na query: ' . mysqli_error($conexao);
          }

    }
}


header('Location: formCliente.php?msg=1');



?>