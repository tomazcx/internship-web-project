<?php
namespace php\src;

class RatingAspect
{

    private $id_aspect, $aspect_num, $description, $grade, $fk_rating;

    public function __construct(){}

    public function getId_aspect()
    {
        return $this->id_aspect;
    }

    public function setId_aspect($id_aspect)
    {
        $this->id_aspect = $id_aspect;
    }

    public function getAspect_num()
    {
        return $this->aspect_num;
    }

    public function setAspect_num($aspect_num)
    {
        $this->aspect_num = $aspect_num;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    public function getFk_rating()
    {
        return $this->fk_rating;
    }

    public function setFk_rating($fk_rating)
    {
        $this->fk_rating = $fk_rating;
    }
}
