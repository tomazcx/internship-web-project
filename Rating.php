<?php

use php\DAOs\empDAO;

require_once 'vendor/autoload.php';
session_start();
$id = $_GET["id_emp"];

$_SESSION["id"] = $id;

$empDAO = new empDAO();
$allEmps = $empDAO->read();
$employeeProfile = array();

foreach($allEmps as $emp){
  if($emp['id_emp'] == $id){
    $employeeProfile = $emp;
  }
}
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
<?php include "php/requires/header.html" ?>

    <main>
        <section class="container bg-light rounded mt-5 mb-4 p-5 w-100">
            <h4 class="text-danger">
            <?php
                if (isset($_SESSION['error_rating'])) {
                  echo  $_SESSION['error_rating'];
                }
                ?>
            </h4>
            <h1 class="fs-4 border-bottom pb-2">Você está avaliando:</h1>

            <div class="d-flex justify-content-between pe-5">
                <div class="d-flex">
                    <img src="img/icon3.png" alt="" class="iconRating">
                    <div>
                        <p class="paragraphRating">
                        <?php
                  $complete_name = $employeeProfile['name'] . ' ' . $employeeProfile['surname'];
                  echo $complete_name
                  ?>
                        </p>
                        <p class="paragraphRating">
                        <?php
                  echo $employeeProfile['occupation'];
                  ?>
                        </p>
                        <p class="paragraphRating">Data de admissão: 
                        <?php
                  echo $employeeProfile['admission_date'];
                  ?>
                        </p>
                        <p class="paragraphRating bg-primary text-light rounded-pill text-center">Colaborador</p>
                    </div>
                </div>

                <div class="d-flex">
                    <p class="fs-1">00</p>
                    <div class="mx-3">
                        <p class="paragraphRating fs-3">Avaliações </p>
                        <p class="fs-5">Cadastradas</p>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <a class="paragraphRating bg-primary text-light rounded text-center px-5 text-decoration-none" href="EmpProfile.php?idEmp=
                <?php
                echo $_GET['id_emp'];
                ?>">Visualizar Perfil</a>
                </div>
            </div>

        </section>

        <form action="php/utils/registerRating.php?id_emp=
      <?php
          echo $id;
      ?>" method="post">
            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Comprometimento</h1>
                <p class="px-5 text-center">O colaborador está comprometido com a entrega e a responsabilidade do cargo que ocupa; participa e se empenha para aprender sempre mais?</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect1-grade1">1</label>
                        <input type="radio" name="aspect1grade" id="aspect1-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect1-grade2">2</label>
                        <input type="radio" name="aspect1grade" id="aspect1-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect1-grade3">3</label>
                        <input type="radio" name="aspect1grade" id="aspect1-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect1-grade4">4</label>
                        <input type="radio" name="aspect1grade" id="aspect1-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect1-grade5">5</label>
                        <input type="radio" name="aspect1grade" id="aspect1-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect1desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Aproveitamento do tempo</h1>
                <p class="px-5 text-center">O colaborador tem bem claro o uso do seu tempo dentro da organização, consegue desempenhar as suas tarefas dentro dos tempos padrões da empresa? É cumpridor dos prazos e horários estipulados?</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect2-grade1">1</label>
                        <input type="radio" name="aspect2grade" id="aspect2-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect2-grade2">2</label>
                        <input type="radio" name="aspect2grade" id="aspect2-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect2-grade3">3</label>
                        <input type="radio" name="aspect2grade" id="aspect2-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect2-grade4">4</label>
                        <input type="radio" name="aspect2grade" id="aspect2-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect2-grade5">5</label>
                        <input type="radio" name="aspect2grade" id="aspect2-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect2desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Versatilidade</h1>
                <p class="px-5 text-center">O colaborador é flexível e versátil para as tarefas que lhe são atribuídas? Está preparado para as adversidades dos prazos, pessoas e dos processos com que trabalha?</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect3-grade1">1</label>
                        <input type="radio" name="aspect3grade" id="aspect3-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect3-grade2">2</label>
                        <input type="radio" name="aspect3grade" id="aspect3-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect3-grade3">3</label>
                        <input type="radio" name="aspect3grade" id="aspect3-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect3-grade4">4</label>
                        <input type="radio" name="aspect3grade" id="aspect3-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect3-grade5">5</label>
                        <input type="radio" name="aspect3grade" id="aspect3-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect3desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Integração com o grupo</h1>
                <p class="px-5 text-center">O colaborador tem habilidades para trabalho em equipe, respeita e é respeitado perante os colegas, tem credibilidade é está sempre disponível para ajudar?</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect4-grade1">1</label>
                        <input type="radio" name="aspect4grade" id="aspect4-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect4-grade2">2</label>
                        <input type="radio" name="aspect4grade" id="aspect4-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect4-grade3">3</label>
                        <input type="radio" name="aspect4grade" id="aspect4-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect4-grade4">4</label>
                        <input type="radio" name="aspect4grade" id="aspect4-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect4-grade5">5</label>
                        <input type="radio" name="aspect4grade" id="aspect4-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect4desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Relações interpessoais</h1>
                <p class="px-5 text-center">Como o colaborador lida com as interações de grupo, promove e aceita o diálogo, pede ajuda, se aproxima para ajudar e resolver os problemas? É individualista ou gosta de pessoas por perto, promove a coletividade.</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect5-grade1">1</label>
                        <input type="radio" name="aspect5grade" id="aspect5-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect5-grade2">2</label>
                        <input type="radio" name="aspect5grade" id="aspect5-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect5-grade3">3</label>
                        <input type="radio" name="aspect5grade" id="aspect5-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect5-grade4">4</label>
                        <input type="radio" name="aspect5grade" id="aspect5-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect5-grade5">5</label>
                        <input type="radio" name="aspect5grade" id="aspect5-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect5desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <div class="d-flex justify-content-center">
                    <p class="paragraphRating bg-success text-light rounded-pill text-center px-5">Resposta Obrigatória</p>
                </div>
                <h1 class="text-center fs-4">Cultura da empresa</h1>
                <p class="px-5 text-center">O colaborador consegue se inteirar com a cultura da empresa, tem claro a missão, visão e valores da organização.</p>

                <div class="d-flex justify-content-evenly px-5 mt-4">
                    <div>
                        <label for="aspect6-grade1">1</label>
                        <input type="radio" name="aspect6grade" id="aspect6-grade1" value="1">
                    </div>
                    <div>
                        <label for="aspect6-grade2">2</label>
                        <input type="radio" name="aspect6grade" id="aspect6-grade2" value="2">
                    </div>
                    <div>
                        <label for="aspect6-grade3">3</label>
                        <input type="radio" name="aspect6grade" id="aspect6-grade3" value="3">
                    </div>
                    <div>
                        <label for="aspect6-grade4">4</label>
                        <input type="radio" name="aspect6grade" id="aspect6-grade4" value="4">
                    </div>
                    <div>
                        <label for="aspect6-grade5">5</label>
                        <input type="radio" name="aspect6grade" id="aspect6-grade5" value="5">
                    </div>
                </div>

                <textarea name="aspect6desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <h1 class="text-center fs-4">Oportunidades de aprendizado e melhoria</h1>
                <p class="px-5 text-center">Descreva quais itens o colaborador pode melhorar o seu desempenho.</p>

                <textarea name="aspect7desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-5 w-100">
                <h1 class="text-center fs-4">Habilidades</h1>
                <p class="px-5 text-center">Quais são as habilidades do colaborador, liste em forma de itens e comente.</p>


                <textarea name="aspect8desc" id="" cols="10" rows="5" class="form-control mt-4"></textarea>
            </section>

            <section class="container bg-light rounded mb-4 p-4 w-100">
                <div class="d-flex justify-content-end px-3">
                    <button class="btn btn-primary px-5" type="submit">Enviar</button>
                </div>

            </section>



        </form>

    </main>
</body>

</html>