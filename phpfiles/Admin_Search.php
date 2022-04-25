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
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #000000;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  background-color: #BBB8B6;
}
.sidenav a:hover, .dropdown-btn:hover {
  color: #000000;
}


.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #000000;
  display: block;
}
.active {
  background-color: green;
  color: white;
}

.dropdown-container {
  display: none;
  background-color: #BBB8B6;
  padding-left: 8px;
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
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
        <a href="Admin_search.php">Employees</a>
    </div>
    <a href="logout1.php">LOGOUT</a>
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
<div class="main">
    <p>Admin Departments/Projects<br></p>
</div>
<div class="container">
    
</div>

</head>

<div class="wrapper">
    <div class="container">
        
    <div class="top">
        
        <form action="Admin_Search.php" method="POST">
            <div class="container">
                Department ID: <input type="text" name="department">
                Project ID: <input type="text" name="project">
            </div>
            <div class="container">
                <input type="Submit" value="Generate Report">
            </div>
            <!-- Thinking of adding more text boxes -->
        </form>
    
</div>
    </div>
    <div class="bottom">
        <div class="Container">
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
 
    $Department = $_POST['department'];
    $Project = $_POST['project'];
    if(!empty($Department) && !empty($Project))
    {
        
    }
     
     else if(!empty($Department) && empty($Project))
    {
        $sql2 = "SELECT Employee_id,Name,Date,Total_hours,Address,Departments_Department_number,project_project_id FROM employee WHERE Departments_Department_number = $Department";
        $result2 = mysqli_query($mysqli,$sql2);
        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'Employee ID'."</td>";
        echo "<td>" .'Name'. "</td>";
        echo "<td>" .'DOB'. "</td>";
        echo "<td>" .'Hours'."</td>";
        echo "<td>" .'E-Mail'. "</td>";
        echo "<td>" .'Department Number'. "</td>";
        echo "<td>" .'Project ID'. "</td>";
        while($row = mysqli_fetch_assoc($result2)){
            echo "<tr>";
            foreach($row as $field => $value){
            echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else if(empty($Department) && !empty($Project))
    {
        $sql3 = "SELECT Employee_id,Name,Date,Total_hours,Address,Departments_Department_number,project_project_id FROM employee WHERE project_project_id = $Project";
        $result3 = mysqli_query($mysqli,$sql3);
        echo "<br>";
        echo "<table border='1'>";
        echo "<td>" .'Employee ID'."</td>";
        echo "<td>" .'Name'. "</td>";
        echo "<td>" .'DOB'. "</td>";
        echo "<td>" .'Hours'."</td>";
        echo "<td>" .'E-Mail'. "</td>";
        echo "<td>" .'Department Number'. "</td>";
        echo "<td>" .'Project ID'. "</td>";
        while($row = mysqli_fetch_assoc($result3)){
            echo "<tr>";
            foreach($row as $field => $value){
            echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>
</div>
    </div>
</div>
</html>