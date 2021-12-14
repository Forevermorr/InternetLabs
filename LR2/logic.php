<?php

	function SetDb()
	{
		$host = 'localhost';
		$dbname = 'microfinance';
		$username = 'root';
		$password = '';
	
		try
		{
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		}
		catch(PDOException $exception)
		{
			die("Could not connect to the database $dbname" . $exception->getMessage());
		}
		return $pdo;
	}


    function getTable():array
    {
        $pdo = SetDb();
        $result = $pdo->query("SELECT * FROM borrowers");
        $evems = [];
        
        while($rew = $result->fetch())
        {
            $evems[] = $rew;
        }
        return $evems;
    }


    function Filtration($where, $add)
    {
        if ($where) {
            $where .= " AND $add";
            }
        else $where = $add;
        
        return $where;
    }


    function getFiltration():array
    {
        $items = []; 
        $sql = "SELECT * , borrowers.name_customer as name_customer
        FROM clients
        JOIN borrowers ON clients.id_customer=borrowers.id"; 

        $arBinds =[];
        if (!key_exists('clearFilter', $_GET)) 
        {
            $where = "";
            
            if ($_GET['goal']) {
                $where = Filtration($where, " clients.goal LIKE CONCAT('%', :goal, '%')");
                $arBinds['goal'] = htmlspecialchars($_GET['goal']);	
            }
            if ($_GET['name_customer']) {
                $where = Filtration($where, " clients.id_customer = :name_customer");
                $arBinds['name_customer'] = htmlspecialchars($_GET['name_customer']);
            }
            if ($_GET['comment']) {
                $where = Filtration($where, " clients.comment LIKE CONCAT('%', :comment, '%')");
                $arBinds['comment'] = htmlspecialchars($_GET['comment']);
            }
            if ($_GET['cost']) {
                $where = Filtration($where, " clients.cost = :cost");
                $arBinds['cost'] = htmlspecialchars($_GET['cost']);
            }
            if (!($where === "")) {
                $sql .= " WHERE " . $where;
            }
        }
        else
        {
            session_destroy();
            header('Location: microfinance.php');
        }
    
	
    $pdo = SetDb();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arBinds);

    foreach ($stmt as $row) {
        $items[] = $row;
    }
        
    return $items;
        
    }
	
?>