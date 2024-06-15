<?php
require("conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id_peca']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $marca = mysqli_real_escape_string($conn, $_POST['marca']);
    $sistema = mysqli_real_escape_string($conn, $_POST['sistema']);
    $aplicacao = mysqli_real_escape_string($conn, $_POST['aplicacao']);

    $query = "UPDATE pecas SET nome='$nome', marca='$marca', sistema='$sistema', aplicacao='$aplicacao' WHERE id_peca='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Dados atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
echo '<br><br>';
echo '<a href="visualiza_pecas.php"><input type="button" value="Voltar"></a>';
?>


