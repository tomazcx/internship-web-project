<?php

namespace php\DAOs;

use php\src\Employee;

class empDAO
{

    public function __construct()
    {
    }

    public function create(Employee $emp)
    {
        $sql = "INSERT INTO emp 
        (id_emp, fk_id_adm, name, surname, sex, admission_date, cpf, birth_date, cell_num, occupation, status, sector, user, password, feedback_num, grade, period_days, register_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $emp->getId());
        $stmt->bindValue(2, $emp->getFk_Adm());
        $stmt->bindValue(3, $emp->getName());
        $stmt->bindValue(4, $emp->getSurname());
        $stmt->bindValue(5, $emp->getSex());
        $stmt->bindValue(6, $emp->getAdmission_date());
        $stmt->bindValue(7, $emp->getCpf());
        $stmt->bindValue(8, $emp->getBirth_date());
        $stmt->bindValue(9, $emp->getCell_num());
        $stmt->bindValue(10, $emp->getOccupation());
        $stmt->bindValue(11, $emp->getStatus());
        $stmt->bindValue(12, $emp->getSector());
        $stmt->bindValue(13, $emp->getUser());
        $stmt->bindValue(14, $emp->getPassword());
        $stmt->bindValue(15, $emp->getFeedback_num());
        $stmt->bindValue(16, $emp->getGrade());
        $stmt->bindValue(17, $emp->getPeriod_days());
        $stmt->bindValue(18, $emp->getRegister_date());

        $stmt->execute();
    }

    public function read()
    {
        $sql = "SELECT * FROM emp";
        $stmt = connection::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado  = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return false;
        }
    }

    public function update(Employee $emp, $id)
    {
        $sql = "UPDATE emp SET name=?, surname=?, sex=?, admission_date=?, cpf=?, birth_date=?, cell_num=?, occupation=?, sector=?, user=?, period_days = ? WHERE id_emp = ?";
        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $emp->getName());
        $stmt->bindValue(2, $emp->getSurname());
        $stmt->bindValue(3, $emp->getSex());
        $stmt->bindValue(4, $emp->getAdmission_date());
        $stmt->bindValue(5, $emp->getCpf());
        $stmt->bindValue(6, $emp->getBirth_date());
        $stmt->bindValue(7, $emp->getCell_num());
        $stmt->bindValue(8, $emp->getOccupation());
        $stmt->bindValue(9, $emp->getSector());
        $stmt->bindValue(10, $emp->getUser());
        $stmt->bindValue(11, $emp->getPeriod_days());

        $stmt->bindValue(12, $id);
        $stmt->execute();
    }

    public function printEmpMain($emp_list, $id_adm)
    {
        foreach ($emp_list as $employee) {
            if($employee['status'] == 1 && $employee['fk_id_adm'] == $id_adm){
                $complete_name = $employee['name'] . ' ' . $employee['surname'];
                $last_rating = str_replace('-', '', $employee['last_rating']);
    
                $days_sec = 24 * 60 * 60;
                $inital_date = null;
    
                if ($last_rating == 00000000) {
                    $inicial_date = $employee['register_date'];
                } else {
                    $inicial_date = $employee['last_rating'];
                }

    
    
                $day = date('Y-m-d');
                $day = strtotime($day);
                

                $next_rate_day = $employee['period_days'] * $days_sec;
    
                $inicial_date = strtotime($inicial_date);
                $final_date = $inicial_date + $next_rate_day;
                $date_diff = $final_date - $day;

    
                $date_diff = $date_diff / $days_sec;
    
                if ($date_diff <= 5) {
                    include('php/requires/empMain.php');
                }
            }
            
        }
    }

    public function returnEmps($emp_list, $option)
    {
        $abled_emps = array();
        $unabled_emps = array();
        foreach ($emp_list as $emp) {
            if ($emp['status']) :
                array_push($abled_emps, $emp);
            else :
                array_push($unabled_emps, $emp);
            endif;
        }

        if($option == 1):
            return $abled_emps;
        else:
            return $unabled_emps;
        endif;
    }
    
    public function changeStatus($id, $status){
        $sql = "UPDATE emp SET status=? WHERE id_emp=?";
        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $status);
        $stmt->bindValue(2, $id);

        $stmt->execute();
        return $status;
    }

    public function updateRatingStats($emp_list, $rating_list, $id, $date, $grade){
        $empArray = array();
        $grade_nums = 0;
        $grade_total = 0;

        foreach($emp_list as $emp){
            if($emp['id_emp'] == $id){
                $empArray = $emp;
            }
        }

        foreach($rating_list as $rating){
            if($rating['fk_emp'] == $id){
                $grade_nums++;
                $grade_total += $rating['grade'];
            }
        }

        $grade_total += $grade;
        $grade_nums++;

        $feedback_num = $empArray['feedback_num'];
        $feedback_num++;
        $final_grade = $grade_total / $grade_nums;

        $sql = "UPDATE emp SET last_rating=?, feedback_num=?, grade=? WHERE id_emp=?";
        $sql = connection::getConn()->prepare($sql);

        $sql->bindValue(1, $date);
        $sql->bindValue(2, $feedback_num);
        $sql->bindValue(3, $final_grade);
        $sql->bindValue(4, $id);

        $sql->execute();
    }

    
}

