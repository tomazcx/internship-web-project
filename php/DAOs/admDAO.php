<?php
namespace php\DAOs;

use php\src\Acc;

class AdmDAO{

    public function read(){
        $sql = 'SELECT * FROM acc';
        $stmt = connection::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado  = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return false;
        }
    }

    public function update(Acc $acc, $id){
        $sql = 'UPDATE acc SET name=?, surname=?, sex=?, admission_date=?, cpf=?, birth_date=?, cell_num=?, occupation=? WHERE id_adm =?';
        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $acc->getName());
        $stmt->bindValue(2, $acc->getSurname());
        $stmt->bindValue(3, $acc->getSex());
        $stmt->bindValue(4, $acc->getAdmission_date());
        $stmt->bindValue(5, $acc->getCpf());
        $stmt->bindValue(6, $acc->getBirth_date());
        $stmt->bindValue(7, $acc->getCell_num());
        $stmt->bindValue(8, $acc->getOccupation());
        $stmt->bindValue(9, $id);

        $stmt->execute();
    }

    public function returnAdm($id){
        $adm_list = $this->read();

        foreach($adm_list as $adm){
            if($adm['id_adm'] == $id){
                return $adm;
            }
        }
    }



    
}
