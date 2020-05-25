<?php 
include("../Connections/conn_produtos.php");

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_produtos,$database_conn);
    
    // Variéveis para Acrescentar Dados ao Banco
    $tabela_insert  = "tbusuarios";
    $campos_insert  = "login_usuario, senha_usuario, nivel_usuario";
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $login_usuario   = $_POST["login_usuario"];
    $senha_usuario   = $_POST["senha_usuario"];
    $nivel_usuario   = $_POST["nivel_usuario"];
    
    // Reunir os Valores a Serem Inseridos
    $valores_insert = "'$login_usuario','$senha_usuario','$nivel_usuario'";
    
    // Consulta SQL para Inserção dos Dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert." 
                        (".$campos_insert.")
                    VALUES
                    (".$valores_insert.")";
    $resultado  = $conn_produtos->query($insertSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "usuarios_lista.php";
    if (mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Usuários - Insere</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
           <h2 class="breadcrumb text-info">
           <a href="usuarios_lista.php">
               <button class="btn btn-info" type="button">
                   <span class="glyphicon glyphicon-chevron-left"></span>
               </button>
           </a>
           Inserindo Usuários
           </h2>
            <div class="thumbnail">
                <div class="alert alert-info" role="alert">
                    <form name="form_usuario_insere" id="form_usuario_insere" action="usuarios_insere.php" method="post" enctype="multipart/form-data">
                       <!-- input login_usuario -->
                        <label for="login_usuario">Usuário:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </span>
                            <input type="text" name="login_usuario" id="login_usuario" maxlength="30" placeholder="Digite o Login do Usuário." class="form-control" required autofocus autocomplete="off">
                        </div>
                        <br>
                        <!-- password senha_usuario -->
                        <label for="senha_usuario">Senha:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            </span>
                            <input class="form-control" type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite a Senha do Usuário." maxlength="8" required autocomplete="off">
                        </div>
                        <br>
                        <!-- Radio nivel_usuario -->
                        <label for="nivel_usuario">Nível:</label>
                        <div class="input-group">
                            <label class="radio-inline" for="nivel_usuario_c">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="com">Comum
                            </label>
                            <label class="radio-inline" for="nivel_usuario_s">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="sup" checked>Super Usuário
                            </label>
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input class="btn btn-info btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
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