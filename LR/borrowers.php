<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/borrowerClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        require "header.php";
    ?>
   <div class="container">
        <h1>Заемщики</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center">ID</th>
                    <th scope="col" style="text-align: center">ФИО</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $arr = Borrowers::show();
                    foreach($arr as $elem)
                    {
                        echo "<tr><td style='text-align: center'>" . $elem['id_customer'] . "</td>
                                <td style='text-align: center'><a href='clients.php?filter=".$elem['id_customer']."'>" . $elem['name_customer'] . "</a></td>
                                <td style='text-align: right'><a href='borrowers/edit.php?id=".$elem['id_customer']."' type='button' class='btn btn-primary'>Редактировать</a></td>
                                <td style='text-align: right'><a href='borrowers/handOver.php?id=".$elem['id_customer']."&name=".$elem['name_customer']."' type='button' class='btn btn-danger'>Удалить</a></td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="borrowers/add.php" type='button' class='btn btn-primary'>Добавить</a>
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="main.js"></script>
</body>
</html>