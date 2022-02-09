<?php
require_once('logic/logic.php');
$fullList = getFiltration();
$tableEvent = getTable();
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
   

   
<!--Header connection-->
 
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

					<div class="text-end">
                        <a href="text.php">
                            Обработка текста
                        </a>
                    </div>

               
<!--Data base-->
                       
                    <div  class="container text-center mt-3 shap">
                       
                        <?php if ( count($fullList) > 0):?>
                                                
<!--Table header-->            
                          
                    
                        <table class="tab">
                            <thead>
                            <tr>
                                  <th scope="col">Фото</th>
                                  <th scope="col">Цель займа</th>
                                  <th scope="col">Заёмщик</th>
                                  <th scope="col">Комментарий менеджера</th>
                                  <th scope="col">Сумма займа</th>
                             </tr>      
                             </thead>                       
                          
                          
                          <?php foreach($fullList as $value): ?>  
                        
<!--Positions-->
								  <tbody class="container text-center mt-3 pos">
                                                                               
                                  <tr class="str">
                                 
                                  <td scope="col" class="p-2 img_path">
                                   <img src="inc/img/<?php echo $value['img_path'];?>" class="img" height='150px', width='200px' alt="">
                                  </td>
                                    
                                  <td scope="col" class="p-2 goal">
                                      <?php echo $value['goal'];?>
                                  </td>
                                  
                                  <td scope="col" class="p-2 id_customer">
                                      <?php echo $value['name_customer'];?>    
                                  </td>
                                  
                                  <td scope="col" class="p-2 comment">
                                      <?php echo $value['comment'];?>    
                                  </td>
                                  
                                  <td scope="col" class="p-2 cost">
                                      <?php echo $value['cost'];?>                              
                                  </td> 
                                  
                                </tr>
                             <?php endforeach;?>   
                          </tbody> 
                    </table>    
				  
                  <?php endif;?>  
				  <?php include('footer.php');?> 				  
              </div>
			  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
    </body>
</html>