<?php

use php\DAOs\empDAO;

require_once '../../vendor/autoload.php';

$id = $_GET['emp'];

$empDAO = new empDAO();

$allEmps = $empDAO->read();
$employeeProfile = array();

foreach($allEmps as $emp){
  if($emp['id_emp'] == $id){
    $employeeProfile = $emp;
  }
}
$empDAO->changeStatus($id, !($employeeProfile['status']));

header("Location: ../../Employees.php");
exit();
