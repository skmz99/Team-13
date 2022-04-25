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
$Project_id= $_POST['id'];
    if($Project_id !== ''){
        $sql2 = "DELETE FROM project WHERE Project_id = '$Project_id'";
        if($mysqli->query($sql2) === FALSE){
            echo "ERROR PLEASE REVIEW YOUR SUBMISSION";
        }
            header('location:https://team13web.azurewebsites.net/manager_projects.php');
            exit();
    }
    $mysqli->close();
?>



