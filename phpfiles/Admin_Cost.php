
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
    <a href="index.php">LOGOUT</a>
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
    <p>Admin Department Cost Page<br></p>
</div>
<div class="container">
    
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
 
    $Department_id = $_POST['add'];
    $Project_id = $_POST['add'];
    if($Department_id === 'department')
    {
        $sq = "SELECT d.Department_number, IFNULL(SUM(p.Hours),0), IFNULL(SUM(p.Cost),0) from departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number GROUP By d.Department_number, p.Departments_Department_number ";
            $resul = mysqli_query($mysqli,$sq);
                
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Department Number'."</td>";
            echo "<td>".'Hours'."</td>";
            echo "<td>".'Cost'."</td>";
            while($row = mysqli_fetch_assoc($resul)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
    }
    else if($Project_id = 'project')
    {
        $sql = "SELECT Project_id, Project_name, Status_of_project, Hours, Cost FROM project";
            $result = mysqli_query($mysqli,$sql);
            
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Project Mumber'."</td>";
            echo "<td>".'Project Name'."</td>";
            echo "<td>".'Project Status'."</td>";
            echo "<td>".'Hours'."</td>";
            echo "<td>".'Cost'."</td>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
    }
        /*
        if($Status === 'Both'){//If employee id is empty and user chooses both should show only 3 columns
            $sq = "SELECT d.Department_number, IFNULL(SUM(p.Hours),0), IFNULL(SUM(p.Cost),0) from departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number GROUP By d.Department_number, p.Departments_Department_number ";
            $resul = mysqli_query($mysqli,$sq);
                
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Department_number'."</td>";
            echo "<td>".'Total_Hours'."</td>";
            echo "<td>".'Total_Cost'."</td>";
            while($row = mysqli_fetch_assoc($resul)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else{//shows Completed or Ongoing Projects with total hours and total cost
            $sql = "SELECT d.Department_number,IFNULL(p.Status_of_project,'No Projects'), IFNULL(SUM(p.Hours),0), IFNULL(SUM(p.Cost),0) from departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number AND p.Status_of_project = '$Status' GROUP By d.Department_number, p.Departments_Department_number ";
            $result = mysqli_query($mysqli,$sql);
            
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Department_number'."</td>";
            echo "<td>".'Project_Status'."</td>";
            echo "<td>".'Total_Hours'."</td>";
            echo "<td>".'Total_Cost'."</td>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    else{//department id text box is not empty
        if($Status === 'Both'){//If employee id is empty and user chooses both should show only 3 columns
            $sq = "SELECT d.Department_number, IFNULL(SUM(p.Hours),0) AS Total_Hours, IFNULL(SUM(p.Cost),0) AS Total_Cost from departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number WHERE d.Department_number = '$Department_id' GROUP By d.Department_number ";
            $resul = mysqli_query($mysqli,$sq);
                
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Department_number'."</td>";
            echo "<td>".'Total_Hours'."</td>";
            echo "<td>".'Total_Cost'."</td>";
            while($row = mysqli_fetch_assoc($resul)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else{
            $sql = "SELECT d.Department_number, IFNULL(p.Status_of_project,'No Project'), IFNULL(SUM(p.Hours),0) AS Total_Hours, IFNULL(SUM(p.Cost),0) AS Total_Cost from departments AS d LEFT JOIN project AS p ON d.Department_number = p.Departments_Department_number WHERE d.Department_number = '$Department_id' AND p.Status_of_project = '$Status' GROUP By d.Department_number ";
            $result = mysqli_query($mysqli,$sql);
            
            echo "<br>";
            echo "<table border='1'>";
            echo "<td>".'Department_number'."</td>";
            echo "<td>".'Project_Status'."</td>";
            echo "<td>".'Total_Hours'."</td>";
            echo "<td>".'Total_Cost'."</td>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($row as $field => $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        */
        
?>
</div>
    </div>
    <div class="bottom">
        <form action="Admin_Cost.php" method="POST">
            <div class="container">
                <!-- Added some actions for the employee -->
                <p>Submit to load Cost of Project/Department: <select type="text" name="add">  <!--testing here-->
                <option value='project'>Project</option>
                <option value='department'>Department</option>
                </select></p> 
                <input type="Submit" value = "Generate Report">
                </form>
            </div>
        </form>

            </div>
            <!-- Thinking of adding more text boxes -->
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
