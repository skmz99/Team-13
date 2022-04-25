<?php


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
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
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
    <form action="session_testing2.php" method="POST">
        project_id: <input type="text" name="p">
        <input type="Submit">
    </form>
</html>