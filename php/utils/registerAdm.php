<?php

use php\DAOs\AdmDAO;
use php\src\Acc;

require_once '../../vendor/autoload.php';
session_start();

if ((isset($_POST['adm_name'])) && (isset($_POST['adm_surname'])) && (isset($_POST['adm_sex'])) && (isset($_POST['adm_admissionDate'])) && (isset($_POST['adm_cpf'])) && (isset($_POST['adm_birthDate'])) && (isset($_POST['adm_cellNum'])) && (isset($_POST['adm_occupation']))) {
    $admDAO = new AdmDAO();
    $admOBJ = new Acc();

    $adm = $_SESSION['user_data'];
    $id_adm = $adm['id_adm'];

    $admOBJ->setName($_POST['adm_name']);
    $admOBJ->setSurname($_POST['adm_surname']);
    $admOBJ->setSex($_POST['adm_sex']);
    $admOBJ->setAdmission_date($_POST['adm_admissionDate']);
    $admOBJ->setCpf($_POST['adm_cpf']);
    $admOBJ->setBirth_date($_POST['adm_birthDate']);
    $admOBJ->setCell_num($_POST['adm_cellNum']);
    $admOBJ->setOccupation($_POST['adm_occupation']);

    $admDAO->update($admOBJ, $id_adm);

    header("Location:  ../../AdmProfile.php");
    exit();
} else {
    $_SESSION["register_error_adm"] = "Informações inválidas";
    header("Location: ../../EditAdm.php");
    exit();
}

