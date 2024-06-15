<?php
    require("conecta.php");

    $nome = $_POST['nome'];
    $marca =  $_POST['marca'];
    $sistema = $_POST['sistema'];
    $aplicacao = $_POST['aplicacao'];
    

    $sql = "INSERT INTO pecas (nome, marca, sistema, aplicacao)
    VALUES ('$nome', '$marca', '$sistema', '$aplicacao')";

    if ($conn->query($sql) === TRUE) {
      echo "<center><h1>Registro Inserido com Sucesso</h1>";
      echo "<a href='index.html'><input type='button' value='Voltar'></a></center>";
    } else {
      echo "<h3>OCORREU UM ERRO: </h3>: " . $sql . "<br>" . $conn->error;
    }
?>