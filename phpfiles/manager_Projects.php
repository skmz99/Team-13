<?php
    session_start();
        if($_SESSION['Login_role'] == 'manager')
        {
        }
        else if($_SESSION['Login_role'] == 'employee')
        {
            header("Location:https://team13web.azurewebsites.net/homepage1.php");
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
        font-size:40px;
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
<title>Project Management System Projects</title>
<!--<link rel="stylesheet" href="Style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
-->
</head>
<body>
<div class="menu-bar">
    <div class="container2">
        MANAGER
    </div>
<ul>
<li><a href="homePage2.php"><button class="button button1">Home</button></a></li>
<li><a href="manager_Departments.php"><button class="button button1">Departments</button></a></li>
<li><a href="manager_Projects.php"><button class="button button1">Projects</button></a></li>
<li><a href="manager_self_information.php"><button class="button button1">Self Information</button></a></li>
<li><a href="logout1.php"><button class = "button button1">Logout</button></a></li>

</ul>
</div>
</body>


<div class="wrapper">
    <div class="top">
        <form action="manager_projects_delete.php" method="POST">
            <div class="container">
                <p>Enter Project ID To Delete: <input type="text" name="id"></p>
                <p><input type="Submit" value="Delete Id"></p>
            </div>
        </form>
            <div class="container">
                <p>Below will be used to modify the Project table:<br></p>
            </div>
        <form action="manager_projects_modify.php" method="POST">
            <div class="container">
                <p>Project ID: <input type="text" name="p_id"></p>
            </div>
            <div class="container">
                <p>Project Name: <input type="text" name="p_name"></p>
                <p>Project Status: <select type="text" name="p_status">  <!--testing here-->
                <option value='Ongoing'>Ongoing</option>
                <option value='Completed'>Completed</option>
                </select></p> 
            </div>
            </div>
            <div class="container">
                <p><input type="Submit" value="Submit Changes"></p>
            </div>
            <div class="container">
                <p>Below shows the listed Projects in your Department<br></p>
            </div>
        </form>
    </div>
</div>

    <div class="container">
        
        <div class="bottom">
    
<?php
include 'db.inc.php';
session_start();
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
    $employee_id = $_SESSION['employee_id'];
    $sq = "SELECT Departments_Department_number FROM employee WHERE Employee_id = '$employee_id'";
    $resul = mysqli_query($mysqli,$sq);
    $data = mysqli_fetch_assoc($resul);
    

    $Department_number = $data['Departments_Department_number'];
    
    if(!empty($Department_number)){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
        $sql = "SELECT * FROM project WHERE Departments_Department_number = '$Department_number'";
        $result2 = $mysqli->query($sql);
        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'Project ID'."</td>";
        echo "<td>" .'Project Name'. "</td>";
        echo "<td>" .'Hours'. "</td>";
        //echo "<td>" .'Cost'. "</td>";
        echo "<td>" .'Project Status'. "</td>";
        echo "<td>" .'Department Number'. "</td>";
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
            echo "Please enter your Department Number to reference the projects in your department";
        }
    
    
?>
        </div>
    </div>
</html>
