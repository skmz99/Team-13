
<!DOCTYPE html>

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


$sql = "SELECT * FROM company";

$result = mysqli_query($mysqli,$sql);
echo "<br>";
echo "<table border='1'>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($row as $field => $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}
echo "</table>";



?>

<html>
<head>
<style>
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
</style>
<title>Project Management System Contact</title>
<link rel="stylesheet" href="Style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

</head>
<body>
<div class="menu-bar">
<ul>
<li><a href="index.php"><button class="button button1">Home</button></a></li>
<li><a href="Department.php"><button class="button button1">Departments</button></a></li>
<li><a href="Projects.php"><button class="button button1">Projects</button></a></li>
<li><a href="Project_status.php"><button class="button button1">Project Status</button></a></li>
<li><a href="About.php"><button class="button button1">About us</button></a></li>
<li><a href="Contact.php"><button class="button button1">Contact</button></a></li>
<li><a href="login1.php"><button class = "button button1">Login</button></a></li>

</ul>
</div>
</body>
</html>
