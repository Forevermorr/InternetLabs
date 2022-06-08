<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/borrowerClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заемщика</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        require "../header.php";

        if($_GET['id'])
        {
            $elem = Borrowers::borrowerById(htmlspecialchars($_GET['id']));
            $row = $elem[0];
            $customersId = $row['id_customer'];
            $customersName = $row['name_customer'];
        }
        else
        {
            header("Location: http://".$_SERVER['HTTP_HOST']."/lr/borrowers.php");  
        }
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../borrowers.php">Заемщики</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактировать заемщика</i></li>
    </ol>
    </nav>
    <h1>Редактировать заемщика: <i><?php echo $customersName ?></i></h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            Ошибка
        </div>
        <form action="" class="d-flex">
            <input style='width: 288px;' class="form-control" type="text" name="name" placeholder="Имя брэнда" value="<?php echo $customersName ?>">
            <button style='margin-left: 15px' type='button' class='btn btn-primary' onclick="editFunction('<?php echo $customersId ?>')">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="handler.js"></script>
</body>
</html>