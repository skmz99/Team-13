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
$P_id = $_POST['Project_id'];
$P_name = $_POST['name'];
$Hours = $_POST['hours'];
$Cost = $_POST['cost'];
$Status = $_POST['status'];
$D_id = $_POST['Department_number'];
    $sql = "INSERT INTO project(Project_id,Project_name,Hours,Cost,Status_of_project,Departments_Department_number) VALUES('$P_id','$P_name','$Hours','$Cost','$Status','$D_id')";
    if($mysqli->query($sql) === TRUE){
        echo "New project has been made. Click this ";
        echo '<a href="https://team13web.azurewebsites.net/admin_home.php" target="_blank">link</a>';
        echo " to return to the Admin page. Please close this page.";
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
       echo $mysqli->error;
       exit(0);
    }
    $mysqli->close();
?>