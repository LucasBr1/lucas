<?php
include("../Connections/conn_produtos.php");
mysqli_select_db($conn_produtos,$database_conn);
$consulta = "SELECT * FROM tbtipos ORDER BY rotulo_tipo ASC";
$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Tipos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
</head>
<body>
<main>
    <h1>Lista de Tipos</h1>
    <table border="1">
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th>ID</th><!-- Cabeça da Coluna -->
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <th>ADICIONAR</th>
            </tr>
        </thead>
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?>
            <tr>
                <td><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
        </tbody>
    </table>
</main>
</body>
</html>
<?php mysqli_free_result($lista); ?>