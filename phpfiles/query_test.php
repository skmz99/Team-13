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
$Employee_id = $_POST['Employee_id'];
$Name = $_POST['name'];
$Salary = $_POST['Salary'];
$Date = $_POST['meeting-time'];
$Address = $_POST['Address'];
$Department = $_POST['Department_number'];

//for dependent form
$Phone_number = $_POST['Phone_number'];
$Age = $_POST['Age'];
$Relationship = $_POST['RelationShip_with_employee'];
$D_Name = $_POST['Dependent_name'];
$Sex = $_POST['Sex'];
//For database access
$password = $_POST['Password'];
$Username = $_POST['Username'];
    $sql = "INSERT INTO employee (Employee_id,Name,Salary,Date,Address,Departments_Department_number) VALUES($Employee_id,'$Name',$Salary,'$Date','$Address',$Department)";
    if($mysqli->query($sql) === FALSE){
        echo $mysqli->error;
        exit(0);
    }
    $sql2 = "INSERT INTO dependent (Phone_number,Age,RelationShip_with_employee,Name,Sex,Employee_Employee_id) VALUES($Phone_number,$Age,'$Relationship','$D_Name','$Sex',$Employee_id)";
    if($mysqli->query($sql2) === FALSE){
        echo "ERROR PLEASE REVIEW YOUR SUBMISSION";
        exit(0);
    }
    $sql3 = "INSERT INTO employeedatabaseaccess (Login_username,Login_password,Employee_Employee_id) VALUES('$Username','$password','$Employee_id')";
    if($mysqli->query($sql3) === TRUE){
        echo "New record created successfully. Please head back to https://team13web.scm.azurewebsites.net and login";
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    $mysqli->close();
?>