<?php
    require_once('../shared/mysql.class.php');    
    
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $qry = "SELECT * FROM usersales where username = '$username' and password = '$pass'";
    $result = mysql_query($qry);
        if($row = mysql_fetch_array($result)){
            session_start();
            $_SESSION["username"] = $row["username"];
			$_SESSION["role"] = $row["role"];
			$_SESSION["fullname"] = $row["fullname"];
            header("Location:../../index.php");
        }
        else{
            header("Location:../../login.php");
        }
?>