<?php

use php\DAOs\empDAO;
use php\DAOs\ratingAspectDAO;
use php\DAOs\ratingDAO;
use php\src\Rating;
use php\src\RatingAspect;

require '../../vendor/autoload.php';
session_start();

if((isset($_POST['aspect1grade'])) && (isset($_POST['aspect2grade'])) && (isset($_POST['aspect3grade'])) && (isset($_POST['aspect4grade'])) && (isset($_POST['aspect5grade'])) && (isset($_POST['aspect6grade']))){
    $id_emp = $_GET['id_emp'];
    $empDAO = new empDAO();


    $ratingAspectDAO = new RatingAspectDAO();
    $ratingDAO = new RatingDAO();

    $ratingFinalGrade = 0;
    $ratingOBJ = new Rating();

    $result = $ratingDAO->read();
    $id_rating;
    if($result){
        $last_rating = end($result);
        $id_rating = $last_rating['id_rating']+=1;
    }else{
        $id_rating = 0;
    }

    $register_date = date('Y-m-d');
    $ratingOBJ->setId_rating($id_rating);
    $ratingOBJ->setFk_emp($id_emp);
    $ratingOBJ->setRegister_date($register_date);
    
    $ratingDAO->create($ratingOBJ);

    for($i = 1; $i<=8; $i++){
        $ratingAspectOBJ = new RatingAspect();
        $id_aspect;

        $result = $ratingAspectDAO->read($id_rating);

        if($result){
            $last_aspect = end($result);
            $id_aspect = $last_aspect['id_aspect']+=1;
        }else{
            $id_aspect = 0;
        }
        if(isset($_POST['aspect'.$i.'grade'])){
            $ratingAspectOBJ->setGrade($_POST['aspect'.$i.'grade']);
            $ratingFinalGrade += $_POST['aspect'.$i.'grade'];
        }else{
            $ratingAspectOBJ->setGrade(0);
        }

        if(isset($_POST['aspect'.$i.'desc'])){
            $ratingAspectOBJ->setDescription($_POST['aspect'.$i.'desc']);
        }else{
            $ratingAspectOBJ->setDescription("Sem descrição.");
        }
        $ratingAspectOBJ->setAspect_num($i);
        $ratingAspectOBJ->setId_aspect($id_aspect);
        $ratingAspectOBJ->setFk_rating($id_rating);

        $ratingAspectDAO->create($ratingAspectOBJ);
    }

    $ratingFinalGrade = $ratingFinalGrade / 6;
    $ratingOBJ->setFinal_grade($ratingFinalGrade);

    $ratingDAO->update($ratingOBJ, $id_rating);

    $rating_list = $ratingDAO->read();
    $emp_list = $empDAO->read();
    $empDAO->updateRatingStats($emp_list, $rating_list, $id_emp, $register_date, $ratingFinalGrade);

    header('Location: ../../Main.php');
    exit();
    
}else{
    $_SESSION['error_rating'] = "Erro de registro, preencha todas as notas para cadastrar a avaliação";
    echo $_SESSION['id'];
    header('Location: ../../Rating.php?id_emp='.$_SESSION['id']);
    exit();
}