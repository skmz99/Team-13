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

$P_id = $_POST['p_id'];
$P_name = $_POST['p_name'];
$hours = $_POST['p_hours'];
$cost = $_POST['p_cost'];
$status = $_POST['p_status'];

    if($P_name !== ''){
        $sql = "UPDATE project SET Project_name = '$P_name' WHERE Project_id = '$P_id'";
        $mysqli->query($sql);
    }
    if($P_status !== ''){
        $sql2 = "UPDATE project SET Status_of_project = '$status' WHERE Project_id = '$P_id'";
        $mysqli->query($sql2);
    }
        header('location:https://team13web.azurewebsites.net/manager_Projects.php');
    
    
    if($mysqli->query($sql3) === TRUE){
        echo "Record for '.$Name.' has been updated.";
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    $mysqli->close();
?>
