<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
		<?php include "style/main.css"; ?>
	</style>
	<title>Medicine Inc</title>
</head>
<body class="bod">
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="display-4 py-2 text-truncate">Medicine tests</h1>
                        <div class="px-2">
                            <form method="post" action="/test/exam" class="justify-content-center">
                                <div class="form-group">
                                    <label class="sr-only">Прізвище та ім'я</label>
                                    <input type="text" name="name" class="form-control" placeholder="Прізвище та ім'я" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Група</label>
                                    <input type="text" name="group" class="form-control" placeholder="Група" required>
                                    <a href="">Якщо ви викладач, введіть свої дані</a>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Розпочати</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
