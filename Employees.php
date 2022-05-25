<?php

use php\DAOs\empDAO;

require_once 'vendor/autoload.php';
session_start();
$adm_data = $_SESSION['user_data'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colaboradores</title>

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
            <h1 class="text-center fs-4">Gerenciar Colaboradores</h1>
            <h2 class="fs-5 text-center">Nessa página, faça o gerenciamento de todos os funcionários disponíveis para serem avaliados</h2>

            <form action="" class="d-flex g-2 mt-5" method="post">
                <input type="text" class="form-control col" placeholder="Pesquisar por nome">

                <select class="col form-select mx-5" name="emps" id="emps">
                    <option value="0" disabled selected>Filtrar por atividade</option>
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>

                <button class="px-5 btn btn-secondary" type="submit">Filtrar</button>
            </form>

            <div class="row border-top border-bottom mt-5">
                <p class="col mt-3 text-center">Colaborador</p>
                <p class="col mt-3 text-center">Cargo</p>
                <p class="col mt-3 text-center">Setor</p>
                <p class="col mt-3 text-center">Feedbacks Recebidos</p>
                <p class="col mt-3 text-center">Média Geral</p>
            </div>

            <?php
            $empDAO = new empDAO();
            $all_emps = $empDAO->read();

            if ($all_emps) {
              $abled_emps = $empDAO->returnEmps($all_emps, 1);
              $unabled_emps = $empDAO->returnEmps($all_emps, 2);
            }
            if (!isset($_POST['emps']) || $_POST['emps'] != 2) {
              if (!empty($abled_emps)) {
                foreach ($abled_emps as $employee) {
                  if ($employee['fk_id_adm'] == $adm_data['id_adm']) {
                    $complete_name = $employee['name'] . ' ' . $employee['surname'];
                    if (isset($_POST['name_filter'])) {
                      $filter = $_POST['name_filter'];
                      if (strpos($complete_name, $filter) !== false) {
                        include 'php/requires/emp.php';
                      }
                    } else {
                      include 'php/requires/emp.php';
                    }
                  }
                }
              }
            } else {
              if (!empty($unabled_emps)) {
                foreach ($unabled_emps as $employee) {
                  if ($employee['fk_id_adm'] == $adm_data['id_adm']) {
                    $complete_name = $employee['name'] . ' ' . $employee['surname'];
                    if (isset($_POST['name_filter'])) {
                      $filter = $_POST['name_filter'];
                      if (strpos($complete_name, $filter) !== false) {
                        include 'php/requires/emp.php';
                      }
                    } else {
                      include 'php/requires/emp.php';
                    }
                  }
                }
              }
            }
            ?>



        </section>
    </main>
</body>

</html>