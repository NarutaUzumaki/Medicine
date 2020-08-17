<?php


namespace controller;


use model\Question;
use model\Student;

class ResultController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $name = $_GET['name'];
        $groupNum = $_GET['groupNum'];
        $this->view->makeView('result');
        $result = $this->checkAnswers($name, $groupNum);
    }

    public function checkAnswers($name, $groupNum){
        $n = 0;
        if (!empty($_POST)) {
            foreach ($_POST as $answerID) {
                if ($this->model->getAnswerById($answerID) == 1) {
                    $n++;
                }
            }
            //--
            $this->model->insertStudentResult($name,$groupNum,$n);
            echo "Кількість вірних відповідей: ".$n.". Результат збережено, нижче ви можете ознайомитися з вірними відповідями. Сайт можно спокійно покинути.<br/>";
            $this->showMeAnswers($_POST);
            //--
            return true;
        }else{
            echo "Ви не відповіли на жодне питання. Результат не було записано, у вас не буде 0 балів.";
            return false;
        }
    }

    public function showMeAnswers($arr){
        for ($i = 0; $i < 100000; $i++){
            if (!empty($arr[$i])){
                echo $this->model->getQuestionById($i)->getTextOfQuestion().'<br/>';
                $answers = $this->model->getAllAnswers();
                foreach ($answers as $answer){
                    if ($i == $answer->getQuestId() && strlen($answer->getAnswer())>1){
                        if ($answer->getIsCorrect()){
                            echo '<p style="color:green">'.'&#10004;'.$answer->getAnswer().'</p>';
                        }else {
                            if ($answer->getId() == $arr[$i]) {
                                echo '<p style="color:red">' .'&#10008;'. $answer->getAnswer() . '</p>';
                            }
                            echo '<p>' .'&#9672;'. $answer->getAnswer() . '</p>';
                        }
                    }
                }
                echo '<hr/>';
            }
        }
    }

    public function adminPanel(){
        $admin = $this->model->getAdmin();
        $students = $this->model->getStudents();
        $this->view->makeView('admin-panel', $students,$admin);
    }

    public function timerChange(){
        $id = $_GET['id'];
        $timer = $_POST['timer'];
        $this->model->updateTimer($timer,$id);
        $this->adminPanel();
    }
}