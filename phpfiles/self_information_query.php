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
session_start();
$username = $_SESSION['Login_username'];
//$sql0 = "SELECT Employee_Employee_id FROM employeedatabaseaccess WHERE Login_username = '$username'";
//$result0 = mysqli_query($mysqli,$sql0);
//$e_id = mysqli_fetch_assoc($result0);
//$employee_id = $e_id['Employee_Employee_id'];
$employee_id = $_SESSION['employee_id'];
$employee_name = $_POST['e_name'];
$employee_address = $_POST['e_address'];
$login_username = $_POST['l_username'];
$login_password = $_POST['l_password'];
$dependent_name = $_POST['d_name'];
$dependent_age = $_POST['d_age'];
    
    if($employee_name !== ''){
       
        $sql = "UPDATE employee SET Name = '$employee_name' WHERE Employee_id = '$employee_id'";
        if($mysqli->query($sql) === FALSE){
            echo $mysqli->error;   
        }
    }
    
    if($employee_address !== ''){
        $sql2 = "UPDATE employee SET Address = '$employee_address' WHERE Employee_id = '$employee_id'";
        $mysqli->query($sql2);
    }
    
    if($login_username !== ''){
        $sql3 = "UPDATE employeedatabaseaccess SET Login_username = '$login_username' WHERE Employee_Employee_id = '$employee_id'";
        $mysqli->query($sql3);
        header('location:https://team13web.azurewebsites.net');
        exit();
        //got to redirect to index.php
    }
    
    if($login_password !== ''){
        $sql4 = "UPDATE employeedatabaseaccess SET Login_password = '$login_password' WHERE Employee_Employee_id = '$employee_id'";
        $mysqli->query($sql4);
        header('location:https://team13web.azurewebsites.net');
        exit();
        //got to redirect to index.php
    }
    
    if($dependent_name !== ''){
        $sql5 = "UPDATE dependent SET Name = '$dependent_name' WHERE Employee_Employee_id = '$employee_id'";
        $mysqli->query($sql5);
    }
    
    if($dependent_age !==''){
        $sql6 = "UPDATE dependent SET AGE = '$dependent_age' WHERE Employee_Employee_id = '$employee_id'";
        $mysqli->query($sql6);
    }
    /*
    if($login_password !== ''){
        header('location:https://team13web.azurewebsites.net');
        exit();
    }
    if($log_username !== ''){
        header('location:https://team13web.azurewebsites.net/self_information.php');
        exit();
    }
    */
    else{
        header('location:https://team13web.azurewebsites.net/self_information.php');
        exit();
    }
?>
