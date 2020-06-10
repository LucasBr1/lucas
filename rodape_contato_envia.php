<!doctype html>
<html lang="pt-br">

<head>
    <!-- Após 15 segundos a página será redirecionada para index.php -->
    <meta http-equiv="refresh" content="15;URL=index.php">
    <title>
        Verificação do Contato
    </title>
    <meta charset="utf-8">
</head>

<body class="fundofixo">
    <?php include('menu_publico.php');  ?>
    <?php include('carroussel.php');  ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-danger">
                <h1 class="text-danger">Agradecemos seu Contato!</h1>
                <?php 
            $destino        = "contato@chuletaquente.com.br";
            $nome_contato   = $_POST['nome_contato'];
            $email_contato  = $_POST['email_contato'];
            $msg_contato    = "Mensagem de:".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
            $mailsend       = mail("$destino","Formulário de Comentário","$msg_contato","From: $email_contato");
        
            echo "<p class='text-center'>Obrigado por enviar seus comentários, <b>$nome_contato</b>!</p>";
            echo "<p class='text-center'>Mensagem enviada com sucesso!</p>";
        ?>
                <h5 class="text-center">
                    Caso não visualize a mensagem de agradecimento, entre em contato através do email
                    <b><i><?php echo $destino ?></i></b>
                </h5>
            </div>
        </section>
        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
        </footer>

    </main>

</body>

</html>