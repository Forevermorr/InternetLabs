<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/actionsClass.php');

    class Clients
    {
       public static function add(string $name_, int $cost_, string $des_, int $customer_, string $fileName_, string $filePath_) : array
       {
        if(isset($name_) and isset($cost_) and isset($des_) and isset($customer_) and isset($fileName_) and isset($filePath_))
        {
            $result = ActionClients::addAction($name_, $cost_, $des_, $customer_, $fileName_, $filePath_);
            if($result)
            {
                $response = [
                    "check" => true
                ];
                return $response;
            }
            else
            {
                $response = [
                    "check" => false
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                "check" => false
            ];
            return $response;
        }
       }

       public static function editWhithoutFile(int $id_,string $name_, int $cost_, string $des_, int $customer_) : array
       {
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($customer_))
        {
            $result = ActionClients::editActionWhithOutFile($id_, $name_, $cost_, $des_, $customer_);
            if($result)
            {
                $response = [
                    "check" => true
                ];
                return $response;
            }
            else
            {
                $response = [
                    "check" => false
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                "check" => false
            ];
            return $response; 
        }
       }


       public static function editWhithFile(int $id_,string $name_, int $cost_, string $des_, int $customer_, string $lastfileName_, string $fileName_, string $filePath_) : array
       {
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($customer_) and isset($lastfileName_) and isset($fileName_) and isset($filePath_))
        {
            $result = ActionClients::editActionWhithFile($id_, $name_, $cost_, $des_, $customer_, $lastfileName_, $fileName_, $filePath_);
            if($result)
            {
                $response = [
                    "check" => true
                ];
                return $response;
            }
            else
            {
                $response = [
                    "check" => false
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                "check" => false
            ];
            return $response; 
        }
       }


       public static function delete(int $id_) : array
       {
        if(isset($id_))
        {
            $result = ActionClients::deleteAction($id_);
            if($result)
            {
                $response = [
                    "check" => true
                ];
                return $response;
            }
            else
            {
                $response = [
                    "check" => false
                ];
                return $response;
            }
        }
        else
        {
            $response = [
                "check" => false
            ];
            return $response;
        }
       }
       
       public static function show(int $id = 0) : array
       {
        $arr = ActionClients::showAction($id);
        return $arr;
       }

       public static function clientById(int $id_) : array
       {
        $arr = ActionClients::getByIdAction($id_);
        return $arr;
       }
    }

?>