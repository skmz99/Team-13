
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
        <a href="Admin_report.php">Report</a>
        <a href="Admin_employee_report.php">Employee's</a>
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
            <form action="Admin_employee_report.php" method="POST">
            Date Begin:<input type="text" name="b">
            Date End:<input type="text" name="e">
            Enter Name: <input type="text" name="n">
            Enter Project Id: <input type="text" name="p">
            <input type="Submit">
            </form>
        </div>
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
                    
                    $s = $_POST['b'];
                    $start = new DateTime($s);
                    $e = $_POST['e'];
                    $end = new DateTime($e);
                    $name = $_POST['n'];
                    $p_id = $_POST['p'];
                    if(!empty($_POST['b']) && !empty($_POST['e']) && empty($name) && empty($p_id)){
                        $sql = "SELECT Employee_name,Clock_in,Clock_out,Total_hours,Project_id FROM history_work";
                        $result = mysqli_query($mysqli,$sql);
                        
                        echo "<br>";
                        echo "<table border='1'>";
                        echo "<td>" .'Employee_name'."</td>";
                        echo "<td>" .'Clock_in'. "</td>";
                        echo "<td>" .'Clock_out'. "</td>";
                        echo "<td>" .'Total_hours'."</td>";
                        echo "<td>" .'Project_id'."</td>";
                        while($row = $result->fetch_assoc()){
                            $yeah = $row['Clock_in'];
                            $hour = new DateTime($yeah);
                            if($hour > $start && $hour < $end){
                                echo "<tr>";
                                echo "<td>".$row['Employee_name']."</td>";
                                echo "<td>".$row['Clock_in']."</td>";
                                echo "<td>".$row['Clock_out']."</td>";
                                echo "<td>".$row['Total_hours']."</td>";
                                echo "<td>".$row['Project_id']."</td>";
                                echo "</tr>";
                            }
                        }
                        echo "</table>";
                    }
                    else if(!empty($_POST['b']) && !empty($_POST['e']) && !empty($_POST['n']) && empty($p_id)){
                        $sql = "SELECT Employee_name,Clock_in,Clock_out,Total_hours,Project_id FROM history_work";
                        $result = mysqli_query($mysqli,$sql);
                        
                        echo "<br>";
                        echo "<table border='1'>";
                        echo "<td>" .'Employee_name'."</td>";
                        echo "<td>" .'Clock_in'. "</td>";
                        echo "<td>" .'Clock_out'. "</td>";
                        echo "<td>" .'Total_hours'."</td>";
                        echo "<td>" .'Project_id'."</td>";
                        while($row = $result->fetch_assoc()){
                            $yeah = $row['Clock_in'];
                            $hour = new DateTime($yeah);
                            if($hour > $start && $hour < $end && $row['Employee_name'] === $name){
                                echo "<tr>";
                                echo "<td>".$row['Employee_name']."</td>";
                                echo "<td>".$row['Clock_in']."</td>";
                                echo "<td>".$row['Clock_out']."</td>";
                                echo "<td>".$row['Total_hours']."</td>";
                                echo "<td>".$row['Project_id']."</td>";
                                echo "</tr>";
                            }
                        }
                        echo "</table>";
                    }
                    else if(!empty($_POST['b']) && !empty($_POST['e']) && empty($_POST['n']) && !empty($p_id)){
                        $sql = "SELECT Employee_name,Clock_in,Clock_out,Total_hours,Project_id FROM history_work WHERE Project_id = '$p_id'";
                        $result = mysqli_query($mysqli,$sql);
                        echo "<br>";
                        echo "<table border='1'>";
                        echo "<td>" .'Employee_name'."</td>";
                        echo "<td>" .'Clock_in'. "</td>";
                        echo "<td>" .'Clock_out'. "</td>";
                        echo "<td>" .'Total_hours'."</td>";
                        echo "<td>" .'Project_id'."</td>";
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                                echo "<td>".$row['Employee_name']."</td>";
                                echo "<td>".$row['Clock_in']."</td>";
                                echo "<td>".$row['Clock_out']."</td>";
                                echo "<td>".$row['Total_hours']."</td>";
                                echo "<td>".$row['Project_id']."</td>";
                                echo "</tr>"; 
                        }
                        echo "</table>";
                        
                    }
                    else if(!empty($_POST['b']) && !empty($_POST['e']) && !empty($_POST['n']) && !empty($p_id)){
                        $sql = "SELECT Employee_name, Clock_in, Clock_out, Total_hours, Project_id, FROM history_work WHERE Employee_name = '$name' AND Project_id = '$p_id'";
                        $result = mysqli_query($mysqli,$sql);
                        echo "<br>";
                        echo "<table border='1'>";
                        echo "<td>" .'Employee_name'."</td>";
                        echo "<td>" .'Clock_in'. "</td>";
                        echo "<td>" .'Clock_out'. "</td>";
                        echo "<td>" .'Total_hours'."</td>";
                        echo "<td>" .'Project_id'."</td>";
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                                echo "<td>".$row['Employee_name']."</td>";
                                echo "<td>".$row['Clock_in']."</td>";
                                echo "<td>".$row['Clock_out']."</td>";
                                echo "<td>".$row['Total_hours']."</td>";
                                echo "<td>".$row['Project_id']."</td>";
                                echo "</tr>"; 
                        }
                        echo "</table>";
                    }
                ?>
            </div>
        </div>
</div>
</html>
