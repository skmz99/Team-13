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
$delete_all = $_POST['all'];
$all = "ALL";
    if(strcmp($delete_all,$all) === 0){
        $sql = "DELETE FROM log";
        $mysqli->query($sql);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit(0);
    }else{
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit(0);
    }
    $mysqli->close();
?>
