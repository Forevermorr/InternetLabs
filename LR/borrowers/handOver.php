<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/borrowerClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перенос и удаление заемщика</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        require "../header.php";
    ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../borrowers.php">Заемщики</a></li>
        <li class="breadcrumb-item active" aria-current="page">Перенос и удаление заемщика</li>
    </ol>
    </nav>
    <h1>Перенос клиентов от заемщика <?php echo $_GET['name']?></h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            Ошибка
        </div>
        <form action="" class="flex">
            <select style='width: 285px; margin-bottom: 10px' class="form-select" name="customer" aria-label="Default select example">
                <?php
                    $arr = Borrowers::show();
                    foreach($arr as $elem)
                    {
                        if($elem['id_customer'] != $_GET['id'])
                            echo " <option value='" . $elem['id_customer'] . "'>" . $elem['name_customer'] . "</option>";
                    }  
                ?>
            </select>
            <button onclick="handOverFunction('<?php echo $_GET['id'] ?>')" style='margin-top: 10px' type='button' class='btn btn-primary'>Перенести клиентов и удалить заемщика</button></br>
            <button onclick="delFunction('<?php echo $_GET['id'] ?>')" style='margin-top: 10px' type='button' class='btn btn-danger'>Удалить заемщика со всеми клиентами</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="handler.js"></script>
</body>
</html>