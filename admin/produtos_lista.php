<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta = "SELECT * FROM vw_tbprodutos ORDER BY destaque_produto ASC, descri_produto ASC";
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

<link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <h1 class="breadcrumb alert-danger">Lista de Produtos</h1>
    <table class="table table-hover table-condensed tbopacidade">
        <!-- thead>tr>th*8 -->
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th class="hidden">ID</th><!-- Cabeça da Coluna -->
                <th>TIPO</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>
                <a href="produtos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                    <span class="hidden-xs">ADICIONAR</span>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">

                    </span>
                </a></th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?><!-- Abre a Estrutura de Repetição -->
            <tr><!-- Linha da Tabela -->
                <!-- Insira os Dados Determinando a Linha e o Campo -->
                <td class="hidden"><?php echo $row['id_produto']; ?></td>
                <td>
                    <span class="visible-xs"><?php echo $row['sigla_tipo']; ?></span>
                    <span class="hidden-xs"><?php echo $row['rotulo_tipo']; ?></span>
                </td>
                <td><?php
                      if($row['destaque_produto']=='Sim'){
                          echo ("<span class='glyphicon glyphicon-heart text-danger' aria-hidden='true'></span>");
                      }else
                      if($row['destaque_produto']=='Não'){
                          echo ("<span class='glyphicon glyphicon-ok text-info' aria-hidden='true'></span>");
                      };
                    ?>
                    <?php echo $row['descri_produto']; ?>
                </td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo number_format($row['valor_produto'],2,',','.') ?>
                <!-- Vírgula >> 0,00 >> Separador de decimais
                     Ponto >> 1.000 >> Separador de milhares -->
                </td>
                <!-- Para Exibir a Imagem Insira em src Indicando o diretório que está Armazenada e a Variável com seu Nome -->
                <td>
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="<?php echo $row['descri_produto']; ?>" width="100px">
                </td>
                <td>
                <a href="produtos_atualiza.php?id_produto=<?php echo $row['id_produto']; ?>" target="_self" role="button" class="btn btn-warning btn-block btn-xs">
                    <span class="hidden-xs">ALTERAR<br></span>
                    <span class="glyphicon glyphicon-refresh" aria-hidden="true">
                </a>
                <button class="delete btn btn-danger btn-block btn-xs" data-nome="<?php echo $row['descri_produto']; ?>" data-id="<?php echo $row['id_produto']; ?>">
                    <span class="hidden-xs">EXCLUIR<br></span>
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