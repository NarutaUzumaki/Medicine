<?php


namespace model;


class Student{
    private $id;
    private $name;
    private $groupNum;
    private $result;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGroupNum()
    {
        return $this->groupNum;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setGroupNum($groupNum)
    {
        $this->groupNum = $groupNum;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}