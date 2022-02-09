<?php
require_once 'logic/signup.php';
?>
<!DOCTYPE html>
<html lang="RU">
<head>

<meta charset="UTF-8">
<title>Microfinance Organization</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<link rel="stylesheet" href="inc/css/style.css">
<link rel="stylesheet" href="inc/css/font-awesome/css/font-awesome.min.css">

</head>
<body>
<?php include('header.php');?>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <div class="h3 mb-4">
					</br></br>Регистрация
                    </div>
                    <form action="registration.php" class="text-center" method="post">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="pt-2">ФИО:
                            </div>
                            <input type="text" name="FIO" value="<?=$FIO?>" placeholder="Введите ФИО" class="form-control w-75 mb-3">
                        </div>
                        <?php if($arrayerrors['errfio']){
                        echo ' <div class = "err mb-2" style = "color: red;">'.$arrayerrors['errfio'] . '</div>';}
                        ?>
                        <div class="mt-3 d-flex justify-content-between">
                            <div class="mb-3 pt-2">
                                Электронная почта:
                            </div>
                            <input type="email" name="Login" value="<?= $Login ?>"
                                placeholder="Введите логин" class="form-control w-75 mb-3">
                        </div>
                        <?php if($arrayerrors['errlogin']){
                        echo ' <div class = "err mb-2" style = "color: red;">'.$arrayerrors['errlogin'] . '</div>';}
                        ?>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="mb-3 pt-2">
                                Пароль:
                            </div>
                            <input type="password" name="Password1" style="width: 65%;" placeholder="Введите пароль"
                                class="form-control mb-3">
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="mb-3 pt-2">
                                Повторите пароль:
                            </div>
                            <input type="password" name="Password2" style="width: 65%;" placeholder="Введите пароль"
                                class="form-control mb-3">
                        </div>
                        <?php if($arrayerrors['errpassword']){
                        echo ' <div class = "err mb-2" style = "color: red;">'.$arrayerrors['errpassword'] . '</div>';}
                        ?>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="mb-3 pt-2">
                                Дата рождения:
                            </div>
                            <input type="date" value="<?= $DateBirth ?>" name="DateBirth"
                                style="width: 65%;" class="form-control mb-3">
                        </div>
                        <?php if($arrayerrors['errbirth']){
                        echo ' <div class = "err mb-2" style = "color: red;">'.$arrayerrors['errbirth'] . '</div>';}
                        ?>
                        <div class="mb-3 d-flex justify-content-between">
						    <div class="mb-3 pt-2">
                                Выберите пол:
                            </div>
                            <select name="Gender" required class="form-control">
                                <?php
                                foreach ($optionItem1 as $id => $item) {
                                $attr = ($Gender == $id) ? 'selected' : '';
                                echo '<option value="' . $id . '"' . $attr . '>' . $item . '</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="mb-3 pt-3">
                                Адрес:
                            </div>
                            <textarea name="Address" placeholder="Введите адрес"
                                class="form-control w-75"><?= $Address ?></textarea>
                        </div>
                        <?php if($arrayerrors['erraddress']){
                        echo ' <div class = "err mb-2" style = "color: red;">'.$arrayerrors['erraddress'] . '</div>';}
                        ?>
                        <input type="submit" value="Отправить" name="register" class="btn btn-primary"></br></br>
						<div class="mb-3">
                        <a href="login.php">У вас уже есть аккаунт?</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
</html>