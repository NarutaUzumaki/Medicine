<?php
namespace model;
use DateTime;
class Data{
    public function __construct()
    {
        $this->db = new MySqlDB();
        $this->db->connect();
    }
    //questions_block_1
    public function getAllQuestions(){
        $questions = array();
        $sql = "select id, text_question 
                from question_prime order by rand() limit 180";
        if($questionsResult = $this->db->getArrFromQuery($sql)){
            foreach ($questionsResult as $question){
                $Question = new Question();
                $Question->setId($question['id']);
                $Question->setTextOfQuestion($question['text_question']);
                $questions[] = $Question;
            }
        }
        return $questions;
    }
    //answer_block_1
    public function getAllAnswers(){
        $answers = array();
        $sql = "select id, answer_text, quest_id, is_correct
                from answer_prime";
        if ($answersResult = $this->db->getArrFromQuery($sql)){
            foreach ($answersResult as $answer){
                $Answer = new Answer();
                $Answer->setId($answer['id']);
                $Answer->setAnswer($answer['answer_text']);
                $Answer->setQuestId($answer['quest_id']);
                $Answer->setIsCorrect($answer['is_correct']);
                $answers[] = $Answer;
            }
        }
        return $answers;
    }
    //answer_block_1
    public function getAnswerForQuestion($question_id){
        $answers = array();
        $sql = "select id, answer_text, quest_id, is_correct
                from answer_prime where quest_id = ".$question_id;
        if ($answersResult = $this->db->getArrFromQuery($sql)){
            foreach ($answersResult as $answer){
                $Answer = new Answer();
                $Answer->setId($answer['id']);
                $Answer->setAnswer($answer['answer_text']);
                $Answer->setQuestId($answer['quest_id']);
                $Answer->setIsCorrect($answer['is_correct']);
                $answers[] = $Answer;
            }
        }
        return $Answer;
    }
    //answer_block_1
    public function getAnswerById($id){
        $sql = "select is_correct
                from answer_prime where id = ".$id;
        if ($results = $this->db->getArrFromQuery($sql)){
            foreach ($results as $result){
                if($result != null && count($result)<2){
                    $correct =  $result['is_correct'];
                    return $correct;
                }
            }
        }
    }
    //questions_block_1
    public function getQuestionById($id){
        $qustions = array();
        $sql = "select id, text_question
                from question_prime where id = ".$id;
        if ($results = $this->db->getArrFromQuery($sql)){
            foreach ($results as $result){
            $Question = new Question();
            $Question->setId($result['id']);
            $Question->setTextOfQuestion($result['text_question']);
            $qustions[] = $Question;
            }
        }
        return $Question;
    }

    public function insertStudentResult($name, $groupNum, $result){
        $dateTime = new DateTime();
        $sql = "insert into students(name,group_num,result, date)
                values ('".$name."','".$groupNum."','".$result."','".$dateTime->format("Y-m-d H:i:s")."')";
        $this->db->runQuery($sql);
    }

    public function getStudents(){
        $students = array();
        $sql = "select id, name, group_num, result, date from students";
        if ($results = $this->db->getArrFromQuery($sql)){
            foreach ($results as $student){
                $dateTime = new DateTime($student['date']);
                $Student = new Student();
                $Student->setId($student['id']);
                $Student->setName($student['name']);
                $Student->setGroupNum($student['group_num']);
                $Student->setResult($student['result']);
                $Student->setDate($dateTime);
                $students[]=$Student;
            }
        }
        return $students;
    }

    public function getAdmin(){
        $sql = "select id, name, pass, timer from admin";

        if ($results = $this->db->getArrFromQuery($sql)){
            foreach ($results as $admin){
                $Admin = new Admin();
                $Admin->setId($admin['id']);
                $Admin->setName($admin['name']);
                $Admin->setPass($admin['pass']);
                $Admin->setTimer($admin['timer']);
            }
        }
        return $Admin;
    }

    public function updateTimer($timer, $id){
        $sql = "update admin set timer = '".$timer."' where id = '".$id."'";
        $this->db->runQuery($sql);
    }

    public function getTimer(){
        $sql = "select timer from admin where id = 1";
        if ($results = $this->db->getArrFromQuery($sql)){
            foreach ($results as $timer){
                $Timer = $timer['timer'];
            }
        }
        return $Timer;
    }
}