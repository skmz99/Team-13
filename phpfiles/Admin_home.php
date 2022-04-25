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


<html>
<head>
<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
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
    
 /* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 210px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
} 
</style>

    




<title>Project Management System</title>

<div class="sidenav">
    <a href="Admin_home.php">Home</a>
    <a href="Admin_Log.php">Log</a>
    <a href="Admin_list.php">LISTS</a>
    <a href="Admin_Add.php">ADD</a>
    <a href="Admin_Delete.php">DELETE</a>
    <a href="Admin_Modify.php">MODIFY</a>
    <button class="dropdown-btn">Reports
    <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="Admin_Cost.php">Cost</a>
        <a href="Admin_report.php">Project Hours</a>
        <a href="Admin_Search.php">Employees</a>
    </div>
    <a href="logout1.php">LOGOUT</a>
</div>
<div class="main">
    <p>Admin Home Page<br></p>
</div>
<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for(i = 0 ; i < dropdown.length; i++){
        dropdown[i].addEventListener("click",function(){
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if(dropdownContent.style.display === "block"){
                dropdownContent.style.display = "none";
            }else{
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
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
                $username10 = $_SESSION['Login_username'];
                $sql10 = "SELECT Employee_Employee_id from employeedatabaseaccess WHERE Login_username = '$username10'";
                $result10 = mysqli_query($mysqli,$sql10);
                $data10 = mysqli_fetch_assoc($result10);
                $_SESSION['employee_id'] = $data10['Employee_Employee_id'];
                $e_id10 = $_SESSION['employee_id']; 
                $sql30 = "SELECT Status FROM employee WHERE Employee_id = '$e_id10'";
                $resul20 = mysqli_query($mysqli,$sql30);
                $data30 = mysqli_fetch_assoc($resul20);
                $hours0 = $data30['Status'];
                echo 'Welcome, ';
                echo $_SESSION['employee_name'];
                echo ". You are currently ";
                echo $hours0;
            ?>
            <form action="Admin_home.php" method="POST">
                <label for="clock">Enter your work status:</label>
                <select id="clock" name="clock">
                    <option value="Clock in">Clock In</option>
                    <option value="Clock out">Clock out</option>
                </select>
                <input type="Submit">
            </form>
        </div>
    </div>
</div>
</head>
</html>

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

    $sql = "SELECT COUNT(*) AS total FROM log";
    $result = mysqli_query($mysqli,$sql);
    $data = mysqli_fetch_assoc($result);
    $output = $data['total']; //output will be our notification count 
    $employee_role = mysqli_fetch_assoc($result);
    $_SESSION['role'] = $employee_role['Login_role'];
    
    
    $username = $_SESSION['Login_username'];
    $sql = "SELECT Employee_Employee_id from employeedatabaseaccess WHERE Login_username = '$username'";
    $result = mysqli_query($mysqli,$sql);
    $data = mysqli_fetch_assoc($result);
    $_SESSION['employee_id'] = $data['Employee_Employee_id'];
    $e_id = $_SESSION['employee_id']; 
    
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
        
        $sql20 = "SELECT project_project_id FROM employee WHERE Employee_id = '$e_id'";
        $result20 = mysqli_query($mysqli,$sql20);
        $data20 = mysqli_fetch_assoc($result20);
        $p_id = $data20['project_project_id'];
        
        $sql21 = "SELECT Hours FROM project WHERE Project_id = '$p_id'";
        $result21 = mysqli_query($mysqli,$sql21);
        $data21 = mysqli_fetch_assoc($result21);
        $phours = $data21['Hours'];
        
        $Total_Hours = $phours + $hours;
        $sql21 = "UPDATE project SET Hours = '$Total_Hours' WHERE Project_id = '$p_id'";
        mysqli_query($mysqli,$sql21);
    }

    /*
    echo $_SESSION['Login_username'];
        $username = $_SESSION['Login_username'];
        $sql = "SELECT Employee_Employee_id FROM employeedatabaseaccess WHERE Login_username = '$username' ";
        $result = mysqli_query($mysqli,$sql);
        $employee_id = mysqli_fetch_assoc($result);
        $_SESSION['employee_id'] = $employee_id['Employee_Employee_id'];
        echo ' this is the employee id';
        echo $_SESSION['employee_id'];
        */
        
    $sql2 = "SELECT Name FROM employee WHERE employee_id = '$e_id' ";
    $result2 = mysqli_query($mysqli,$sql2);
    $printname = mysqli_fetch_assoc($result2);
    $_SESSION['employee_name'] = $printname['Name'];
    
    echo 'Welcome, ';
    echo $_SESSION['employee_name'];
    if($output > 0){ //if output is greater than 0 create popup. after pressing OK output is given 0 to dismiss the popup
        echo "<script> alert('There are $output new messages. Please head into log and address the issue.');window</script>";
        $output = 0;
    }
        //<a href="Admin_List.php">LIST</a>
        //echo $_SESSION['Login_role'];
    $day_name = date("l");
    $time = date("h");
    $time = $time - 5;
    if($day_name === 'Sunday' && $time === 23){
        
        $sql8 = "SELECT Name, Clock_in, Clock_out, Total_hours, Status, project_project_id FROM employee";
        $resultt = mysqli_query($mysqli,$sql8);
        while($row = $resultt->fetch_assoc()){
        echo $row['Name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['Status']." ".$row['project_project_id'];
        echo "<br>";
        $name = $row['Name'];
        $c_in = $row['Clock_in'];
        $c_out = $row['Clock_out'];
        $t_hours = $row['Total_hours'];
        $status = $row['Status'];
        $p_id = $row['project_project_id'];
        $sq5 = "INSERT INTO history_work(Employee_name,Clock_in,Clock_out,Total_hours,Project_id) VALUES('$name','$c_in','$c_out','$t_hours','$p_id')";
        if(mysqli_query($mysqli,$sq5) === FALSE){
            echo $mysqli->error;
        }
    }
        
        
        $sql = "SELECT p.Project_id,Round(SUM(e.Total_hours),2) AS Total_hours FROM project AS p LEFT JOIN employee AS e ON p.Project_id = e.project_project_id GROUP BY p.Project_id";
        $result = mysqli_query($mysqli,$sql);
        while($row = $result -> fetch_assoc()){
        
        echo $row['Project_id']." ".$row['Total_hours'];
        echo "<br>";
        $p_id = $row['Project_id'];
        $t_hours = $row['Total_hours'];
        $sq = "SELECT Hours FROM projects WHERE Project_id = '$p_id'";
        $re = mysqli_query($mysqli,$sq);
        $data = mysqli_fetch_assoc($re);
        $hours = $data['Hours'];
        $totalhours = $hours + $t_hours;
        $s = "UPDATE project SET Hours = '$totalhours' WHERE Project_id = '$p_id'";
        mysqli_query($mysqli,$s);
        }
        $sql = "UPDATE employee SET Total_hours = '0'";
        mysqli_query($mysqli,$sql);
        
        
        
    }
    
?>
