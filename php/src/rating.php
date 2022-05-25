<?php
namespace php\src;

class Rating
{
    private $id_rating, $fk_emp, $register_date, $final_grade;

    public function __construct(){}

    public function getId_rating()
    {
        return $this->id_rating;
    }

    public function setId_rating($id_rating)
    {
        $this->id_rating = $id_rating;
    }

    public function getFk_emp()
    {
        return $this->fk_emp;
    }

    public function setFk_emp($fk_emp)
    {
        $this->fk_emp = $fk_emp;
    }

    public function getRegister_date()
    {
        return $this->register_date;
    }

    public function setRegister_date($register_date)
    {
        $this->register_date = $register_date;
    }

    public function getFinal_grade()
    {
        return $this->final_grade;
    }

    public function setFinal_grade($final_grade)
    {
        $this->final_grade = $final_grade;
    }
}
