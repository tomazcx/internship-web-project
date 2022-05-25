<?php

use php\DAOs\RatingAspectDAO;
use php\DAOs\RatingDAO;

require_once('vendor/autoload.php');
session_start();

$ratingAspectDAO = new RatingAspectDAO();
$ratingDAO = new RatingDAO();

$fk_rating = $_GET['id_rating'];

$rating_list = $ratingDAO->read();
$final_grade = $ratingDAO->returnFinalGrade($rating_list, $fk_rating);

$aspects = $ratingAspectDAO->read($fk_rating);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Avaliação</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if ($_SESSION['user_type'] == 1)
        include "php/requires/header.html"
    ?>

    <main>
        <section class="container bg-light rounded mt-5 mb-5 p-5 w-100">
            <div class="row border-top pt-3">
                <p class="col">Competência</p>
                <p class="col text-center">Comentários Adicionais</p>
                <p class="col text-end">Pontuação Final</p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Comprometimento</p>
                <p class="col text-center">
                    <?php

                    $aspect = $ratingAspectDAO->returnAspect($aspects, 1);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 1);
                    echo $aspect['grade'];
                    ?>
                </p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Aproveitamento do tempo</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 2);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 2);
                    echo $aspect['grade'];
                    ?></p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Versatilidade</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 3);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 3);
                    echo $aspect['grade'];
                    ?>
                </p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Integração com o grupo</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 4);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 4);
                    echo $aspect['grade'];
                    ?>
                </p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Relações interpessoais</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 5);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 5);
                    echo $aspect['grade'];
                    ?>
                </p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Cultura da Empresa</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 6);
                    echo $aspect['description'];
                    ?>.</p>
                <p class="col text-end">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 6);
                    echo $aspect['grade'];
                    ?>
                </p>
            </div>

            <div class="row border-top pt-3">
                <p class="col">Oportunidades de Aprendizado e Melhoria</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 7);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end"></p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Habilidades</p>
                <p class="col text-center">
                    <?php
                    $aspect = $ratingAspectDAO->returnAspect($aspects, 8);
                    echo $aspect['description'];
                    ?></p>
                <p class="col text-end"></p>
            </div>
            <div class="row border-top pt-3">
                <p class="col">Média Final</p>
                <p class="col text-center"></p>
                <p class="col text-end">
                    <?php
                    echo $final_grade;
                    ?>
                </p>
            </div>

        </section>
    </main>
</body>

</html>