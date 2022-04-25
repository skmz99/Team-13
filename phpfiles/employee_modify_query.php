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
$Employee_id = $_POST['E_id'];
$Name = $_POST['E_name'];
$Project = $_POST['E_project'];
$Date = $_POST['E_date'];
$Address = $_POST['E_address'];
$Department = $_POST['E_department'];
$L_name = $_POST['L_name'];
    
    if($Name !== ''){
        $sql = "UPDATE employee SET Name = '$Name' WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    if($Project !== ''){
        $sql2 = "UPDATE employee SET project_project_id = '$Project' WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql2);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    if($Date !== ''){
        $sql3 = "UPDATE employee SET Date = '$Date' WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql3);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    if($Address !== ''){
        $sql4 = "UPDATE employee SET Address = '$Address' WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql4);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    if($Department !== ''){
        $sql5 = "UPDATE employee SET Departments_Department_number = '$Department' WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql5);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    if($L_name !== ''){
        $sql6 = "UPDATE employeedatabaseaccess SET Login_role = '$L_name' WHERE Employee_Employee_id = '$Employee_id'";
        $mysqli->query($sql6);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    
    
    if($mysqli->query($sql3) === TRUE){
       // echo "Record for '.$Name.' has been updated.";
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    $mysqli->close();
?>
