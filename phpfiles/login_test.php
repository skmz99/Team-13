<?php 

// database access stuff ...
$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$host = "localhost:$port";
$username = "azure";
include login.php;
$password = "6#vWHD_$";
$db_name = "localdb";

//Initializes MySQLi
$mysqli = new mysqli($host,$username,$password,$db_name);

if($mysqli->connect_errno){
    echo"Failed to connect to MySQL: ". $mysqli->connect_error;
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

// session initilize 
session_start();

//variables from form

$name = $_POST['name']; // username
$ID =  $_POST['ID']; // password

// query name in employeedatabaseaccess table.
$query = $mysqli->prepare("SELECT * FROM employeedatabaseaccess WHERE Login_username:=name"); 

$query->bindParam("Login_username", $name, PDO::PARAM_STR);


$query->execute();

// assoc columns in the table access
$result = $query->fetch(PDO::FETCH_ASSOC); 

//validate the credential name and id
if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($ID, $result['Login_password'])) {
                $_SESSION['user_id'] = $result['Login_id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }

//need to header pages for access of diffrent users


} // end of request method




?>