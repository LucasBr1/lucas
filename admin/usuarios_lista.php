<?php
include("../Connections/conn_produtos.php");
mysqli_select_db($conn_produtos,$database_conn);
$consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC";
$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Usuários - Lista</title>
    <meta charset="utf-8">
    <!-- Depois vamos inserir aqui o Bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include "menu_adm.php"; ?>
    <main class="container">
        <h1 class="breadcrumb alert-info">Lista de Usuarios</h1>
        <div class="col-xs-12 col-sm-6 col-sm-offset-2 col-md-8 col-md-offset-2">
            <table class="table table-hover table-condensed tbopacidade">
                <thead>
                    <!-- Cabeçalho da Tabela -->
                    <tr>
                        <th class="hidden">ID</th><!-- Cabeça da Coluna -->
                        <th>LOGIN</th>
                        <th>NÍVEL</th>
                        <th>
                            <a href="usuarios_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                                <span class="hidden-xs">ADICIONAR<br></span>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Corpo da Tabela -->
                    <?php do { ?>
                    <tr>
                        <td class="hidden"><?php echo $row['id_usuario']; ?></td>
                        <td><?php echo $row['login_usuario']; ?></td>
                        <td><?php
                      if($row['nivel_usuario']=='sup'){
                          echo ("<span class='glyphicon glyphicon-sunglasses text-info' aria-hidden='true'></span>");
                      }else
                      if($row['nivel_usuario']=='com'){
                          echo ("<span class='glyphicon glyphicon-user text-default' aria-hidden='true'></span>");
                      };
                    ?>
                            <?php echo $row['nivel_usuario']; ?>
                        </td>
                        <td>
                            <a href="usuarios_atualiza.php?id_usuario=<?php echo $row['id_usuario']; ?>" target="_self" class="btn btn-warning btn-block btn-xs" role="button">
                                <span class="hidden-xs">ALTERAR<br></span>
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </a>
                            <button data-nome="<?php echo $row['login_usuario']; ?>" data-id="<?php echo $row['id_usuario']; ?>" class="delete btn btn-danger btn-block btn-xs">
                                <span class="hidden-xs">EXCLUIR<br></span>
                                <span class="glyphicon glyphicon-trash" aria-hidden="true">
                            </button>
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc()); ?>
                </tbody>
            </table>
    </main>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">ATENÇÃO!</h4>
                </div>
                <div class="modal-body">
                    Deseja Mesmo EXCLUIR o Item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Script para o Modal -->
    <script type="text/javascript">
        $('.delete').on('click', function() {
            var nome = $(this).data('nome');
            var id = $(this).data('id');
            $('span.nome').text(nome);
            $('a.delete-yes').attr('href', 'usuarios_exclui.php?id_usuario=' + id);
            $('#myModal').modal('show');
        });
    </script>
</body>

</html>
<?php mysqli_free_result($lista); ?>