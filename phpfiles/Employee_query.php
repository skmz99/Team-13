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
$Employee_id = $_POST['Employee_id'];
$Name = $_POST['name'];
$Status = 'Clocked out';
$Hours = 0;
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
$role = $_POST['role']; // test
//$link = "https://team13web.azurewebsites.net/admin_home.php";
    $sql = "INSERT INTO employee (Employee_id,Name,Date,Status,Total_Hours,Address,Departments_Department_number) VALUES('$Employee_id','$Name','$Date','$Status','$Hours','$Address','$Department')";
    //$mysqli->query($sql);
    if(mysqli_query($mysqli,$sql) === FALSE){
        echo $mysqli->error;
        echo "Please choose a unique Employee_id or choose a Department that exists.";
        header('Refresh: 5; url=https://team13web.azurewebsites.net/data_entry_employee.php');
        exit(0);
    }
    $sql2 = "INSERT INTO dependent (Phone_number,Age,RelationShip_with_employee,Name,Sex,Employee_Employee_id) VALUES('$Phone_number','$Age','$Relationship','$D_Name','$Sex','$Employee_id')";
    //$mysqli->query($sql2);
    if(mysqli_query($mysqli,$sql2) === FALSE){
        echo $mysqli->error;
        echo "Duplicate Phone Number. ";
        echo "Error, please go back and review your submission";
        $sql4 = "DELETE FROM employee WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql4);
        echo " ";
        header('Refresh: 5; url=https://team13web.azurewebsites.net/data_entry_employee.php');
        exit(0);
    }
    $sql3 = "INSERT INTO employeedatabaseaccess (Login_username,Login_password,Employee_Employee_id,Login_role) VALUES('$Username','$password','$Employee_id','$role')"; // testing role
    //$mysqli->query($sql3);
    if(mysqli_query($mysqli,$sql3) === TRUE){
        //echo "New record created successfully. Click this ";
        //echo '<a href="https://team13web.azurewebsites.net/admin_home.php" target="_blank">link</a>';
        //echo " to return to the Admin page. Please close this page.";
        header('location:https://team13web.azurewebsites.net/Admin_Log.php');
        exit();
    }
    else{
        //echo "Error: " .$sql . "<br>" .$mysqli->error;
        $sql5 = "DELETE FROM employee WHERE Employee_id = '$Employee_id'";
        $mysqli->query($sql5);
        echo " ";
        echo "User Name is already taken.";
        header('Refresh: 5; url=https://team13web.azurewebsites.net/data_entry_employee.php');
       exit(0);
    }
    //$mysqli->close();
?>


