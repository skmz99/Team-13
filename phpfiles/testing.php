

<?php 
use \Datetime;
    $now = new DateTime();
    
    echo $now->format('Y-m-d H:i:s');
    echo $now->getTimestamp();
//require_once  "session1.php"; // session stuff...

// database config access stuff ...
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




session_start();

//variables from form



// query name in employeedatabaseaccess table.
// $sql = mysql_query("SELECT Login_username, Login_password, Login_id FROM employeedatabaseaccess WHERE Login_username = '$name' AND Login_password = $id") 
// $sql = mysql_query("SELECT Login_password from employeedatabaseaccess WHERE Login_username='$name'" );


if(isset($_POST['submit']))
{ // submits
    $name = $_POST['name']; // username
    $ID =  $_POST['ID']; // password
    // $rank = $_POST['rank'];
    $sql = "SELECT Login_password AS total FROM employeedatabaseaccess WHERE Login_username ='$name'";
    $result = mysqli_query($mysqli,$sql);
    $data = mysqli_fetch_assoc($result);
    $output = $data['total'];
    
    echo $output;
            if($ID == $row['Login_password'])
            {
                header("location:Admin_home.php");
                exit();
        
            }else{
                echo "Did not work";
            }





?>

<html>
<head>
<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
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
</style>






<title>Project Management System</title>
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
<li><a href="login.php"><button class = "button button1">Login</button></a></li>

</ul>
</div>
</body>

<body>
<div class="container">
<!--action="CreateUserQuery.php"-->
<form  method="POST">
 

  <label for="Rank">Choose a rank</label>
 
  <select id="name" name="Rank" >
    <option value="employee">employee</option>
    <option value="supervisor">supervisor</option>
  </select>
 
 
  Name: <input type="text" name="name" />


  ID: <input type="text" name="ID" />
  

submit :<input type="submit" value="Submit"/>
    

<p> dont have account </p>

</form> 


<ul>
    <li><a href="#"><button>Login</button></a></li>

    <li><a href="data_entry_employee.php"><button>Create User</button></a></li>
</ul>





</div>
</body>





</html>
