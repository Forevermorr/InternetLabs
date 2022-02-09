<?php
require_once 'dbconnect.php';

$Login = '';
$Password = '';
$error = 0;
$Salt = "3jtn583hab3j7h902177215uq01385k";
$arrayerrors = [
    'errlogin' => '',
    'errpass' => '',
    'errattempt' => '',
];

if ($_POST){

        if(isset($_POST['Login']) && isset($_POST['Password'])){
            $Login = htmlspecialchars($_POST["Login"]);
            $Password = htmlspecialchars($_POST["Password"]);
            $PasswordHash = md5($Salt . $Password);
        }

        if($Login == '') {
            $arrayerrors['errlogin'] = 'Введите логин!';
            $error++;
        }
		
        if($Password == ''){
            $arrayerrors['errpass'] = 'Введите пароль!';
            $error++;
        }

        if ($error == 0){
            $users = $mysql->prepare("SELECT ID FROM users WHERE Login=:Login AND Password=:passwordHash");
            $users->execute([
                ':Login' => $Login,
                ':passwordHash' => $PasswordHash
            ]);

            $ids = $users->fetchColumn();
            if($ids < 1){
                $arrayerrors['errpass'] = 'Неверный логин или пароль!';
            }
            else {
                $id = $ids[0];
                $_SESSION["user"] = $Login;
                $_SESSION["id"] = $id;
                header("Location: index.php");
            }
        }

}
?>