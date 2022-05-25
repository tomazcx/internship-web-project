<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

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
            <h1 class="text-center fs-4">Editar Dados de sua Conta</h1>
            <h2 class="fs-5 text-center border-bottom pb-4">Nessa página, faça a edição dos dados cadastrados em sua conta como gerente.</h2>
            <form action="php/utils/registerAdm.php" method="post">

                <div class="row mt-4">
                    <div class="col">
                        <label for="adm_name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="adm_name" name="adm_name">
                    </div>

                    <div class="col">
                        <label for="adm_surname" class="form-label">Sobrenome:</label>
                        <input type="text" class="form-control" id="adm_surname" name="adm_surname">
                    </div>


                </div>

                <div class="row mt-4">
                    <div class="col">
                        <label for="adm_birthDate" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="adm_birthDate" name="adm_birthDate">
                    </div>


                    <div class="col">
                        <label for="adm_admissionDate" class="form-label">Data de admissão:</label>
                        <input type="date" class="form-control" id="adm_admissionDate" name="adm_admissionDate">
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-8">
                        <label for="adm_cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="adm_cpf" name="adm_cpf">
                    </div>

                    <div class="col">
                        <label for="adm_sex" class="form-label">Sexo:</label>
                        <select name="adm_sex" class="form-select" id="adm_sex">
                            <option value="0" disabled selected>Selecione o sexo</option>
                            <option value="1">Masculino</option>
                            <option value="2">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-8">
                        <label for="adm_cellNum" class="form-label">Número de Celular:</label>
                        <input type="text" class="form-control" name="adm_cellNum" id="adm_cellNum" placeholder="(xx) xxxxx-xxxx">
                    </div>
                    <div class="col">
                        <label for="adm_occupation" class="form-label">Cargo:</label>
                        <input type="text" class="form-control" id="adm_occupation" name="adm_occupation">
                    </div>
                </div>

                <div class="row mt-4">
                    <p class="text-danger col">
                        <?php

                        if (isset($_SESSION["register_error_adm"])) {
                            echo $_SESSION["register_error_adm"];
                            unset($_SESSION["register_error_adm"]);
                        }
                        ?>
                    </p>
                    <p class="col"></p>
                </div>

                <button class="btn btn-primary mt-4 px-5" type="submit">Editar</button>
            </form>


        </section>
    </main>
</body>

</html>