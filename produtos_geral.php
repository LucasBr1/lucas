<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_produtos.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "vw_tbprodutos";
$campo_filtro  = "destaque_produto";
$filtro_select = "Não";
$ordenar_por    = "descri_produto ASC";
$consulta   =   "SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro_select."'
                ORDER BY ".$ordenar_por."";
$lista      =   $conn_produtos->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Produtos</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css"> -->
</head>

<body class="container">
    <h2 class="breadcrumb alert-danger">Produtos</h2>
    <div class="row">
        <!-- Manter os Elementos na Linha -->
        <!-- Abre a Estrutura de Repetição -->
        <?php do{ ?>
        <!-- Abre thumbnail/card -->
        <div class="col-sm-6 col-md-4">
            <!-- Dimensionamento -->
            <div class="thumbnail">
                <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>">
                    <img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded" style="height: 20em;">
                </a>
                <div class="caption text-right">
                    <h3 class="text-danger">
                        <strong><?php echo $row['descri_produto']; ?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo $row['rotulo_tipo']; ?></strong>
                    </p>
                    <p class="text-left">
                        <?php echo mb_strimwidth($row['resumo_produto'],0,42,'...'); ?>
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button">
                            <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                        </button>
                        <a href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-danger" role="button">
                            <span class="hidden-xs">
                                Saiba mais...
                            </span>
                            <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Fecha thumbnail/card -->
        <?php } while ($row=$lista->fetch_assoc()); ?>
        <!-- Fecha a Estrutura de Repetição -->
    </div>
    
    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- Link arquivos Bootstrap js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
</body>

</html>
<?php mysqli_free_result($lista); ?>