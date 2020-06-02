<!doctype html>
<html lang="pt-br">
<head>
<title>Área Administrativa</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>
<body class="fundofixo">
    <main class="container">
        <h1 class="breadcrumb">Área Adminisrativa</h1>
        <div class="row"> <!-- Manter os Elementos na Linha -->
            <!-- ADM PRODUTOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-danger">
                    <img src="../imagens/icone_produtos.png" alt="">
                    <br>
                    <div class="alert-danger">
                       <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled">
                                    PRODUTOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                        <!-- Grupo de Botões -->
                        <div class="btn-group btn-group-justified" role="group">
                           <!-- Botão Listar -->
                            <div class="btn-group">
                               <a href="produtos_lista.php">
                                <button class="btn btn-danger">
                                    Listar
                                </button>
                               </a>
                            </div>
                        <!-- Fecha Botão Lista -->
                        <!-- Botão Inserir -->
                            <div class="btn-group">
                               <a href="produtos_insere.php">
                                <button class="btn btn-danger">
                                    Inserir
                                </button>
                               </a>
                            </div>
                            <!-- Fecha Botão Inserir -->
                        </div>
                        <!-- Fecha Grupo de Botões -->
                    </div>
                </div>
            </div> 
            <!-- Fecha ADM PRODUTOS -->
            <!-- ADM TIPOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-warning">
                    <img src="../imagens/icone_tipos.png" alt="">
                    <br>
                    <div class="alert-danger">
                       <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled">
                                    TIPOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                        <!-- Grupo de Botões -->
                        <div class="btn-group btn-group-justified" role="group">
                           <!-- Botão Listar -->
                            <div class="btn-group">
                               <a href="tipos_lista.php">
                                <button class="btn btn-warning">
                                    Listar
                                </button>
                               </a>
                            </div>
                        <!-- Fecha Botão Lista -->
                        <!-- Botão Inserir -->
                            <div class="btn-group">
                               <a href="tipos_insere.php">
                                <button class="btn btn-warning">
                                    Inserir
                                </button>
                               </a>
                            </div>
                            <!-- Fecha Botão Inserir -->
                        </div>
                        <!-- Fecha Grupo de Botões -->
                    </div>
                </div>
            </div> 
            <!-- Fecha ADM TIPOS -->
            <!-- ADM USUÁRIOS -->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail alert-info">
                    <img src="../imagens/icone_user.png" alt="">
                    <br>
                    <div class="alert-info">
                       <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled">
                                    USUÁRIOS
                                </button>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                    <!-- Grupo de Botões -->
                        <div class="btn-group btn-group-justified" role="group">
                           <!-- Botão Listar -->
                            <div class="btn-group">
                               <a href="usuarios_lista.php">
                                <button class="btn btn-info">
                                    Listar
                                </button>
                               </a>
                            </div>
                        <!-- Fecha Botão Lista -->
                        <!-- Botão Inserir -->
                            <div class="btn-group">
                               <a href="usuarios_insere.php">
                                <button class="btn btn-info">
                                    Inserir
                                </button>
                               </a>
                            </div>
                        <!-- Fecha Botão Inserir -->
                        </div>
                    <!-- Fecha Grupo de Botões -->
                    </div>
                </div>
            </div> 
            <!-- Fecha ADM USUÁRIOS -->
        </div> <!-- Fecha os Elementos na Linha -->
    </main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>