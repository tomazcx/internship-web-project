<?php

use php\DAOs\empDAO;

require_once 'vendor/autoload.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

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
            <h1 class="text-center fs-4">Prazos de Avaliação</h1>
            <h2 class="fs-5 text-center">Nessa página, gerencie todos os colaboradores com o seus prazos de avaliação a vencer</h2>

            <div class="row border-top border-bottom mt-5">
                <p class="col mt-3 text-center">Colaborador</p>
                <p class="col mt-3 text-center">Data última avaliação</p>
                <p class="col mt-3 text-center">Dias restantes</p>
                <p class="col mt-3 text-center">Nova avaliação</p>
            </div>
            <?php

        $empDAO = new empDAO();
        $result = $empDAO->read();
        $adm = $_SESSION['user_data'];

        if($result)
        $empDAO->printEmpMain($result, $adm['id_adm']);
        ?>
        </section>
        
    </main>
</body>

</html>