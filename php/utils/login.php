<?php

use php\DAOs\AdmDAO;
use php\DAOs\empDAO;

session_start();
require_once '../../vendor/autoload.php';

$user = $_POST['login_user'];
$password = $_POST['login_password'];
$num = $_POST['occupation'];


if ($num == 1) {

    $admDAO = new AdmDAO();
    $result = $admDAO->read();

    if ($result) {

        foreach ($result as $adm) {
            echo $adm['user'];
            if ($adm['user'] == $user && $adm['password'] == $password) {
                $_SESSION['user_data'] = $adm;
                $_SESSION['user_type'] = $num;
                header("Location: ../../Main.php");
                exit();
            }
        }
        $_SESSION['erro_login'] = 'Usuário ou senha incorretos';
        // header("Location: ../../Login.php");
        exit();
    } else {
        echo "Erro de consulta, contate o desenvolvedor do sistema";
    }
} else if($num == 2) {

    $empDAO = new empDAO();
    $result = $empDAO->read();

    if ($result) {

        foreach ($result as $emp) {
            if ($emp['user'] == $user && $emp['password'] == $password) {
                $_SESSION['user_data'] = $emp;
                $_SESSION['user_type'] = $num;
                header("Location: ../../EmpProfileView.php");
                exit();
            }
        }
        $_SESSION['erro_login'] = 'Usuário ou senha incorretos';
        header("Location: ../../Login.php");
        exit();
    } else {
        echo "Erro de consulta, contate o desenvolvedor do sistema";
    }
}
