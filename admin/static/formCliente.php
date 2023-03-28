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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function() {
        $('#editarModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') // data-id
            var nome = button.data('nome')
            var mail = button.data('mail')
            var telefone = button.data('telefone')

            var modal = $(this)
            //aplica valor ao id
            modal.find('.modal-title').text('Excluindo dados: ' + nome)
            modal.find('#nome').val(nome) // <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required autocomplete="off">
            modal.find('#id').val(id)
            modal.find('#mail').val(mail)
            modal.find('#telefone').val(telefone)

        });
    });
</script>

<script>
    $(function() {
        $('#excluirModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') // data-id
            var nome = button.data('nome')


            var modal = $(this)
            //aplica valor ao id
            modal.find('.modal-title').text('Editando dados: ' + nome)
            modal.find('#nome').val(nome) // <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required autocomplete="off">
            modal.find('#id').val(id)


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
                                <form action="cadastroCliente.php" enctype='multipart/form-data' method='post'>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name='nome' required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                        <input type="mail" class="form-control" id="exampleFormControlInput1" name='mail' required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" required autocomplete="off">
                                    </div>


                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Logo/Imagem Pessoa</label>
                                        <input class="form-control" type="file" name='foto' id="formFile">
                                    </div>
                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </main>

            <main class="content">
                <h4 class="h3 mb-3">Lista de Clientes</h4>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dados dos Clientes</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">E-Mail</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'conexao.php';
                                    $sql = "SELECT * FROM cliente";
                                    $busca = mysqli_query($conexao, $sql);

                                    while ($dados = mysqli_fetch_array($busca)) {
                                        $id = $dados['id_cliente'];
                                        $foto = $dados['imagem'];
                                        $nome = $dados['nome'];
                                        $mail = $dados['email'];
                                        $telefone = $dados['telefone'];

                                    ?>
                                        <tr>

                                            <td>
                                                <image src="imagens/<?php echo $foto ?>" class="rounded-circle img-cover" width='50px' height='50px'>
                                            </td>
                                            <td>
                                                <?php echo $nome ?>
                                            </td>
                                            <td>
                                                <?php echo $mail ?>
                                            </td>
                                            <td>
                                                <?php echo $telefone ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal" data-id='<?php echo $id ?>' data-nome="<?php echo $nome ?>" data-foto="<?php echo $foto ?>" data-mail="<?php echo $mail ?>" data-telefone="<?php echo $telefone ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#excluirModal" data-id='<?php echo $id ?>' data-nome="<?php echo $nome ?>">
                                                    <i class="fa-solid fa-trash"></i>
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
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                                                        <input type="text" class="form-control" id="nome" name='nome' required autocomplete="off">
                                                                        <input type="hidden" name="id" id="id">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Mail</label>
                                                                        <input type="text" class="form-control" id="mail" name='mail' required autocomplete="off">

                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                                                                        <input type="text" class="form-control" id="telefone" name='telefone' required autocomplete="off">

                                                                    </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-success">Salvar</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="excluirCliente.php" method="post">
                                                                    <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                                                        <input type="text" class="form-control" id="nome" name='nome' required autocomplete="off" readonly>
                                                                        <input type="hidden" name="id" id="id">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-danger">Confirmar</button>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>