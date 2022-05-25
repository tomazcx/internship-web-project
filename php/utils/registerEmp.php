<?php

use php\DAOs\empDAO;
use php\src\Employee;

require_once '../../vendor/autoload.php';
session_start();

if ((!empty($_POST['name'])) && (!empty($_POST['surname'])) && (!empty($_POST['sex'])) && (!empty($_POST['admissionDate'])) && (!empty($_POST['cpf'])) && (!empty($_POST['birthDate'])) && (!empty($_POST['cellNum'])) && (!empty($_POST['occupation'])) && (!empty($_POST['sector'])) && (!empty($_POST['periodDays'])) && (!empty($_POST['user']))) {
    

    $empDAO = new empDAO();
    $result = $empDAO->read();

    $register_date = date('Y-m-d');

    $user_data = $_SESSION['user_data'];
    $fk = $user_data['id_adm'];

    $id;
    if($result):
        $last_emp = end($result);
        $id = $last_emp['id_emp']+=1;
    else:
        $id = 0;
    endif;

    $empOBJ = new Employee();

    $empOBJ->setId($id);
    $empOBJ->setName($_POST['name']);
    $empOBJ->setSurname($_POST['surname']);
    $empOBJ->setSex($_POST['sex']);
    $empOBJ->setAdmission_date($_POST['admissionDate']);
    $empOBJ->setCpf($_POST['cpf']);
    $empOBJ->setCell_num($_POST['cellNum']);
    $empOBJ->setBirth_date($_POST['birthDate']);
    $empOBJ->setOccupation($_POST['occupation']);
    $empOBJ->setSector($_POST['sector']);
    $empOBJ->setFeedback_num(0);
    $empOBJ->setGrade(0);
    $empOBJ->setPeriod_days($_POST['periodDays']);
    $empOBJ->setRegister_date($register_date);
    $empOBJ->setStatus(true);
    $empOBJ->setFk_Adm($fk);
    $empOBJ->setUser($_POST['user']);
    $empOBJ->setPassword($_SESSION['password']);

    $empDAO->create($empOBJ);
    header("Location:  ../../Employees.php");
    exit();
} else {
    unset($_SESSION['password']);
    $_SESSION["register_error"] = "Informações inválidas";
    header("Location: ../../RegisterEmp.php");
    exit();
}


