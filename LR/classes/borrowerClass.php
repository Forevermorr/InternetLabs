<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/actionsClass.php');
    
    class Borrowers
    {
       public static function add(string $name_) : array
       {
            if(isset($name_))
            {
                $result = ActionBorrowers::addAction($name_);
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

       public static function edit(int $id_, string $name_) : array
       {
            if(isset($id_) and isset($name_))
            {
                $result = ActionBorrowers::editAction($id_, $name_);
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
                $result = ActionBorrowers::deleteAction($id_);
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
       
       public static function show() : array
       {
            $arr = ActionBorrowers::showAction();
            return $arr;
       }

       public static function borrowerById(int $id_) : array
       {
            if(isset($id_))
            {
                $arr = ActionBorrowers::getByIdAction($id_);
                return $arr;
            }
            else
            {
                $response = [
                    "check" => false
                ];
                return $response;
            }
       }

       public static function handOver(int $selected_id, int $deleted_id) : array
       {
            if(isset($selected_id) && isset($deleted_id))
            {
                $result = ActionBorrowers::handOverAction($selected_id, $deleted_id);
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
    }

?>