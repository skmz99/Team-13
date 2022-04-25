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

$name = $_POST['Cname'];
echo $name;
if(!empty($name)){
    $sql = "SELECT * FROM $name";
    $result = mysqli_query($mysqli,$sql);
echo "<br>";
echo "<table border='1'>";
echo "<tr><td>Table name</td><td>Fields name</td></tr>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as $field => $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}
echo "</table>";
}else{
    echo "All field are required";
    die();
}

?>