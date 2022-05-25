<?php

use php\DAOs\empDAO;
use php\src\Employee;

require_once '../../vendor/autoload.php';
session_start();

if (!(empty($_POST['name'])) && !(empty($_POST['surname'])) && !(empty($_POST['sex'])) && !(empty($_POST['admission_date'])) && !(empty($_POST['cpf'])) && !(empty($_POST['birth_date'])) && !(empty($_POST['cell_num'])) && !(empty($_POST['occupation'])) && !(empty($_POST['sector'])) && !(empty($_POST['periodDays'])) && !(empty($_POST['user']))) {
    $empDAO = new empDAO();
    $empOBJ = new Employee();

    $id_emp = $_GET['id_emp'];

    $empOBJ->setName($_POST['name']);
    $empOBJ->setSurname($_POST['surname']);
    $empOBJ->setSex($_POST['sex']);
    $empOBJ->setAdmission_date($_POST['admission_date']);
    $empOBJ->setCpf($_POST['cpf']);
    $empOBJ->setCell_num($_POST['cell_num']);
    $empOBJ->setBirth_date($_POST['birth_date']);
    $empOBJ->setOccupation($_POST['occupation']);
    $empOBJ->setSector($_POST['sector']);
    $empOBJ->setPeriod_days($_POST['periodDays']);
    $empOBJ->setUser($_POST['user']);

    $empDAO->update($empOBJ, $id_emp);

    header("Location: ../../Employees.php");
    exit();
} else {


    $_SESSION["register_error"] = "Informações inválidas";
    header("Location: ../../Employees.php");
    exit();
}
    
?>