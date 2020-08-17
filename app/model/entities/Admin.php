<?php


namespace model;


class Admin{
    private $id;
    private $name;
    private $pass;
    private $timer;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getTimer()
    {
        return $this->timer;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setTimer($timer)
    {
        $this->timer = $timer;
    }
}