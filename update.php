<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" type="text/css">
  <title>Alteração de Cadastro</title>
</head>
<body>
    <?php 
      require("conecta.php");

      $id = $nome = $marca = $sistema = $aplicacao = ""; // Inicializar variáveis

      if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $id = mysqli_real_escape_string($conn, $id); // Segurança contra SQL Injection

          $query = "SELECT id_peca, nome, marca, sistema, aplicacao FROM pecas WHERE id_peca='$id'";
          $dados_select = mysqli_query($conn, $query);

          if ($dados_select) {
              $dado = mysqli_fetch_array($dados_select);
              if ($dado) {
                  $id = $dado['id_peca'];
                  $nome = $dado['nome'];
                  $marca = $dado['marca'];
                  $sistema = $dado['sistema'];
                  $aplicacao = $dado['aplicacao'];
              } else {
                  echo "Nenhuma peça encontrada com esse ID.";
              }
          } else {
              echo "Erro na consulta: " . mysqli_error($conn);
          }
      } else {
          echo "ID da peça não fornecido.";
      }
    ?>
<div>
    <h1>Alteração de cadastro</h1>
    <p>Complete os campos para cadastrar as peças.</p>
</div>
<div>
    <form method="POST" action="update_action.php">
        <fieldset>
            <legend>Dados da peça:</legend>
            <label for="nome">Nome da peça:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome); ?>">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="<?php echo htmlspecialchars($marca); ?>">
            <label for="sistema">Sistema</label>
            <select name="sistema" id="sistema">
                <option selected disabled value="">Selecione</option>
                <option value="Suspensão" <?php if($sistema == 'Suspensão') echo 'selected'; ?>>Suspensão</option>
                <option value="Freios" <?php if($sistema == 'Freios') echo 'selected'; ?>>Freios</option>
                <option value="Injeção Eletrônica" <?php if($sistema == 'Injeção Eletrônica') echo 'selected'; ?>>Injeção Eletrônica</option>
                <option value="Transmissão" <?php if($sistema == 'Transmissão') echo 'selected'; ?>>Transmissão</option>
                <option value="Motor" <?php if($sistema == 'Motor') echo 'selected'; ?>>Motor</option>
                <option value="Acessórios" <?php if($sistema == 'Acessórios') echo 'selected'; ?>>Acessórios</option>
            </select>
        </fieldset><br>
        <fieldset>
            <label for="aplicacao" class="descricao">Descreva as aplicações da peça:</label>
            <textarea name="aplicacao" id="aplicacao" cols="100" rows="10"><?php echo htmlspecialchars($aplicacao); ?></textarea>
        </fieldset><br>
        <input type="hidden" name="id_peca" value="<?php echo $id; ?>">
        <div>
            <button class="concluir" type="submit">Concluir</button>
            <a href="index.html"><input type="button" value="Voltar"></a>
        </div>
    </form>
</div>
</body>
</html>
