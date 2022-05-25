<?php

use php\src\Employee;

require_once 'vendor/autoload.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Colaborador</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    include("php/requires/header.html");
    ?>

    <main>
        <section class="container bg-light rounded mt-5 mb-5 p-5">
            <h1 class="text-center fs-4">Cadastro de Colaborador</h1>
            <h2 class="fs-5 text-center border-bottom pb-4">Nessa página, faça o cadastro de um novo colaborador para ser armazenado no sistema e se realizar avaliações.</h2>
            <form action="php/utils/registerEmp.php" method="post">

                <div class="row mt-4">
                    <div class="col">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="col">
                        <label for="surname" class="form-label">Sobrenome:</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>

                    <div class="col">
                        <label for="user" class="form-label">Email de Acesso:</label>
                        <input type="text" class="form-control" id="user" placeholder="nome@dominio.com" name="user">
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="birthDate" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate">
                    </div>


                    <div class="col">
                        <label for="admissionDate" class="form-label">Data de admissão:</label>
                        <input type="date" class="form-control" id="admissionDate" name="admissionDate">
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-8">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf">
                    </div>

                    <div class="col">
                        <label for="sex" class="form-label">Sexo:</label>
                        <select name="sex" id="sex" class="form-select">
                            <option value="0" disabled selected>Selecione o sexo</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="cellNum" class="form-label">Número de Celular:</label>
                        <input type="text" class="form-control" id="cellNum" name="cellNum" placeholder="(xx) xxxxx-xxxx">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="occupation" class="form-label">Cargo:</label>
                        <input type="text" name="occupation" class="form-control" id="occupation">
                    </div>
                    <div class="col">
                        <label for="sector" class="form-label">Setor:</label>
                        <input type="text" class="form-control" id="sector" name="sector">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="periodDays" class="form-label">Período de dias para se realizar avaliações:</label>
                        <input type="text" class="form-control" id="periodDays" name="periodDays">
                    </div>

                    <div class="col">
                        <p>Senha de acesso gerada:</p>
                        <p>
                            <?php

                            $_SESSION['password'] = Employee::randomPassword();
                            echo $_SESSION['password'];
                            ?></p>
                    </div>

                </div>

                <div class="row mt-4">
                    <p class="text-danger col">
                        <?php

                        if (isset($_SESSION["register_error"])) {
                            echo $_SESSION["register_error"];
                            unset($_SESSION["register_error"]);
                        }
                        ?></p>
                    <p class="col"></p>
                </div>

                <button class="btn btn-primary mt-4 px-5" type="submit">Cadastrar</button>
            </form>


        </section>
    </main>
</body>

</html>