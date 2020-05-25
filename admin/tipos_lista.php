<?php
include("../Connections/conn_produtos.php");
mysqli_select_db($conn_produtos,$database_conn);
$consulta = "SELECT * FROM tbtipos ORDER BY rotulo_tipo ASC";
$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Tipos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
    <h1>Lista de Tipos</h1>
    <table border="1">
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th>ID</th><!-- Cabeça da Coluna -->
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <th><a href="tipos_insere.php">ADICIONAR</a></th>
            </tr>
        </thead>
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?>
            <tr>
                <td><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>ALTERAR|
                    <button data-nome="<?php echo $row['rotulo_tipo']; ?>" data-id="<?php echo $row['id_tipo']; ?>" class="delete btn btn-danger btn-xs">
                        <span class="hidden-xs">EXCLUIR</span>
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
    $('.delete').on('click',function(){
        var nome = $(this).data('nome');
        var id   = $(this).data('id');
        $('span.nome').text(nome);
        $('a.delete-yes').attr('href','tipos_exclui.php?id_tipo=' +id);
        $('#myModal').modal('show');
    });
</script>

</body>
</html>
<?php mysqli_free_result($lista); ?>