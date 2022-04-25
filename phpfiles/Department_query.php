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

$Department_number = $_POST['Department_number'];
$HR = $_POST['HR'];
$Accounting = $_POST['Accounting'];
$FrontEnd_Developers = $_POST['FrontEnd_Developers'];
$BackEnd_Developers = $_POST['BackEnd_Developers'];
$Company_Company_id = $_POST['Company_Company_id'];
    $sql = "INSERT INTO departments (Department_number,HR,Accounting,FrontEnd_Developers,BackEnd_Developers,Company_Company_id) VALUES('$Department_number','$HR','$Accounting','$FrontEnd_Developers','$BackEnd_Developers','$Company_Company_id')";
    if($mysqli->query($sql) === TRUE){
        echo "New Department has been made. Click this ";
        echo '<a href="https://team13web.azurewebsites.net/admin_home.php" target="_blank">link</a>';
        echo " to return to the Admin page. Please close this page.";
    }
    else{
         echo $mysqli->error;
    }
    $mysqli->close();



?>