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
 
    
    /*$sql = "SELECT p.Project_id,Round(SUM(e.Total_hours),2) AS Total_hours FROM project AS p LEFT JOIN employee AS e ON p.Project_id = e.project_project_id GROUP BY p.Project_id";
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
        
    }*/
    /*$sql = "SELECT Name, Clock_in, Clock_out, Total_hours, Status, project_project_id FROM employee";
    $result = mysqli_query($mysqli,$sql);
    while($row = $result->fetch_assoc()){
        echo $row['Name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['Status']." ".$row['project_project_id'];
        $name = $row['Name'];
        $c_in = $row['Clock_in'];
        $c_out = $row['Clock_out'];
        $t_hours = $row['Total_hours'];
        $status = $row['Status'];
        $p_id = $row['project_project_id'];
        $sq = "INSERT INTO history_work(Employee_name,Clock_in,Clock_out,Total_hours,Project_id) VALUES('$name','$c_in','$c_out','$t_hours','$p_id')";
        if(mysqli_query($mysqli,$sq) === FALSE){
            echo $mysqli->error;
        }
    }*/
   /* $s = $_POST['b'];
    $start = new DateTime($s);
    $e = $_POST['e'];
    $end = new DateTime($e);
    $name = $_POST['n'];
    $p_id = $_POST['p'];
    if(!empty($_POST['b']) && !empty($_POST['e']) && empty($name) && empty($p_id)){
        $sql = "SELECT Employee_name,Clock_in,Clock_out,Total_hours,Project_id FROM history_work";
        $result = mysqli_query($mysqli,$sql);
        while($row = $result->fetch_assoc()){
            $yeah = $row['Clock_in'];
            $hour = new DateTime($yeah);
            if($hour > $start && $hour < $end){
            echo $row['Employee_name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['project_project_id'];
            echo "<br>";
            }
        }
    }
    else if(!empty($_POST['b']) && !empty($_POST['e']) && !empty($_POST['n']) && empty($p_id)){
        $sql = "SELECT Employee_name,Clock_in,Clock_out,Total_hours,Project_id FROM history_work";
        $result = mysqli_query($mysqli,$sql);
        while($row = $result->fetch_assoc()){
            $yeah = $row['Clock_in'];
            $hour = new DateTime($yeah);
            if($hour > $start && $hour < $end && $row['Employee_name'] === $name){
            echo $row['Employee_name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['Project_id'];
            echo "<br>";
            }
        }
    }
    else if(!empty($_POST['b']) && !empty($_POST['e']) && empty($_POST['n']) && !empty($p_id)){
        $sql = "SELECT Employee_name, Clock_in, Clock_out, Total_hours, Project_id FROM history_work WHERE Project_id = '$p_id'";
        $result = mysqli_query($mysqli,$sql);
        while($row = $result->fetch_assoc()){
            echo $row['Employee_name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['Project_id'];
            echo "<br>";
        }
    }
    else if(!empty($_POST['b']) && !empty($_POST['e']) && !empty($_POST['n']) && !empty($p_id)){
        $sql = "SELECT Employee_name, Clock_in, Clock_out, Total_hours, Project_id FROM history_work WHERE Employee_name = '$name' AND Project_id = '$p_id'";
        $result = mysqli_query($mysqli,$sql);
        while($row = $result->fetch_assoc()){
            echo $row['Employee_name']." ".$row['Clock_in']." ".$row['Clock_out']." ".$row['Total_hours']." ".$row['Project_id'];
            echo "<br>";
        }
        
    }*/
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