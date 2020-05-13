<?php
include("../Connections/conn_tipos.php");
$consulta = "SELECT * FROM tbtipos ORDER BY rotulo_tipo ASC";
$lista = $conn_tipos->query($consulta);
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
                <th>ROTULO</th>
                <th>ADICIONAR</th>
            </tr>
        </thead>
        <tbody><!-- Corpo da Tabela -->
            <tr>
                <td><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
        </tbody>
    </table>
</main>
</body>
</html>