<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header.php';
    ?>

    <style>
        .img-cover {
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</script>

<script>
    $('.editarModal').on('click', '.editarModal', function() {
        var item = $(this).closest('.editarModal');
        $('#titulo').val(item.find('.titulo').text());
        $('#descricao').val(item.find('.descricao').text());
        $('#editarModal').show();
    });

    // Cancel edit
    $('#cancel-btn').on('click', function() {
        $('#edit-form').hide();
    });
</script>

<script>
    $(function() {
        $('#excluirModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') // data-id
            var nome = button.data('titulo')




        });
    });
</script>


<body>
    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <div class="main">
            <?php
            include 'topo.php';
            ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Cliente</h1>


                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Formulário do Cliente</h5>
                            </div>
                            <div class="card-body">
                                <form enctype='multipart/form-data' method='post' action="cadastroCliente.php">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                                        <input type="text" class="form-control" id="titulo" name='titulo' required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                                        <input type="descricao" class="form-control" id="descricao" name='descricao' required autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Produto</label>
                                        <input class="form-control" type="file" name='imagem' id="formFile">
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                    <form>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
            <main class="content">
                <h4 class="h3 mb-3">Produtos de Clientes</h4>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Lista de produtos dos Clientes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Produto</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    include 'conexao.php';
                                    $sql = "SELECT * FROM cliente";
                                    $busca = mysqli_query($conexao, $sql);

                                    while ($dados = mysqli_fetch_array($busca)) {
                                        $id = $dados['id_cliente'];
                                        $titulo = $dados['titulo'];
                                        $descricao = $dados['descricao'];
                                        $foto = $dados['imagem'];

                                    ?>

                                        <tr>


                                            <td>
                                                <?php echo  $titulo ?>
                                            </td>
                                            <td>
                                                <?php echo  $descricao ?>
                                            </td>

                                            <td>
                                                <image src="imagens/<?php echo $foto ?>" class="rounded-circle img-cover" width='50px' height='50px'>
                                            </td>

                                            <td>
                                            <td>


                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editarModal" data-id='<?php echo $id ?>' data-titulo="<?php echo $titulo ?>" data-descricao="<?php echo $descricao ?>" data-foto="<?php echo $foto ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="atualizarCliente.php" method="post">


                                                                    <div class="modal-body">
                                                                        <form action="atualizarCliente.php" method="post">
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1" class="form-label">titulo</label>
                                                                                <input type="text" class="form-control" id="titulo" name='titulo' required autocomplete="off">
                                                                                <input type="hidden" name="id" id="id">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1" class="form-label">Decrição</label>
                                                                                <input type="text" class="form-control" id="descricao" name='descricao' required autocomplete="off">

                                                                            </div>

                                                                            <div style="text-align: right;">

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button id="save-btn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                                <button id="cancel-btn" type="submit" class="btn btn-success">Salvar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>



                                            </td>
                                        </tr>



                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>


            <footer class="footer">
                <?php include 'footer.php' ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>