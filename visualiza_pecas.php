<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Visualização de Peças</title>
</head>
<body>
    <center>
        <h1>Peças Cadastradas</h1>

        <table border="4">
            <tr>
                <td class = "id">ID</td>
                <td class = "nome">NOME</td>
                <td class = "marca">MARCA</td>
                <td class = "sistema">SISTEMA</td>
                <td class = "aplic">APLICAÇÃO</td>
            </tr>
            <?php
                require("conecta.php");

                $dados_select = mysqli_query($conn, "SELECT id_peca, NOME, MARCA, SISTEMA, APLICACAO FROM PECAS");

                while($dado = mysqli_fetch_array($dados_select)) {
                        echo '<tr>';
                        echo '<td>'.$dado[0].'</td>';
                        echo '<td>'.$dado[1].'</td>';
                        echo '<td>'.$dado[2].'</td>';
                        echo '<td>'.$dado[3].'</td>';
                        echo '<td>'.$dado[4].'</td>';
                        echo '<td><a href="update.php?id='.$dado[0].'"><input type="button" value="Alterar Dados"></a></td>';
                        echo '</tr>';
                }
            ?>
        </table>
        <br />
        <a href="index.html"><input type="button" value="Voltar"></a><br><br>
        <a href="delete.php"><input type="button" name="Deletar" value="Deletar"></a>
    </center>
</body>

</html>