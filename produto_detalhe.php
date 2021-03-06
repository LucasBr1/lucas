<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_produtos.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "vw_tbprodutos";
$campo_filtro  = "id_produto";
$filtro_select = $_GET['id_produto'];
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_publico.php'); ?>
    <?php include('carroussel.php'); ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <strong><?php echo $row['descri_produto']; ?></strong>
        </h2>
        <div class="row">
            <!-- Manter os Elementos na Linha -->
            <!-- Abre a Estrutura de Repetição -->
            <?php do{ ?>
            <!-- Abre thumbnail/card -->
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <!-- Dimensionamento -->
                <div class="thumbnail">
                    <img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded">
                    <div class="caption text-right">
                        <h3 class="text-danger">
                            <strong><?php echo $row['descri_produto']; ?></strong>
                        </h3>
                        <p class="text-warning">
                            <strong><?php echo $row['rotulo_tipo']; ?></strong>
                        </p>
                        <p class="text-left">
                            <?php echo $row['resumo_produto']; ?>
                        </p>
                        <p>
                            <button class="btn btn-default disabled" role="button">
                                <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Fecha thumbnail/card -->
            <?php } while ($row=$lista->fetch_assoc()); ?>
            <!-- Fecha a Estrutura de Repetição -->
        </div>
        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
        </footer>
    </main>
    <!-- Link arquivos bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php mysqli_free_result($lista); ?>