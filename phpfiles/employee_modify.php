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
/*
                    $username = $_SESSION['Login_username'];
                    $e_id = $_SESSION['employee_id'];
                    
                    $sql2 = "SELECT Employee_id, Name, Address FROM employee WHERE Employee_id = '$e_id'";
                    $result2 = mysqli_query($mysqli,$sql2);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee ID'."</td>";
                    echo "<td>" .'Employee Name'."</td>";
                    echo "<td>" .'Employee Address'."</td>";
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    $sql3 = "SELECT Login_username, Login_password FROM employeedatabaseaccess WHERE Employee_Employee_id = '$e_id'";
                    $result3 = mysqli_query($mysqli,$sql3);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee Username'."</td>";
                    echo "<td>" .'Employee Password'."</td>";
                    while($row = mysqli_fetch_assoc($result3)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
*/


$E_id = $_POST['Employee_id'];
$E_name = $_POST['E_name'];

        if(!empty($E_id) || !empty($E_name)){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
                    $sql2 = "SELECT Employee_id, Name, Date, Address, Departments_Department_number, project_project_id FROM employee WHERE Employee_id = '$E_id' OR Name = '$E_Name'";
                    $result2 = mysqli_query($mysqli,$sql2);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee ID'."</td>";
                    echo "<td>" .'Employee Name'."</td>";
                    echo "<td>" .'Employee DOB'."</td>";
                    echo "<td>" .'Employee E-Mail'."</td>";
                    echo "<td>" .'Department Number'."</td>";
                    echo "<td>" .'Project ID'."</td>";
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
    } 
    
    
?>

<html>
<head>
<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
    }
    .container1 {
        display: flex;
        align-items: right;
        justify-content: right;
        height: 20px;
    }
    .container2{
        display: flex;
        align-items: left;
        justify-content: left;
        height: 20px;
    }
    .button{
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size:16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button1 {background-color: #000000;} /*Should be white*/
    .top{
        display: table-row;
        height: 300px;
    }
    .bottom{
        display: table-row;
        height:100%;
    }
    .wrapper{
        display: table;
        height: 100%;
        width: 100%;
    }
</style>






<title>Project Management System</title>

<div class="wrapper">
    <div class="top">
        <form action="employee_modify.php" method="POST">
            <div class="container">
                <p>Enter boxes below to find and reference the employee information<br></p>
            </div>
            <div class="container">
                <p>Employee_id: <input type="text" name="Employee_id"></p>
                <p>Name: <input type="text" name="E_name"><br></p>
            </div>
            <div class="container">
                <input type="Submit">
            </div>
        </form>
    </div>
    <div class="bottom">
        <p> Employee Modify Form <br><br></p>
        <form action="employee_modify_query.php" method="POST">
            <div class="container">
                <p>Employee id: <input type="text" name="E_id"</p>
                <p>Employee name: <input type="text" name="E_name"></p>
            </div>
            <div class="container">
                <p>Employee Project number: <input type="text" name="E_project"</p>                
                <p>Employee DOB: <input type="date" name="E_date"></p>
            </div>
            <div class="container">
                <p>Employee E-Mail: <input type="text" name="E_address"></p>
                <p>Employee Department number: <input type="text" name="E_department"></p>
            </div>
            <div class="container">
                <p>Edit Login Role (admin/manager/employee): <input type="text" name="L_Name"></p>
                <p>Must type login role exactly or you can't login!</p>
            </div>
            <div class="container">
                <input type="Submit">
            </div>
        </form>
    </div>
</div>
</head>
</html>
