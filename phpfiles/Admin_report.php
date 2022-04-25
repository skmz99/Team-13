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

    $p_id = $_POST['p'];
    if(!empty($_POST['p'])){
        $sql = "SELECT Employee_name, ROUND(SUM(Total_hours),2) AS Total_hours FROM history_work WHERE Project_id = '$p_id' GROUP BY Employee_name";
        $result = mysqli_query($mysqli,$sql);
        $char_data = "";
        while($row = $result->fetch_assoc()){
            $productname[] = $row['Employee_name'];
            $sales[] = $row['Total_hours'];
        }
    }
    else{
        $sql = "SELECT Employee_name,ROUND(SUM(Total_hours),2) AS Total_hours FROM history_work GROUP BY Employee_name";
        $result = mysqli_query($mysqli,$sql);
        $char_data = "";
        while($row= $result->fetch_assoc()){
            $productname[] = $row['Employee_name'];
            $sales[] = $row['Total_hours'];
        }
    }
    
    
    ?>



<!DOCTYPE html>
<html lang="en">
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
        height:100%
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
        <a href="Admin_Search.php">Employees</a>
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
<div class="container1">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Employee Hours </h2>
            <div>Hours </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: 'rgb(000,00,000)',
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
    <form action="Admin_report.php" method="POST">
        project_id: <input type="text" name="p">
        <input type="Submit">
    </form>

    </div>
</html>