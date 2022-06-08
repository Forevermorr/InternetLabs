<?php   
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/borrowerClass.php');
	
    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'add')
    {
        $result = Borrowers::add(htmlspecialchars($_POST['name']));
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'DELETE')
    {
        parse_str(file_get_contents('php://input'), $_DELETE);
        $result = Borrowers::delete($_DELETE['id']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'PUT')
    {
        parse_str(file_get_contents('php://input'), $_PUT);
        $result = Borrowers::edit($_PUT['id'], $_PUT['name']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'handOver')
    {
        $result = Borrowers::handOver($_POST['selected_id'],$_POST['del_id']);
        $result = Borrowers::delete($_POST['del_id']);
        echo json_encode($result);
    }

?>