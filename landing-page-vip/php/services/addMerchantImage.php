<?php
    require_once('../shared/mysql.class.php');
	
	$filename = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
	
	if($fileSize > 0 || $fileError == 0){ //check if the file is corrupt or error
        $move = move_uploaded_file($_FILES['image']['tmp_name'], '../../images/merchants/'.$filename); //save image to the folder
    }
    echo json_encode(array());
?>