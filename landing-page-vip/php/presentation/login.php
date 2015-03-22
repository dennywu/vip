<?php
    require_once('../shared/mysql.class.php');    
    
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $qry = "SELECT * FROM user where username = '$username' and password = '$pass'";
    $result = mysql_query($qry);
        if($row = mysql_fetch_array($result)){
            session_start();
            $_SESSION["admin"] = $row["username"];
            header("Location:../../admin.php");
        }
        else{
            header("Location:../../login.php");
        }
?>