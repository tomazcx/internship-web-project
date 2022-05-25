<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">

</head>

<body>

    <main>
        <section class="container bg-light w-25 p-5 rounded position-absolute top-50 start-50 translate-middle">
            <form action="php/utils/login.php" method="post">
                <label for="login_user" class="mb-1">Usuário:</label>
                <input type="text" class="form-control mb-2" name="login_user" id="login_user">
                <label for="login_password" class="mb-1">Senha:</label>
                <input type="password" class="form-control mb-4" name="login_password" id="login_password">
                <select class="form-select mb-4" name="occupation" id="occupation">
                    <option value="0" disabled selected>Selecione o usuário</option>
                    <option value="1">Gerente</option>
                    <option value="2">Colaborador</option>
                </select>
                <p class="text-danger">
                    <?php
                    if(isset($_SESSION['erro_login'])){
                      echo $_SESSION["erro_login"];
                      unset ($_SESSION["erro_login"]);
                    }
                  ?>
                </p>

                <button class="btn btn-primary w-100" type="submit">Entrar</button>
            </form>
        </section>
    </main>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>