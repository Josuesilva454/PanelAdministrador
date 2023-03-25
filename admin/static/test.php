<?php
                                        include 'conexao.php';
                                        $sql = "SELECT * FROM cliente";
                                        $busca = mysqli_query($conexao,$sql);

                                        while($dados = mysqli_fetch_array($busca)) {
                                            $id = $dados['id_cliente'];
                                            $foto = $dados['imagem'];
                                            $titulo = $_POST['titulo'];
                                            $descricao = $_POST['descricao'];
                                               }         
                                               echo("busca realizado com sucesso".$dados);


                                       ?>