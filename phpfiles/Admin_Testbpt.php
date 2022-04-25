
<html>
<head>
<style>
     .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
        margin-left: 160px; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
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
        height:50%;
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

    




<title>Project Management System</title>

<div class="sidenav">
    <a href="Admin_home.php">Home</a>
    <a href="Admin_Log.php">Log</a>
    <a href="Admin_Add.php">ADD</a>
    <a href="Admin_Delete.php">DELETE</a>
    <a href="Admin_Modify.php">MODIFY</a>
    <a href="Admin_Cost.php">DEPARTMENT COST</a>
    <a href="index.php">LOGOUT</a>
</div>
<div class="main">
    <p>Admin Department Cost Page<br></p>
</div>
<div class="container">
    <p>Total Cost Of Each Department Below:<br><br></p>
</div>

</head>

<div class="wrapper">
    <div class="container">
        
    <div class="top">
        
    
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
    $all = $_POST['c'];
    
    if($all === 'YES'){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
        $all = '';
    $sql2 = "SELECT d.HR,p.Project_name,SUM(p.Cost) AS Total FROM departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number GROUP BY d.Department_number,p.Departments_Department_number ";
        $result2 = mysqli_query($mysqli,$sql2);

        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'HR'."</td>";
        echo "<td>" .'Project_name'. "</td>";
        echo "<td>" .'Total_Cost'. "</td>";
        while($row = mysqli_fetch_assoc($result2)){
            echo "<tr>";
            foreach($row as $field => $value){
            echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    
        }
        else{
            echo "";
            echo "No important task to be done.";
        }
    
    
?>
</div>
    </div>
    <div class="bottom">
        <form action="Admin_Testbpt.php" method="POST">
            <div class="container">
                Type 'YES' to show all departments project cost: <input type="text" name="c">
                <input type="Submit" value="Send">
            </div>
        </form>
<!--        <form action="Admin_Cost.php" method="POST">
            <div class="container">
                <p>Message id: <input type="text" name="id"></p>
            </div>
            <div class="container">
                <p>Enter 'ALL' to delete every message: <input type="text" name="all"></p>
                <input type="Submit">
            </div>
        </form>-->
    </div>
</div>
</html>