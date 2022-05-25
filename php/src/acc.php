<?php

namespace php\src;

class Acc
{


    protected $id;

    protected $name;

    protected $surname;

    protected $sex;

    protected $admission_date;

    protected $cpf;

    protected $birth_date;

    protected $cell_num;

    protected $occupation;

    public function __construct(){}

    public function getId_adm()
    {
        return $this->id_adm;
    }

    public function setId_adm($id_adm)
    {
        $this->id_adm = $id_adm;
    }

    function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }


    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    function getAdmission_date()
    {
        return $this->admission_date;
    }

    public function setAdmission_date($admission_date)
    {
        $this->admission_date = $admission_date;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getBirth_date()
    {
        return $this->birth_date;
    }

    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getCell_num()
    {
        return $this->cell_num;
    }


    public function setCell_num($cell_num)
    {
        $this->cell_num = $cell_num;

        return $this;
    }

    public function getOccupation()
    {
        return $this->occupation;
    }


    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
