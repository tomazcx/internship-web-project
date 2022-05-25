<?php

use php\DAOs\AdmDAO;

require_once 'vendor/autoload.php';
session_start();

if (!(isset($_SESSION['user_data']))) {
    header("Location: Login.php");
    exit();
}

$user_data = $_SESSION['user_data'];
$id_adm = $user_data['id_adm'];

$admDAO = new AdmDAO();

$result = $admDAO->read();
$admProfile = array();
foreach ($result as $adm) {
    if ($adm['id_adm'] == $id_adm) {
        $admProfile = $adm;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <section class="container bg-light rounded mt-5 mb-5 p-5 w-75">
            <div class="d-flex px-5">
                <img src="img/icon1.png" alt="" class="iconProfile">

                <div class="mx-5">
                    <h1 class="fs-3">
                        <?php
                        if (empty($admProfile['name'])) {
                            echo 'adm_name';
                        } else {
                            $completeName = $admProfile['name'] . " " . $admProfile['surname'];
                            echo $completeName;
                        }
                        ?>
                    </h1>
                    <h2 class="fs-4">
                        <?php
                        if (empty($admProfile['occupation'])) {
                            echo 'adm_occupation';
                        } else {
                            echo $admProfile['occupation'];
                        }
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
                        if (empty($admProfile['cell_num'])) {
                            echo 'cell_num';
                        } else {
                            echo $admProfile['cell_num'];
                        }
                        ?>
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col">Sexo:</p>
                    <p class="col">
                        <?php
                        if (empty($admProfile['sex'])) {
                            echo 'sex';
                        } else {
                            if ($admProfile['sex'] == 2)
                                echo 'Feminino';
                            else if ($admProfile['sex'] == 1) {
                                echo 'Masculino';
                            } else {
                                echo 'Indisponível';
                            }
                        }
                        ?>
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col">Data de Nascimento:</p>
                    <p class="col">
                        <?php
                        if (empty($admProfile['birth_date'])) {
                            echo 'birth_date';
                        } else {
                            echo $admProfile['birth_date'];
                        }
                        ?>
                    </p>
                </div>
                <div class="row mb-3">
                    <p class="col">Data de Admissão:</p>
                    <p class="col">
                        <?php
                        if (empty($admProfile['admission_date'])) {
                            echo 'admission_date';
                        } else {
                            echo $admProfile['admission_date'];
                        }
                        ?>
                    </p>
                </div>
                <div class="row mb-5">
                    <p class="col">CPF:</p>
                    <p class="col">
                        <?php
                        if (empty($admProfile['cpf'])) {
                            echo 'cpf_num';
                        } else {
                            echo $admProfile['cpf'];
                        }
                        ?></p>
                </div>
                <div class="d-flex mb-3">
                    <div class="">
                        <a class="text-decoration-none bg-primary rounded text-light px-4 py-2" href="EditAdm.php">Editar Dados</a>
                    </div>
                    <div class="ms-5">
                        <a class="text-decoration-none bg-primary rounded text-light px-4 py-2" href="php/utils/end_session.php">Deslogar</a>
                    </div>


                </div>
            </div>

        </section>


</body>

</html>