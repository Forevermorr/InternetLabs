<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/clientsClass.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Микрофинансовая организация</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        require "header.php";
    ?>
   <div class="container">
    <h1>Клиенты</h1>
    <table class="table">
            <thead>
                <tr>
					<th scope="col" style="text-align: center">ID</th>
                    <th scope="col" style="text-align: center">Фото</th>
                    <th scope="col" style="text-align: center">Цель займа</th>
                    <th scope="col" style="text-align: center">Комментарий менеджера</th>
                    <th scope="col" style="text-align: center">Сумма займа</th>
                    <th scope="col" style="text-align: center">Заемщик</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['filter']))
                    {
                        $arr = Clients::show(htmlspecialchars($_GET['filter']));
                    }
                    else
                    {
                        $arr = Clients::show();
                    }
                    foreach($arr as $elem)
                    {
                        echo "<tr><td style='text-align: center'>" . $elem['id'] . "</td>
						<td style='text-align: center'><img src='files/" . $elem['img_path'] . "' width='175px' height='130px'/></td>
                            <td style='text-align: center'>" . $elem['name'] . "</td>
                            <td style='text-align: center'>" . $elem['description'] . "</td>
                            <td style='text-align: center'>" . $elem['cost'] . "</td>
                            <td style='text-align: center'>" . $elem['name_customer'] . "</td>
                            
                            <td style='text-align: right'><a href='clients/edit.php?id=".$elem['id']."' type='button' id='edit' class='btn btn-primary'>Редактировать</a></td>
                            <td style='text-align: right'><button onclick='deleteMain(".$elem['id'].", `clients`)' type='button' id='del' class='btn btn-danger'>Удалить</button></td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="clients/add.php" type='button' class='btn btn-primary' style="margin-bottom: 15px">Добавить</a>
   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="main.js"></script>
</body>
</html>