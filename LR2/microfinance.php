<?php
    require_once('logic.php');
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
 
   <?php  include ('header.php'); ?>
   
<!--Sorting form-->
                                    
                    <div class="container text-center mt-3 shap">
                       
                     <form class="sort" action="#" method="GET">

                                                 
                         <div>
                         <label>Сортировка по цели займа:</label>
                         <input class="form-control" type="text" name="goal" value="<?=htmlspecialchars($_GET["goal"])?>" placeholder="Цель займа"><br>
                         </div>
                         
                          <div class="form-group">
                           <label>Сортировка по ФИО заёмщика:</label>
                            <select class="form-control" name="name_customer">
                              <option value=""> Выберите заёмщика </option>
                                 <?php foreach ($tableEvent as $count):?>
                                 <?$selected = htmlspecialchars($_GET["name_customer"]) == $count['id']?>
                                 <option <?=($selected ? ' selected ' : '')?> value="<?=$count['id']?>"><?=$count['name_customer']?></option>
                                 <?php endforeach;?>
                            </select><br>
                          </div>
                        <div class="form-group">
                            <label>Сортировка по комментарию менеджера:</label>
                            <textarea class="form-control" type="text" name="comment" value="" placeholder="Комментарий"><?=htmlspecialchars($_GET["comment"])?></textarea><br>
                          </div>   
                        <div>
                         <label>Сортировка по сумме займа:</label>
                        <input class="form-control" type="number" name="cost" value="<?=htmlspecialchars($_GET["cost"])?>" placeholder="Сумма займа"><br>
                         </div>
                              
                        <button type="submit" class="btn btn-primary sendbtn" name="Send" value="Send">Отправить</button>      
                        <button type="submit" class="btn btn-primary clearbtn" name="clearFilter" value="ClearFilter">Очистить</button>
                                                                                                                                   
                                                                                                                                    
                     </form>  
                      
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
				  <?php include ('footer.php');?> 				  
              </div>
    </body>
</html>