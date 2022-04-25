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
$e_id = $_POST['id'];
$name = $_POST['name'];
    $sql = "DELETE FROM employee WHERE Employee_id = '$e_id' AND Name ='$name'";
    if($mysqli->query($sql) === TRUE){
        echo "Project has been deleted.";
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    header('location:https://team13web.azurewebsites.net/manager_Departments.php');
    $mysqli->close();
?>