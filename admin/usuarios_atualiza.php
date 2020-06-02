<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

// variáveis globais
$tabela         = "tbusuarios";
$campo_filtro   = "id_usuario";

if($_POST){
    // definindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);

    // Receber os dados do formulário
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];

    // campo para filtrar o registro (WHERE)
    $filtro_update  = $_POST['id_usuario'];

    // Consulta SQL para atualização dos dados
     $updateSQL  = "UPDATE ".$tabela."
                    SET login_usuario   = '".$login_usuario."',
                        senha_usuario   = '".$senha_usuario."',
                        nivel_usuario   = '".$nivel_usuario."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_produtos->query($updateSQL);

     // Após a ação a página será redirecionada
     $destino    = "usuarios_lista.php";
     if(mysqli_insert_id($conn_produtos)){
         header("Location: $destino");
     }else{
         header("Location: $destino");
     };   
}

// consulta para trazer e filtrar os dados
// definindo o USE do banco de dados
mysqli_select_db($conn_produtos, $database_conn);
$filtro_select  = $_GET['id_usuario'];
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
    <title>Usuários - Atualiza</title>
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
            <h2 class="breadcrumb text-info">
            <a href="usuarios_lista.php">
                <button class="btn btn-info" type="button">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </button>
            </a>
                Atualizando Usuários
            </h2>
            <div class="thumbnail">
                <div class="alert alert-info" role="alert">
                    <form action="usuarios_atualiza.php" name="form_atualiza_usuario" id="form_atualiza_usuario" method="post" enctype="multipart/form-data">
                    <!-- Inserir o campo id_usuario oculto pra uso em filtro -->
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']?>">
                    <!-- input login_usuario-->
                        <label for="login_usuario">Login:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="login_usuario" id="login_usuario" autofocus maxlength="15" placeholder="Digite o login." class="form-control" required value="<?php echo $row['login_usuario']; ?>">
                        </div>
                        <br>
                        <!-- input senha_usuario -->
                        <label for="senha_usuario">Senha:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>
                            <input type="password" name="senha_usuario" id="senha_usuario" maxlenght="15" placeholder="Digite a senha." class="form-control" required value="<?php echo $row['senha_usuario']; ?>" >
                        </div>
                        <br>
                        <!-- Radio nivel_usuario -->
                        <label for="nivel_usuario">Nível:</label>
                        <div class="input-group">
                            <label class="radio-inline" for="nivel_usuario_c">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="com" <?php echo $row['nivel_usuario']=="com" ? "checked" : null; ?> >Comum
                            </label>
                            <label class="radio-inline" for="nivel_usuario_s">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="sup" <?php echo $row['nivel_usuario']=="sup" ? "checked" : null; ?> >Supervisor
                            </label>
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Link arquivos bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>