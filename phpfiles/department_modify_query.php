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
$d_number = $_POST['d_number'];
$hr = $_POST['hr'];
$accounting = $_POST['accounting'];
$FED = $_POST['FED'];
$BED = $_POST['BED'];
$C_number = $_POST['C_number'];
    
    if($hr !== ''){
        $sql = "UPDATE departments SET HR = '$hr' WHERE  Department_number = '$d_number'";
        $mysqli->query($sql);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    
    if($accounting !== ''){
        $sql2 = "UPDATE departments SET Accounting = '$accounting' WHERE  Department_number = '$d_number'";
        $mysqli->query($sql2);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    
    if($FED !== ''){
        $sql3 = "UPDATE departments SET FrontEnd_Developers = '$FED' WHERE  Department_number = '$d_number'";
        $mysqli->query($sql3);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    
    if($BED !== ''){
        $sql4 = "UPDATE departments SET BackEnd_Developers = '$BED' WHERE  Department_number = '$d_number'";
        $mysqli->query($sql4);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    
    if($C_number !== ''){
        $sql5 = "UPDATE departments SET Company_Company_id = '$C_number' WHERE  Department_number = '$d_number'";
        $mysqli->query($sql5);
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    
    
    if($mysqli->query($sql3) === TRUE){
        echo "Record for '.$Name.' has been updated.";
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    $mysqli->close();
?>
