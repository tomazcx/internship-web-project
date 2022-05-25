<?php

use php\DAOs\AdmDAO;
use php\DAOs\RatingDAO;

require_once 'vendor/autoload.php';
session_start();
$emp_data = $_SESSION['user_data'];

$id = $emp_data['id_emp'];
$fk_adm = $emp_data['fk_id_adm'];

$ratingDAO = new RatingDAO();
$admDAO = new AdmDAO();

$adm = $admDAO->returnAdm($id);
$adm = $adm['name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Colaborador</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
</head>

<body>

    <main>
        <section class="container bg-light rounded mt-5 mb-5 p-5 w-75">
            <div class="d-flex px-5">
                <img src="img/icon1.png" alt="" class="iconProfile">

                <div class="mx-5">
                    <h1 class="fs-3">
                        <?php
                        $complete_name = $emp_data['name'] . ' ' . $emp_data['surname'];
                        echo $complete_name;
                        ?>
                    </h1>
                    <h2 class="fs-4">Número de avaliações cadastradas:
                        <?php
                        echo $emp_data['feedback_num'];
                        ?>
                    </h2>
                    <h2 class="fs-4">Período de dias para se realizar avaliações:
                        <?php
                        echo $emp_data['period_days'] . ' dias';
                        ?>
                    </h2>
                    <h2 class="fs-4">Média geral do funcionário:
                        <?php
                        echo $emp_data['grade'];
                        ?>
                    </h2>
                    <h2 class="fs-4">
                        <?php
                        echo $emp_data['occupation'];
                        ?>
                    </h2>

                </div>
            </div>

            <div class="border-top border-bottom mt-5">
                <p class="mt-3 ps-5">Dados Cadastrados</p>
            </div>
            <div class="ps-5">
                <div class="row mt-5 mb-3">
                    <p class="col">Número de Celular:</p>
                    <p class="col">
                        <?php
                        echo $emp_data['cell_num'];
                        ?></p>
                </div>
                <div class="row mb-3">
                    <p class="col">Sexo:</p>
                    <p class="col">
                        <?php
                        if ($emp_data['sex'] == 2) {
                            echo 'Feminino';
                        } else if ($emp_data['sex'] == 1) {
                            echo 'Masculino';
                        } else {
                            echo 'Indisponível';
                        };
                        ?>
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col">Data de Nascimento:</p>
                    <p class="col">
                        <?php
                        echo $emp_data['birth_date'];
                        ?>
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col">Data de Admissão:</p>
                    <p class="col">
                        <?php
                        echo $emp_data['admission_date'];
                        ?>
                    </p>
                </div>
                <div class="row mb-5">
                    <p class="col">CPF:</p>
                    <p class="col">
                        <?php
                        echo $emp_data['cpf'];
                        ?></p>
                </div>
            </div>

        </section>

        <section class="container bg-light rounded mt-5 mb-5 p-5 w-75">
            <h1 class="text-center fs-4">Avaliações Cadastradas</h1>

            <div class="row border-top border-bottom mt-4">
                <p class="col"></p>
                <p class="col mt-3 text-center">Data registro</p>
                <p class="col mt-3 text-center">Média</p>
                <p class="col mt-3 text-center"></p>
                <p class="col mt-3 text-center">Visualizar Detalhes</p>
            </div>

            <?php
            $result = $ratingDAO->read();

            if ($result) {
                foreach ($result as $rating) {
                    if ($rating['fk_emp'] == $id) {
                        $rating_id = $rating['id_rating'];
                        $rating_id++;
                        include("php/requires/rate.php");
                    }
                }
            }

            ?>




        </section>


</body>

</html>