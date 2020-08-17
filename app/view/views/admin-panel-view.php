<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Панель Адміністратора</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        <?php include "style/admin.css"; ?>
    </style>
	<script>
        function destroy() {
            var form = document.getElementById("destroyForm");
            form.submit();
        }
    </script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Medicine Institute</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/test/home">До реєстрації <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="up()">Вгору</a>
            </li>
        </ul>
    </div>
</nav>
<!-----------------------------переделать верстку, это ужас, добавить стилей--------------------------->
    <section class="controll">
        <div class="controll-container wrappper">
            <div class="controll-search wrappper">
                <form name="student_filter" method="post" class="filter-form wrappper">
					<div>
						<label class="txtColor">Пошук по імені</label>
						<input class="form-control" placeholder="Ім'я студента" type="text" name="student_name_filter" value="<?php echo $_POST['student_name_filter']; ?>">
					</div>
					<div>
						<input type="submit" value="Знайти" class="btn btn-info">
                    	<input type="button" onclick="destroy()" value="Скинути фільтр" class="btn btn-danger">
					</div>
                </form>
            </div>
                <form name="destroy_filter" method="post" id="destroyForm">
                </form>
            <div class="controll-timer">
                <form method="post" action="/result/timerChange?id=<?php echo $DBdataToo->getId() ?>" class="filter-form wrappper">
					<div>
                    <label class="txtColor">Таймер</label>
                    <input class="form-control" placeholder="Таймер" type="text" name="timer" value="<?php echo $DBdataToo->getTimer(); ?>">
					</div>
					<div>
						<input type="submit" value="Змінити" class="btn btn-info">
					</div>
                </form>
            </div>
        </div>
    </section>
    <section class="tbl-results text-center">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">#</th>
                <th scope="col">Студент</th>
                <th scope="col">Група</th>
                <th scope="col">Результат</th>
                <th scope="col">Час складання</th>
            </thead>
            <tbody>

            <?php foreach ($DBdata as $key=>$student): ?>
            <?php if(!$_POST['student_name_filter'] || stristr($student->getName(), $_POST['student_name_filter'])): ?>
                <tr>
                    <th scope="row"><?php echo ($key+1); ?></th>
                    <td><?php echo $student->getName(); ?></td>
                    <td><?php echo $student->getGroupNum(); ?></td>
                    <td><?php echo $student->getResult().'/180'; ?></td>
                    <td><?php echo $student->getDate()->format("Y-m-d H:i:s"); ?></td>
                </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>
