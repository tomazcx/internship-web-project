<?php
namespace php\DAOs;

use php\src\Rating;

class RatingDAO{

    public function create(Rating $obj){
        $sql = "INSERT INTO rating (id_rating, fk_emp, register_date) VALUES (?, ?, ?)";

        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $obj->getId_rating());
        $stmt->bindValue(2, $obj->getFk_emp());
        $stmt->bindValue(3, $obj->getRegister_date());

        $stmt->execute();
    }

    public function read(){
        $sql = "SELECT * FROM rating";

        $stmt = connection::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result  = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            return false;
        }
    }

    public function update(Rating $obj, $id){
        $sql = "UPDATE rating SET final_grade=? WHERE id_rating=?";
        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $obj->getFinal_grade());
        $stmt->bindValue(2, $id);

        $stmt->execute();
    }

    public function returnFinalGrade($rating_list, $id){
        foreach($rating_list as $rating){
            if($rating['id_rating'] == $id){
                return $rating['final_grade'];
            }
        }
    }
}
