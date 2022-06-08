<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/borrowerClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/clientsClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать клиента</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    require "../header.php";

    if($_GET['id'])
    {
        $elem = Clients::clientById(htmlspecialchars($_GET['id']));
        $row = $elem[0];
        $clients_id = $row['id'];
        $clients_name = $row['name'];
        $clients_description = $row['description'];
        $clients_cost = $row['cost'];
        $id_customer = $row['id_customer'];
        $img_path = $row['img_path'];
    }
    else
    {
        header("Location: http://".$_SERVER['HTTP_HOST']."/lr/clients.php");  
    }
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../clients.php">Клиенты</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактировать клиента</li>
    </ol>
    </nav>
    <h1>Редактировать клиента №<?php echo $clients_id ?></h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            Ошибка
        </div>
        <form action="" class="flex flex-wrap">
			<a style='margin-left: 14px'>Цель займа:</a>
            <input style='width: 288px; margin-bottom: 15px' value="<?php echo $clients_name ?>" class="form-control" type="text" name="name" placeholder="Введите цель займа">
			<a style='margin-left: 14px'>Сумма займа:</a>
            <input style='width: 288px; margin-bottom: 15px' value="<?php echo $clients_cost ?>" class="form-control" type="text" name="cost" placeholder="Введите сумму займа">
			<a style='margin-left: 14px'>Комментарий менеджера:</a>
            <input style='width: 288px; margin-bottom: 15px' value="<?php echo $clients_description ?>" class="form-control" type="text" name="des" placeholder="Введите комментарий менеджера">
			<a style='margin-left: 14px'>Фото:</a>
            <input style='width: 288px; margin-bottom: 15px'  class="form-control" type="file" name="ava" >
			<a style='margin-left: 14px'>Заемщик:</a>
            <select style='width: 288px; margin-bottom: 15px' class="form-select" name="customer" aria-label="Default select example">
                <?php
                     $arr = Borrowers::show();
                     foreach($arr as $elem)
                     {
                        if($id_customer == $elem['id_customer'])
							echo " <option selected value='" . $elem['id_customer'] . "'>" . $elem['name_customer'] . "</option>";
                        else
							echo " <option value='" . $elem['id_customer'] . "'>" . $elem['name_customer'] . "</option>";
                     }
                ?>
            </select>
            <button style='margin-bottom: 15px' type='button' class='btn btn-primary' onclick="editFunction(`<?php echo $clients_id?>`, `<?php echo $img_path?>`)">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="./handler.js"></script>
</body>
</html>