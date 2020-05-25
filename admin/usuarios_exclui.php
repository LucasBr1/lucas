<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

// Definindo o USE do Banco de Dados
mysqli_select_db($conn_produtos,$database_conn);

// Definindo e Recebendo Dados para Consulta
$tabela_delete  = "tbusuarios";
$id_tabela_del  = "id_usuario";
$id_filtro_del  = $_GET['id_usuario'];

// SQL para Exclusão
$deleteSQL  = "DELETE
              FROM ".$tabela_delete."
              WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  = $conn_produtos->query($deleteSQL);

// Após a Ação a Página será Redirecionada
$destino    = "usuarios_lista.php";
if (mysqli_insert_id($conn_produtos)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>