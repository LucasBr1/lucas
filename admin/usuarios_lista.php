<?php
include("../Connections/conn_produtos.php");
mysqli_select_db($conn_produtos,$database_conn);
$consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC";
$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Usuários - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
</head>
<body>
<main>
    <h1>Lista de Usuários</h1>
    <table border="1">
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th>ID</th><!-- Cabeça da Coluna -->
                <th>LOGIN</th>
                <th>NÍVEL</th>
                <th>ADICIONAR</th>
            </tr>
        </thead>
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['login_usuario']; ?></td>
                <td><?php echo $row['nivel_usuario']; ?></td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
        </tbody>
    </table>
</main>
</body>
</html>
<?php mysqli_free_result($lista); ?>