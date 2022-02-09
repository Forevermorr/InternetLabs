<?php
require_once 'dbconnect.php';

$Login = htmlspecialchars($_POST['Login']);
$FIO = htmlspecialchars($_POST["FIO"]);
$Password1 = htmlspecialchars($_POST['Password1']);
$Password2 = htmlspecialchars($_POST['Password2']);
$DateBirth = htmlspecialchars($_POST["DateBirth"]);
$Address = htmlspecialchars($_POST["Address"]);
$Gender = htmlspecialchars($_POST["Gender"]);
$Salt = "3jtn583hab3j7h902177215uq01385k";
$regex = "/^[\S\s]*(?=.+[A-Z])(?=.+[a-z])(?=.+\d)(?=.+[$&+,:;=?@#|'<>.^*()%!])(?=.+[\s])(?=.+[-])(?=.+[_])[\S\s]*/";

$arrayerrors = [
    "errfio" => "",
    "errlogin" => "",
    "errpassword" => "",
    "errbirth" => "",
    "erraddress" => "",
];

$optionItem1 = [
    "Мужской",
    "Женский"
];

if(isset($_POST['register'])){

    $users = $mysql->prepare("SELECT * FROM users WHERE Login=:Login");
    $users->execute([
        ':Login' => $Login,
    ]);

    $usernum = $users->fetchColumn();
    $errors = 0;

    if($usernum){
        $arrayerrors['errlogin'] = 'Пользователь с таким логином уже существует!';
        $errors++;
    }

    if ($Login == ""){
        $arrayerrors['errlogin'] = 'Заполните поле!';
        $errors++;
    }
	
    if($FIO == ""){
        $arrayerrors['errfio'] = 'Заполните ФИО полностью!';
        $errors++;
    }
 
    if (!preg_match($regex, $Password1) || preg_match("/^(?=.*[А-Я])(?=.*[а-я])$/", $Password1) || strlen($Password1) <= 5) {
        $arrayerrors['errpassword'] = "Пароль должен состоять из латинских букв разного регистра, </br> спецсимволов, пробелов, дефисов, подчёркиваний и цифр!";
        $errors++;
    }
	
    if($Password1 != $Password2 ){
        $arrayerrors['errpassword'] = 'Пароли не совпадают!';
        $errors++;
    }
	
    if($Password1 == ""){
        $arrayerrors['errpassword'] = 'Введите пароль!';
        $errors++;
    }
    
    if ($DateBirth == ""){
        $arrayerrors['errbirth'] = 'Введите дату рождения!';
        $errors++;
    }
	
    if($Address == ""){
        $arrayerrors['erraddress'] = 'Введите адрес!';
        $errors++;
    }

    if($errors == 0){
	$id = uniqid();
        $PasswordHash = md5($Salt . $Password1);
        $query = "INSERT INTO users (Login, Password, FIO, Address, Gender, Date_birth, ID) VALUES (:Login, :PasswordHash, :FIO, :Address, :Gender, :Date_birth, :ID)";
        $resultQuery = $mysql->prepare($query);
        $resultQuery->execute([
            ':Login' => $Login,
            ':PasswordHash' => $PasswordHash,
            ':FIO' => $FIO,
            ':Address' => $Address,
            ':Gender' => $Gender,
            ':Date_birth' => $DateBirth,
            ':ID' => $id,
        ]);

        session_start();
        $_SESSION["user"] = $Login;
        $_SESSION["id"] = $id;

        header("Location: index.php");
    }
    
}
?>