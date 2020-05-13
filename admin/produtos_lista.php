<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta = "SELECT * FROM tbprodutos ORDER BY descri_produto ASC";
// Fazer a lista completa dos dados
$lista = $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>Produtos - Lista</title>
<meta charset="utf-8">
<!-- Depois vamos inserir aqui o Bootstrap -->
</head>
<body>
<main>
    <h1>Lista de Produtos</h1>
    <table border="1">
        <!-- thead>tr>th*8 -->
        <thead><!-- Cabeçalho da Tabela -->
            <tr>
                <th>ID</th><!-- Cabeça da Coluna -->
                <th>TIPO</th>
                <th>DESTAQUE</th>
                <th>DESCRIÇÃO</th>
                <th>RESUMO</th>
                <th>VALOR</th>
                <th>IMAGEM</th>
                <th>ADICIONAR</th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody><!-- Corpo da Tabela -->
           <?php do { ?><!-- Abre a Estrutura de Repetição -->
            <tr><!-- Linha da Tabela -->
                <!-- Insira os Dados Determinando a Linha e o Campo -->
                <td><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['id_tipo_produto']; ?></td>
                <td><?php echo $row['destaque_produto']; ?></td>
                <td><?php echo $row['descri_produto']; ?></td>
                <td><?php echo $row['resumo_produto']; ?></td>
                <td><?php echo $row['valor_produto']; ?></td>
                <!-- Para Exibir a Imagem Insira em src Indicando o diretório que está Armazenada e a Variável com seu Nome -->
                <td>
                    <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="<?php echo $row['descri_produto']; ?>" width="100px">
                </td>
                <td>ALTERAR|EXCLUIR</td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?> <!-- Fecha a Estrutura de Repetição -->
        </tbody>
    </table>
</main>
</body>
</html>
<?php mysqli_free_result($lista); ?>