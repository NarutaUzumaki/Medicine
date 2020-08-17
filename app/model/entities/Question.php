<?php


namespace model;


class Question{
    private $id;
    private $text_of_question;

    public function getId(){
        return $this->id;
    }

    public function getTextOfQuestion(){
        return $this->text_of_question;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTextOfQuestion($text_of_question){
        $this->text_of_question = $text_of_question;
    }
}