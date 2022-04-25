<?php
    session_start();
        if($_SESSION['Login_role'] == 'employee')
        {
        }
        else if($_SESSION['Login_role'] == 'manager')
        {
            header("Location:https://team13web.azurewebsites.net/homepage2.php");
        } else if(isset($_SESSION['Login_role']) == 'admin')
        {
            header("Location:https://team13web.azurewebsites.net/admin_home.php");
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

    //$e_id = $_SESSION['Employee_Employee_id'];
    
    $Clock_in = $_POST['Clock_in'];
    $Clock_out = $_POST['Clock_out'];
    
    
    $username = $_SESSION['Login_username'];
    $sql = "SELECT Employee_Employee_id FROM employeedatabaseaccess WHERE Login_username = '$username' ";
    $result = mysqli_query($mysqli,$sql);
    $employee_id = mysqli_fetch_assoc($result);
    $_SESSION['employee_id'] = $employee_id['Employee_Employee_id'];
    $e_id = $_SESSION['employee_id'];
    /*
    if($Clock_in !== ''){
        //$sql2 = "UPDATE employee SET Clock_in = current_timestamp() WHERE Employee_id = '$e_id'";
        /*
        if(mysqli_query($mysqli,$sql2) === FALSE){
            echo "Did not work";
            exit();
        }
        */
        //$mysqli->query($sql2);
    //}
    
    $sql2 = "UPDATE employee SET Clock_in = current_timestamp() WHERE Employee_id = '$e_id'";
    if($mysqli->query($sql2) === TRUE){
        header('location:https://team13web.azurewebsites.net/test.php');
        exit();
    }
    //echo $Clock_in;
    //echo $e_id;
    /*
    if($Clock_out === 'Clock_out'){
        $sql = "UPDATE employee SET Clock_out = current_timestamp() WHERE Employee_id = '$e_id'";
        if(mysqli_query($mysqli,$sql) === FALSE){
            echo "Did not work";
        }
        $sql2 = "SELECT time_to_sec(TIMEDIFF(Clock_out,Clock_in))/3600 FROM employee WHERE Employee_id = '$e_id'";
        $resul2 = mysqli_query($mysqli,$sql2);
        $data = mysqli_fetch_assoc($resul2);
        $hours = $data['Hours'];
        $sql = "SELECT Total_hours FROM employee WHERE Employee_id = '$e_id'";
        $result = mysqli_query($mysqli,$sql);
        $data = mysqli_fetch_assoc($result);
        $total_hours = $data['Total_hours'];
        $All_Hours = $total_hours + $hours;
        $sql = "UPDATE employee SET Total_hours = '$All_Hours' WHERE Employee_id = '$e_id'";
        if(mysqli_query($mysqli,$sql) === FALSE){
            ECHO "DID NOT WORK";
        }
    }
    */
    
    
?>