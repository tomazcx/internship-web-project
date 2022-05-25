<?php

namespace php\DAOs;

use php\src\RatingAspect;

class RatingAspectDAO
{

    public function create(RatingAspect $obj)
    {
        $sql = "INSERT INTO rating_aspect (id_aspect, aspect_num, description, grade, fk_rating) VALUES (?, ?, ?, ?, ?)";

        $stmt = connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $obj->getId_aspect());
        $stmt->bindValue(2, $obj->getAspect_num());
        $stmt->bindValue(3, $obj->getDescription());
        $stmt->bindValue(4, $obj->getGrade());
        $stmt->bindValue(5, $obj->getFk_rating());

        $stmt->execute();
    }

    public function read($id_rating)
    {
        $sql = "SELECT * FROM rating_aspect WHERE fk_rating=?";

        $stmt = connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id_rating);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return false;
        }
    }

    public function returnAspect($aspects, $num)
    {
        foreach ($aspects as $aspect) {
            if ($aspect['aspect_num'] == $num)
                return $aspect;
        }
    }
}
