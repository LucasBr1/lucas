<?php 
include("../Connections/conn_produtos.php");

// Variaveis Globais
$tabela         = "tbtipos";
$campo_filtro   = "id_tipo";

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_produtos,$database_conn);
    
    // Receber os Dados do Formulário
    $sigla_tipo    = $_POST["sigla_tipo"];
    $rotulo_tipo   = $_POST["rotulo_tipo"];
    
    // Campo para filtrar o registro (WHERE)
    $filtro_update = $_POST['id_tipo'];
    
    // Consulta SQL para Inserção dos Dados
    $updateSQL  =   "UPDATE ".$tabela." 
                    SET sigla_tipo = '".$sigla_tipo."',
                        rotulo_tipo = '".$rotulo_tipo."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_produtos->query($updateSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "tipos_lista.php";
    if (mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
}

// Consulta para Trazer e Filtrar os Dados
// Definindo o USE do Banco de Dados
mysqli_select_db($conn_produtos,$database_conn);
$filtro_select  = $_GET['id_tipo'];
$consulta       = "SELECT *
                  FROM ".$tabela."
                  WHERE ".$campo_filtro."=".$filtro_select."";
$lista          = $conn_produtos->query($consulta);
$row            = $lista->fetch_assoc();
$totalRows      = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Tipos - Atualiza</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h2 class="breadcrumb text-warning">
              <a href="tipos_lista.php">
                  <button class="btn btn-warning" type="button">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  </button>
              </a>
               Atualizando Tipos
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning">
                    <form action="tipos_atualiza.php" name="form_atualiza_tipo" id="form_atualiza_tipo" method="post" enctype="multipart/form-data">
                      <!-- Inserir o Campo id_tipo Oculto pra Uso em Filtro -->
                      <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $row['id_tipo']; ?>">
                       <!-- input rotulo_tipo -->
                        <label for="rotulo_tipo">Rótulo</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="rotulo_tipo" id="rotulo_tipo" autofocus maxlength="15" placeholder="Digite o Tipo do Produto." class="form-control" required value="<?php echo $row['rotulo_tipo']; ?>">
                        </div>
                        <br>
                        <!-- input sigla_tipo -->
                        <label for="sigla_tipo">Sigla</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="sigla_tipo" id="sigla_tipo" maxlength="3" placeholder="Digite a Sigla do Tipo" class="form-control" required value="<?php echo $row['sigla_tipo']; ?>">
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn-warning">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

   <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>