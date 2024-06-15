<?php
    $servername = "localhost";
    $database = "projeto";
    $username = "root";
    $password = "123456";


    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou. Erro: " . mysqli_connect_error());
    }
?>