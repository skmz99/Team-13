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
 
    $Department_id = $_POST['id']; // departments connection
    $Status = $_POST['status']; //project connectoin 
    //employee variables pay for roles
    $Login_role = $_POST['Login_role']; // employeesdatabaseaccessconnection name
    $Employee_id = $_POST['Employee_id'];
    
    
    
    if(empty($Employee_id) || $Login_role == "ALL"){
        if($StatusRole === 'ALL'){
            $sqe = "SELECT d.Employee_id IFNULL(SUM(p.Sex) ";
            echo "$sqe";
            $resul1 = mysqli_query($mysqli, $sqe);
            
            while($row = mysqli_fetch_assoc($resul1)){
                
                
                
                
            }
            
            
        }
        
        
        
        
        
        
        
    }
    
    
    
    
    
    if(empty($Department_id) || $Department_id === "ALL"){
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
    }
?>