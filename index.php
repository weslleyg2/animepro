<?php
session_start();
$msg = 0;
@$msg = $_SESSION['msg'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Anime Pro</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

  <section class="container">
    <h1>Lista de Espera do treinamento</h1>
    <h2>Anime pro evolution</h2>
    <p>Se increva e fique por dentro de todas a as novas informações que surgirem sobre o nosso treinamento.</p>
    <p>Quem estiver na lista de espera com certeza terá <strong>prioridade</strong>.</p>
    <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
    <form action="process.php" method="POST">
      <label for="text" class="label">
        Nome
        <input type="name" name="name" id="name" placeholder="Digite o nome completo">
      </label>
      <label for="text" class="label">
        Email
        <input type="email" name="email" id="email" placeholder="exemplo@gmail.com">
      </label>
      <label>Fone
        <input type="tel" name="phone" id="phone" class="telefone" placeholder="(xx) xxxxx-xxxx">
      </label>
      <a class="link" href="./telegram.html"><input type="submit" value="Enviar Formulário" class="btn">
      </a>
    </form>
  </section>

  <script src="./assets/js/main.js"></script>
</body>

</html>