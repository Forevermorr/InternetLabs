<?php   
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/clientsClass.php');
	
    if($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['method'] === 'POST')
    {
        if ($_FILES && $_FILES["ava"]["error"] == UPLOAD_ERR_OK)
        {
            $result = Clients::add(htmlspecialchars($_POST['name']),htmlspecialchars($_POST['cost']),htmlspecialchars($_POST['des']),htmlspecialchars($_POST['customer']),$_FILES["ava"]["name"],$_FILES["ava"]["tmp_name"]);
            echo json_encode($result);
        }
        else
        {
            $response = [
                "check" => false
            ];
            echo json_encode($response);
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'DELETE')
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $result = Clients::delete($_DELETE['id']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'PUT')
    {
        if ($_FILES && $_FILES["ava"]["error"] == UPLOAD_ERR_OK)
        {
            $result = Clients::editWhithFile(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['name']),htmlspecialchars($_POST['cost']),htmlspecialchars($_POST['des']),htmlspecialchars($_POST['customer']),htmlspecialchars($_POST['lastfileName']),$_FILES["ava"]["name"],$_FILES["ava"]["tmp_name"]);
            echo json_encode($result);
        }
        else
        {
            $result = Clients::editWhithoutFile(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['name']), htmlspecialchars($_POST['cost']), htmlspecialchars($_POST['des']), htmlspecialchars($_POST['customer']));
            echo json_encode($result);
        }  
    }

?>