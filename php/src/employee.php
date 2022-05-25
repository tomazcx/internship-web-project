<?php
namespace php\src;

class Employee extends Acc
{

    
    protected $sector;

    protected $feedback_num;

    protected $grade;

    protected $period_days;

    protected $register_date;

    protected $last_rating;

    protected $status;

    protected $id;

    protected $Fk_Adm;

    protected $user;

    protected $password;

    public function __construct(){}

    public function getSector()
    {
        return $this->sector;
    }

    public function setSector($sector)
    {
        $this->sector = $sector;
    }

    public function getFeedback_num()
    {
        return $this->feedback_num;
    }


    public function setFeedback_num($feedback_num)
    {
        $this->feedback_num = $feedback_num;
    }

    public function getGrade()
    {
        return $this->grade;
    }


    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    public function getPeriod_days()
    {
        return $this->period_days;
    }


    public function setPeriod_days($period_days)
    {
        $this->period_days = $period_days;
    }


    public function getRegister_date()
    {
        return $this->register_date;
    }


    public function setRegister_date($register_date)
    {
        $this->register_date = $register_date;
    }


    public function getLast_rating()
    {
        return $this->last_rating;
    }

    public function setLast_rating($last_rating)
    {
        $this->last_rating = $last_rating;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFk_Adm()
    {
        return $this->Fk_Adm;
    }

    public function setFk_Adm($Fk_Adm)
    {
        $this->Fk_Adm = $Fk_Adm;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }

    public static function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
