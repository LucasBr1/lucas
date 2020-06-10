<!doctype html>
<html lang="pt-br">

<head>
    <title>
        Chuleta Quente
    </title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <!-- Área do MENU -->
    <?php include('menu_publico.php'); ?>
    <a name="home">&nbsp;</a>
    <?php include('carroussel.php'); ?>
    <main class="container">

        <!-- Área de DESTAQUES -->
        <a name="destaques">&nbsp;</a>
        <hr>
        <?php include('produtos_destaque.php'); ?>

        <!-- Área de PRODUTOS EM GERAL -->
        <a name="produtos">&nbsp;</a>
        <hr>
        <?php include('produtos_geral.php'); ?>

        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
            <a name="contato">&nbsp;</a>
        </footer>



    </main>


    <!-- Link arquivos bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>