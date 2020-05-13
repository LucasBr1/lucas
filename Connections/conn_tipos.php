<?php
$hostname_conn = "localhost";
$database_conn = "iwane047_ti09";
$username_conn = "iwane047_ti09";
$password_conn = "senacti09";
$charset_conn = "utf-8";

$conn_tipos = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);

mysqli_set_charset($conn_tipos,$charset_conn);

if($conn_tipos->connect_error){
    echo "Error: ".$conn_tipos->connect_error;
};
?>