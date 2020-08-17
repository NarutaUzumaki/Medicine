<?php
var_dump($_SESSION['user']);
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		<?php include "style/test.css"?>
	</style>
	<script>
		<?php include "js/timer.js"; ?>
		<?php include "js/up.js"; ?>
		<?php include "js/common.js"; ?>
	</script>
</head>
<body onload="startTimer()">
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand logo" href="#">Medicine Institute</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/test/home">До реєстрації <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="up()">До 1-го питання</a>
                </li>
                <li class="nav-item timer-element">
                    <span id="my_timer" class="timer">00:<?php echo $timer ?>:00</span>
                </li>
            </ul>
				<a class="nav-link disabled" href="#">Зараз тест проходить <?php echo $_SESSION['user']['name']?> з групи <?php echo $_SESSION['user']['group']; ?> </a>
                <button class="btn btn-outline-danger my-2 my-sm-0" onclick="endOfTest()">Завершити тест</button>
        </div>
    </nav>
</header>
<!-------------------------------------------------------------->
<section class="test wrappper">
	<div class="questions-answers wrappper">
		<form method="post" id="testForm" action="/result/index?name=<?php echo $_SESSION['user']['name']; ?>&groupNum=<?php echo $_SESSION['user']['group']; ?>">
			<?php shuffle($DBdata); shuffle($DBdataToo); ?>
			<?php foreach ($DBdata as $key=>$question): ?>
			<div id="">
				<p class="question"><?php echo ($key+1).'.'; echo $question->getTextOfQuestion(); ?></p>
					<?php foreach ($DBdataToo as $answer): ?>
						<?php if($question->getId() == $answer->getQuestId() && strlen($answer->getAnswer())>1): ?>
							<div class="answer-element wrappper">
								<input class="radio-answer" type="radio" name="<?php echo $question->getId(); ?>" value="<?php echo $answer->getId(); ?>"><?php echo ucfirst($answer->getAnswer()); echo '<br/>' ?>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<hr/>
			</div>
			<?php endforeach; ?>
			<div class="down-btn text-center">
				<p>Будь-ласка будьте впевнені у своїх відповідях.</p>
				<button class="btn btn-outline-danger my-2 my-sm-0 col-md-12" type="submit" id="endOfTest">Завершить тест</button>
			</div>
		</form>
	</div>
</section>
</body>
</html>

<script>
    <?php include "js/question-color.js"; ?>
</script>
