<?php
    session_start();
        if($_SESSION['Login_role'] == 'admin')
        {
        }
        else if($_SESSION['Login_role'] == 'manager')
        {
            header("Location:https://team13web.azurewebsites.net/homepage2.php");
        } else if(isset($_SESSION['Login_role']) == 'employee')
        {
            header("Location:https://team13web.azurewebsites.net/homepage1.php");
        } else if(!isset($_SESSION['Login_username']))
        {
            header("Location:https://team13web.azurewebsites.net/index.php");
        }

?>

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
$P_id = $_POST['P_id'];
$P_name = $_POST['P_name'];
$hours = $_POST['hours'];
$cost = $_POST['cost'];
$status = $_POST['status'];
$department = $_POST['department'];
    
    if($P_name !== ''){
        $sql = "UPDATE project SET Project_name = '$P_name' WHERE Project_id = '$P_id'";
        $mysqli->query($sql);
        
    }
    
    if($Salary !== ''){
        $sql2 = "UPDATE project SET Hours = '$hours' WHERE Project_id = '$P_id'";
        $mysqli->query($sql2);
    }
    
    if($Date !== ''){
        $sql3 = "UPDATE project SET Cost = '$cost' WHERE Project_id = '$P_id'";
        $mysqli->query($sql3);
    }
    
    if($Address !== ''){
        $sql4 = "UPDATE project SET Status_of_project = '$status' WHERE Project_id = '$P_id'";
        $mysqli->query($sql4);
    }
    
    if($Department !== ''){
        $sql5 = "UPDATE project SET Departments_Department_number = '$department' WHERE Project_id = '$P_id'";
        $mysqli->query($sql5);
    }
    
    
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
