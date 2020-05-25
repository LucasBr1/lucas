<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta = "SELECT * FROM tbprodutos ORDER BY descri_produto ASC";
// Fazer a lista completa dos dados
$lista = $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Produtos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
    <h1>Lista de Produtos</h1>
    <table border="1">
        <!-- thead>tr>th*8 -->
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th>ID</th><!-- Cabeça da Coluna -->
                <th>TIPO</th>
                <th>DESTAQUE</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th><a href="produtos_insere.php">ADICIONAR</a></th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?><!-- Abre a Estrutura de Repetição -->
            <tr><!-- Linha da Tabela -->
                <!-- Insira os Dados Determinando a Linha e o Campo -->
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td><?php echo $row['destaque_produto']; ?></td>
                <td><?php echo $row['descri_produto']; ?></td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo $row['valor_produto']; ?></td>
                <!-- Para Exibir a Imagem Insira em src Indicando o diretório que está Armazenada e a Variável com seu Nome -->
                <td>
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="<?php echo $row['descri_produto']; ?>" width="100px">
                </td>
                <td>ALTERAR|
                <button class="delete btn btn-danger btn-block btn-xs" data-nome="<?php echo $row['descri_produto']; ?>" data-id="<?php echo $row['id_produto']; ?>">
                    <span class="hidden-xs">EXCLUIR</span>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true">
                    </span>
                </button>
                
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?> <!-- Fecha a Estrutura de Repetição -->
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
        // Buscar o Valor do Atributo data-nome
        var id   = $(this).data('id');
        // Buscar o Valor do Atributo data-id
        $('span.nome').text(nome);
        // Inserir o Nome do Item na Pergunta de Confirmação
        $('a.delete-yes').attr('href','produtos_exclui.php?id_produto=' +id);
        // Mudar Dinâmicamente o id do Link no Botão Confirmar
        $('#myModal').modal('show'); // Modal Abre
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>