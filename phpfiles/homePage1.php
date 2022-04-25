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

<!DOCTYPE html>
<html>
<head>
<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        margin-left: 160px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }
    .container1 {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        margin-left: 160px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }
    .container2{
        display: flex;
        align-items: left;
        justify-content: left;
        font-size: 45px;
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
        height: 50px;
    }
    .bottom{
        display: table-row;
        height: 10px;
    }
    .wrapper{
        display: table;
        height: 100%;
        width: 100%;
    }
    
.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #BBB8B6;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #000000;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

{
    padding: 0;
    margin: 0;
    box-sizing:border-box;
}
body {
    background-image: url(1687805.jpg);
    background-size: cover;
    background-position: center;

    font-family: sans-serif;
}
.menu-bar {
    background:rgb(0,100,0);
    text-align:center;

}
.menu-bar ul {
    display:inline-flex;
    list-style:none;
    color:#ffffff;
    }
.menu-bar ul li {
    width:120px;
    margin:15px;
    padding:15px;
    }

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<title>Project Management System</title>
<!--<link rel="stylesheet" href="Style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
-->
</head>
<body>
<div class="menu-bar">
    <div class="container2">
        EMPLOYEE
    </div>
<ul>
<li><a href="homePage1.php"><button class="button button1">Home</button></a></li>
<li><a href="Department.php"><button class="button button1">Departments</button></a></li>
<li><a href="Projects.php"><button class="button button1">Projects</button></a></li>
<li><a href="self_information.php"><button class="button button1">Self Information</button></a></li>
<li><a href="logout1.php"><button class ="button button1">Logout</button></a></li>

</ul>
</div>
</body>

<!--<script src="index.js">-->
<div class="wrapper">
        <div class="container">
<?php
                //  include_once 'index.php';
//include_once 'header.php';
    // include 'connect.php';
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
        //echo $_SESSION['Login_username'];
        $username = $_SESSION['Login_username'];
        $sql = "SELECT Employee_Employee_id FROM employeedatabaseaccess WHERE Login_username = '$username' ";
        $result = mysqli_query($mysqli,$sql);
        $employee_id = mysqli_fetch_assoc($result);
        $_SESSION['employee_id'] = $employee_id['Employee_Employee_id'];
        $e_id = $_SESSION['employee_id'];
        /*
                    
                    $sql2 = "SELECT Employee_id, Name, Address FROM employee WHERE Employee_id = '$e_id'";
                    $result2 = mysqli_query($mysqli,$sql2);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee ID'."</td>";
                    echo "<td>" .'Employee Name'."</td>";
                    echo "<td>" .'Employee Address'."</td>";
        */
        $sql2 = "SELECT Name FROM employee WHERE employee_id = '$e_id' ";
        $result2 = mysqli_query($mysqli,$sql2);
        $printname = mysqli_fetch_assoc($result2);
        $_SESSION['employee_name'] = $printname['Name'];
        
        echo 'Welcome, ';
        echo $_SESSION['employee_name']."<br>";
        //echo $_SESSION['employee_name'];
        //echo $_SESSION['employee_name'];
        //echo " your message  '.$name.' end message";
        //echo $_SESSION['Login_username'];
        //echo (Name);
        echo "Please visit the Projects tab to clock in/out";

?>
        </div>
    </div>
</div>
</html>

