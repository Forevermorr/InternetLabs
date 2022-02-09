<?php
require_once "logic/textlogic.php";
?>

<!DOCTYPE html>
<html lang="RU">
<head>

<meta charset="UTF-8">
<title>Microfinance Organization</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="inc/css/style.css">
<link rel="stylesheet" href="inc/css/database.css">
<link rel="stylesheet" href="inc/css/font-awesome/css/font-awesome.min.css">

</head>
<body>
<?php include('header.php');?>
<div class="container text-center mt-3 shap">
    <?php
    session_start();
    if($_SESSION['user']){
        echo '<div class="h5 text-end"> Добро пожаловать, '. $_SESSION['user'] .'</div>
    <div class="text-end">
    <a href="logic/signout.php">Выйти</a>
    </div>';
    }
    else{
        echo '<div class="h4 text-end">
                        Вы не авторизованы
                    </div>
                    <div class="text-end">
                        <a href="login.php">
                            Войти
                        </a>
                    </div>
                    <div class="text-end">
                        <a href="registration.php">
                            Зарегистрироваться
                        </a>
                    </div>';
    }
    if($_SESSION['user']){
        echo '<div class="text-end">
		<a href="secretpage.php"> Секретная страница </a>
		</div>';
    }
    ?>
<div class="container text-center">
    <h3>
        </br></br>Обработка текста
    </h3>
    <form action="text.php" method="post">
        <textarea name="text" id="" cols="100" rows="10"><?=$text?></textarea>
        <div>
            <button class="btn btn-primary">
                Обработать
            </button>
        </div>
    </form>
    <div class="mt-3 text-start">
        <h1>Задание 1:</h1>
        <div>
            <?=$analyze->First()?>
        </div>
        <h1>Задание 9:</h1>
        <div>
            <?=$analyze->Ninth()?>
        </div>
        <h1>Задание 14:</h1>
		    <?php foreach ($analyze->Fourteenth()[1] as $key => $value) {
			echo($value);
        }?>
    </div>
</div>
</body>
</html>