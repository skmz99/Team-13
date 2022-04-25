<?php
include 'db.inc.php';

$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$host = "localhost:$port";
$username = "azure";
$password = "6#vWHD_$";
$db_name = "localdb";

//Initializes MySQLi
$mysqli = new mysqli($host,$username,$password,$db_name);

if($mysqli->connect_errno){
    echo"Failed to connect to MySQL: ". $mysqli->connect_error;
    exit();
}
//For employee form
$message_id = $_POST['id'];
$delete_all = $_POST['all'];
    if($message_id !== ''){
        $sql2 = "DELETE FROM log WHERE message_id = '$message_id'";
        if($mysqli->query($sql2) === FALSE){
            echo "ERROR PLEASE REVIEW YOUR SUBMISSION";
        }
            header('location:https://team13web.azurewebsites.net/Admin_Log.php');
            exit();
    }
    $all = "ALL";
    if(strcmp($delete_all,$all) === 0){
        $sql = "DELETE FROM log";
        $mysqli->query($sql);
        echo "idk";
        
    }
    $mysqli->close();
?>





