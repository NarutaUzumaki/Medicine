<?php


namespace model;


class Answer{
    private $id;
    private $answer;
    private $quest_id;
    private $is_correct;

    public function getId(){
        return $this->id;
    }

    public function getAnswer(){
        return $this->answer;
    }

    public function getQuestId(){
        return $this->quest_id;
    }

    public function getIsCorrect(){
        return $this->is_correct;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setAnswer($answer){
        $this->answer = $answer;
    }

    public function setQuestId($quest_id){
        $this->quest_id = $quest_id;
    }

    public function setIsCorrect($is_correct){
        $this->is_correct = $is_correct;
    }

}
