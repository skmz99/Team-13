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

$e_id = $_POST['e_id'];
$e_salary = $_POST['e_salary'];
$e_address = $_POST['e_address'];
$ed_number = $_POST['ed_number'];

    if($e_salary !== ''){
        $sql = "UPDATE employee SET Salary = '$e_salary' WHERE Employee_id = '$e_id'";
        $mysqli->query($sql);
    }
    
    
    if($e_address !== ''){
        $sql3 = "UPDATE employee SET Address = '$e_address' WHERE Employee_id = '$e_id'";
        $mysqli->query($sql3);

    }
    
    if($ed_number !== ''){
        $sql4 = "UPDATE employee SET Departments_Department_number = '$ed_number' WHERE Employee_id = '$e_id'";
        $mysqli->query($sql4);
    }
        header('location:https://team13web.azurewebsites.net/manager_Departments.php');
    
    
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
