
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
        font-size: 16px; /* Increased text to enable scrolling */
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
        background-color: transparent;
        outline: none;
    }
    .button1 {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: #000000;
        
    }
    .button0{
        border: none;
        color: white;
        padding: 32px 57px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size:16px;
        margin: 4px 2px;
        cursor: pointer;
        background-color: transparent;
        outline: none;
    }
   .button2{background-color: #90EE90;} /*Should be light green */
   .button3{background-color: #FFCCCB;} /*Should be light red */
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
        EMPLOYEE
    </div>
<ul>
<li><a href="homePage1.php"><button class="button button1">Home</button></a></li>
<li><a href="Department.php"><button class="button button1">Departments</button></a></li>
<li><a href="Projects.php"><button class="button button1">Projects</button></a></li>
<li><a href="self_information.php"><button class="button button1">Self Information</button></a></li>
<li><a href="logout1.php"><button class = "button button1">Logout</button></a></li>
</ul>
</div>
</body>


<div class="wrapper">
    <div class="top">
        <?php
        
            if($_POST['clock'] === 'Clock in'){
                echo '<script type="text/javascript">
       window.onload = function () { alert("Successfully Clocked in"); } 
</script>';
            }
            else if($_POST['clock'] === 'Clock out'){
                             echo '<script type="text/javascript">
       window.onload = function () { alert("Successfully Clocked out"); } 
</script>';
            }
            
          
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
            $username10 = $_SESSION['Login_username'];
            $sql10 = "SELECT Employee_Employee_id from employeedatabaseaccess WHERE Login_username = '$username10'";
            $result10 = mysqli_query($mysqli,$sql10);
            $data10 = mysqli_fetch_assoc($result10);
            $_SESSION['employee_id'] = $data10['Employee_Employee_id'];
            $e_id10 = $_SESSION['employee_id']; 
            $sql30 = "SELECT Status FROM employee WHERE Employee_id = '$e_id10'";
            $resul20 = mysqli_query($mysqli,$sql30);
            $data20 = mysqli_fetch_assoc($resul20);
            $hours0 = $data20['Status'];
            echo "You are currently ";
            echo $hours0;
        ?>
        <form action="Projects.php" method="POST">
            <div class="container">
                <!-- Added some actions for the employee -->
                <p>Submit to Clock in/out: <select type="text" name="clock">  <!--testing here-->
                <option value='Clock in'>Clock in</option>
                <option value='Clock out'>Clock out</option>
                </select></p> 
                <input type="Submit">
                </form>
            </div>
        </form>
    </div>
</div>
<div class ="container">
    <p>Listed below is the Project you are assigned to</p>
</div>
    <div class="container">
        
        <div class="bottom">
    
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
    session_start();
    $username = $_SESSION['Login_username'];
    $sql = "SELECT Employee_Employee_id from employeedatabaseaccess WHERE Login_username = '$username'";
    $result = mysqli_query($mysqli,$sql);
    $data = mysqli_fetch_assoc($result);
    $_SESSION['employee_id'] = $data['Employee_Employee_id'];
    $e_id = $_SESSION['employee_id']; 
    
    
    
    $Clock_in = $_POST['clock'];
    $Clock_out = $_POST['clock'];
    if($Clock_in === 'Clock in'){
        $sql = "UPDATE employee SET Clock_in = current_timestamp() WHERE Employee_id = '$e_id'";
        
        if(mysqli_query($mysqli,$sql) === FALSE){
            echo $mysqli->error;
            exit();
        }
        $sql1 = "UPDATE employee SET Status = 'Clocked in' WHERE Employee_id = '$e_id'";
        mysqli_query($mysqli,$sql1);
        $sql7 = "UPDATE employee SET Clock_in = Clock_in - INTERVAL 5 HOUR WHERE Employee_id = '$e_id'";
        mysqli_query($mysqli,$sql7);
    }
    
    if($Clock_out === 'Clock out'){
        $sq2 = "UPDATE employee SET Clock_out = current_timestamp() WHERE Employee_id = '$e_id'";
        if(mysqli_query($mysqli,$sq2) === FALSE){
            echo $mysqli->error;
            exit();
        }
        $sql6 = "UPDATE employee SET Clock_out = Clock_out - INTERVAL 5 HOUR WHERE Employee_id = '$e_id'";
        mysqli_query($mysqli,$sql6);
        $sql3 = "SELECT time_to_sec(TIMEDIFF(Clock_out,Clock_in))/3600 AS diff FROM employee WHERE Employee_id = '$e_id'";
        $resul2 = mysqli_query($mysqli,$sql3);
        $data2 = mysqli_fetch_assoc($resul2);
        $hours = $data2['diff'];
        $sql4 = "SELECT Total_hours FROM employee WHERE Employee_id = '$e_id'";
        $result4 = mysqli_query($mysqli,$sql4);
        $data3 = mysqli_fetch_assoc($result4);
        $total_hours = $data3['Total_hours'];
        $All_Hours = $total_hours + $hours;
        $sql5 = "UPDATE employee SET Total_hours = '$All_Hours' WHERE Employee_id = '$e_id'";
        mysqli_query($mysqli,$sql5);
        $sql11 = "UPDATE employee SET Status = 'Clocked out' WHERE Employee_id = '$e_id'";
        mysqli_query($mysqli,$sql11);
    }
    

    $employee_id = $_SESSION['employee_id'];
    $sq = "SELECT project_project_id FROM employee WHERE Employee_id = '$employee_id'";
    $resul = mysqli_query($mysqli,$sq);
    $data = mysqli_fetch_assoc($resul);
    

    $Project_ID = $data['project_project_id'];
    //$Department_number = $_POST['id'];
    
    if(!empty($Project_ID)){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
        //$sql = "SELECT * FROM project WHERE Departments_Department_number = '$Department_number'";
        $sql = "SELECT Project_id, Project_name, Status_of_project, Departments_Department_number FROM project WHERE project_id = '$Project_ID'";
        $result2 = $mysqli->query($sql);
        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'Project ID'."</td>";
        echo "<td>" .'Project Name'. "</td>";
        //echo "<td>" .'Hours'. "</td>";
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
