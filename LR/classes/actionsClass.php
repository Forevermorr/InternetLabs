<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/databaseClass.php');

    class ActionBorrowers
    {
        public static function addAction(string $name_) : bool
        {
            $mysql = Database::connection();
            $name = mysqli_real_escape_string($mysql,$name_);
			
            $query = "INSERT INTO borrowers (`id_customer`, `name_customer`) VALUES ( NULL, '$name')";
            $result = $mysql->query($query);
            return $result;
        }

        public static function editAction(int $id_, string $name_) : bool
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
			
            $query = "UPDATE borrowers SET name_customer = '$name' WHERE id_customer = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function deleteAction(int $id_) : bool
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
			
            $query = "DELETE FROM borrowers WHERE id_customer = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function showAction() : array
        {
            $mysql = Database::connection();
			
            $query = "SELECT id_customer, name_customer FROM borrowers ORDER BY id_customer";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }

        public static function getByIdAction(int $id_) : array
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
			
            $query = "SELECT id_customer, name_customer FROM borrowers WHERE id_customer = $id";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
		
        public static function handOverAction(int $selected_id, int $deleted_id) : bool
        {
            $mysql = Database::connection();
            $selected_id = mysqli_real_escape_string($mysql,$selected_id);
            $deleted_id = mysqli_real_escape_string($mysql,$deleted_id);
			
            $query = "UPDATE clients SET id_customer = '$selected_id' WHERE id_customer = $deleted_id";
            $result = $mysql->query($query);
            return $result;
        }
    }

    class ActionClients 
	{
        public static function addAction(string $name_, int $cost_, string $des_, int $customer_, string $fileName_, string $filePath_) : bool
        {
            $mysql = Database::connection();
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $customer = mysqli_real_escape_string($mysql,$customer_);

            $fileName = date("Ymdhms").$fileName_;
            $url = "../files/".$fileName;
            move_uploaded_file($filePath_, $url);

            $query = "INSERT INTO clients (`id`, `name`, `description`, `cost`, `id_customer`, `img_path`) 
                        VALUES (NULL, '$name', '$des', '$cost', '$customer', '$fileName')";
            $result = $mysql->query($query);
            return $result;
        }

        public static function editActionWhithOutFile(int $id_,string $name_, int $cost_, string $des_, int $customer_) : bool
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $customer = mysqli_real_escape_string($mysql,$customer_);

            $query = "UPDATE clients SET name = '$name', description = '$des', cost = '$cost', id_customer = '$customer' WHERE id = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function editActionWhithFile(int $id_,string $name_, int $cost_, string $des_, int $customer_, string $lastfileName_, string $fileName_, string $filePath_) : bool
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $customer = mysqli_real_escape_string($mysql,$customer_);

            $fileName = date("Ymdhms").$fileName_;
            $url = "../files/".$fileName;
            move_uploaded_file($filePath_, $url);

            unlink("../files/".$lastfileName_);

            $query = "UPDATE clients SET name = '$name', description = '$des', cost = '$cost', id_customer = '$customer', img_path = '$fileName' WHERE id = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function deleteAction(int $id_) : bool
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $query = "SELECT img_path FROM clients WHERE id = $id";
            $result = $mysql->query($query);
            $row = $result->fetch_assoc();
            unlink("../files/".$row['img_path']);
			
            $query = "DELETE FROM clients WHERE id = $id";
            $result = $mysql->query($query);
            return $result;
        }
		
        public static function showAction(int $id) : array
        {
            $mysql = Database::connection();
            if ($id == 0)
            {
                $query = "SELECT clients.id, clients.name, clients.description, clients.cost, borrowers.name_customer, clients.img_path FROM clients INNER JOIN borrowers ON borrowers.id_customer = clients.id_customer ORDER BY id";
            }
            else
            {
                $query = "SELECT clients.id, clients.name, clients.description, clients.cost, borrowers.name_customer, clients.img_path FROM clients INNER JOIN borrowers ON borrowers.id_customer = clients.id_customer WHERE clients.id_customer = $id";
            }

            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
		
        public static function getByIdAction(int $id_) : array
        {
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
			
            $query = "SELECT id, name, description, cost, id_customer, img_path FROM clients WHERE id = $id";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc())
            {
                $arr[] = $row;
            }
            return $arr;
        }
    }

?>