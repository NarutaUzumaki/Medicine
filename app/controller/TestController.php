<?php


namespace controller;
use model\Question;
use model\Student;

class TestController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $this->view->makeView('home');
    }

    public function exam(){
        $_SESSION['user'] = $_POST;
        $this->isAdmin($_POST);
        $timer = $this->model->getTimer();
        $Student = $this->writeStudent($_POST);
        $questions = $this->model->getAllQuestions();
        $answers = $this->model->getAllAnswers();
        $this->view->makeView('main',$questions, $answers, $Student, $timer);
    }

    public function getAnswersForQuest($qustion_id){
        return $this->model->getAnswerForQuestion($qustion_id);
    }

    public function writeStudent($data){
        if (!empty($data)){
            $name = $data['name'];
            $groupNum = $data['group'];

            $Student = new Student();
            $Student->setName($name);
            $Student->setGroupNum($groupNum);

            return $Student;
        }else{
            die("Нажаль, виникли деякі проблеми із вашою реєстрацією на тест");
        }
    }

    public function isAdmin($arr){
        $admin = $this->model->getAdmin();
        if ($arr['name'] == $admin->getName() && $arr['group'] == $admin->getPass()){
            header('Location: /result/adminPanel');
        }
    }

}