<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <form action="delete.php" method="POST">
        <label for="delete">Digite o número do ID que deseja deletar:</label>
        <input type="number" name="id_peca" id="id_peca">
        <input type="submit" value="Deletar">
    </form>
    
        <?php
        require("conecta.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id_peca'];
            $sql = "DELETE FROM pecas WHERE id_peca = '$id' ";

            if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            } else {
            echo "Error deleting record: " . $conn->error;
            }

            $conn->close();
            
            
        }
        echo '<br><br>';
        echo '<a href="visualiza_pecas.php"><input type="button" value="Voltar"></a>';
        ?>
</body>
</html>

