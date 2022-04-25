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
$d_number = $_POST['d_number'];
$HR = $_POST['hr'];
    /*$sql = "SELECT * FROM project WHERE Project_id = '$P_id' AND Project_name = '$P_name'";
    $result = mysqli_query($mysqli,$sql);*/
    
    if(!empty($d_number) && !empty($HR)){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
        $sql = "SELECT * FROM departments WHERE Department_number = '$d_number' AND HR = '$HR'";
        $result = mysqli_query($mysqli,$sql);

        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'Department_number'."</td>";
        echo "<td>" .'HR'. "</td>";
        echo "<td>" .'Accounting'. "</td>";
        echo "<td>" .'FrontEnd_Developers'. "</td>";
        echo "<td>" .'BackEnd_Developers'. "</td>";
        echo "<td>" .'Company_Company_id'. "</td>";
        while($row = mysqli_fetch_assoc($result)){
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
        <form action="department_modify.php" method="POST">
            <div class="container">
                <p>Enter boxes below to find and reference the emlpoyee information<br></p>
            </div>
            <div class="container">
                <p>Department Number: <input type="text" name="d_number"></p>
                <p>HR name: <input type="text" name="hr"><br></p>
            </div>
            <div class="container">
                <input type="Submit">
            </div>
        </form>
    </div>
    <div class="bottom">
        <p> Department Modify Form <br><br></p>
        <form action="department_modify_query.php" method="POST">
            <div class="container">
                <p>Department Number: <input type="text" name="d_number"</p>
                <p>HR: <input type="text" name="hr"></p>
            </div>
            <div class="container">                
                <p> Accounting: <input type="text" name="accounting"></p>
                <p> Front End Developers: <input type="text" name="FED"></p>
            </div>
            <div class="container">
                <p> Back End Developers: <input type="text" name="BED"></p>
                <p> Company Number: <input type="text" name="C_number"></p>
            </div>
            <div class="container">
                <input type="Submit">
            </div>
        </form>
    </div>
</div>
</head>
</html>

