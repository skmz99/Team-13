<?php
    session_start();
        if($_SESSION['Login_role'] == 'employee')
        {
        }
        else if($_SESSION['Login_role'] == 'manager')
        {
            header("Location:https://team13web.azurewebsites.net/homepage2.php");
        } else if(isset($_SESSION['Login_role']) == 'admin')
        {
            header("Location:https://team13web.azurewebsites.net/admin_home.php");
        } else if(!isset($_SESSION['Login_username']))
        {
            header("Location:https://team13web.azurewebsites.net/index.php");
        }

?>
<html>
    <head>
        <style>
            .container{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100px;
                margin-left: 160px;
                font-size: 28px;
                padding: 0px 10px;
            }
            .container1{
                display: flex;
                align-items: center;
                height: 200px;
                margin-left: 160px;
                font-size: 28px;
                padding: 0px 10px;
            }
            .container2{
                display: flex;
                align-items: left;
                justify-content: left;
                font-size: 40px;
                height: 20px;
            }
            .button{
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .button1 {background-color: #000000;}
            .top{
                display: table-row;
                height: 50px;
            }
            .bottom{
                display: table-row;
                height: 10px;
            }
            .wrapper{
                display: table;
                height: 100%;
                width: 100%;
            }
            .sidenav{
                height: 100%;
                width: 180px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #BBB8B5;
                overflow-x: hidden;
                padding-top: 20px;
            }
            .sidenav a{
                padding: 6px 8px 6px 16px;
                text-decoration: none;
                font-size: 25px;
                color: #000000;
                display: block;
            }
            .sidenav a:hover{
                color: #f1f1f1;
            }
            .main{
                margin-left: 160px;
                font-size: 28px;
                padding: 0px 10px;
            }
            body{
                background-image: url(1687805.jpg);
                background-size: cover;
                background-position: center;
                font-family: sans-serif;
            }
            .menu-bar{
                background:rgb(0,100,0);
                text-align:center;
            }
            .menu-bar ul{
                display: inline-flex;
                list-style: none;
                color:#ffffff;
            }
            .menu-bar ul li{
                width:120px;
                margin:15px;
                padding:15px;
            }
            @media screen and (max-height: 450px){
                .sidenav {padding-top: 15px};
                .sidenav a {font-size: 18px};
            }
        </style>
        <title>Project Management System</title>
        </head>
        <body>
            <div class="menu-bar">
                <div class="container2">
                    Employee
                </div>
            <ul>
                <li><a href="homePage1.php"><button class="button button1">Home</button></a></li>
                <li><a href="Department.php"><button class="button button1">Departments</button></a></li>
                <li><a href="Projects.php"><button class="button button1">Projects</button></a></li>
                <li><a href="self_information.php"><button class="button button1">Self Information</button></a></li>
                <li><a href="logout1.php"><button class="button button1">Logout</button></a></li>
            </ul>
            </div>
        </body>
        <div class="wrapper">
            <div class="top">
                <div class="container">
                    <p>If Username Or Password Is Changed You Must Login Again<br></p>
                </div>
                <div class="container">
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

                    $username = $_SESSION['Login_username'];
                    $e_id = $_SESSION['employee_id'];
                    
                    $sql2 = "SELECT Employee_id, Name, Address FROM employee WHERE Employee_id = '$e_id'";
                    $result2 = mysqli_query($mysqli,$sql2);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee ID'."</td>";
                    echo "<td>" .'Employee Name'."</td>";
                    echo "<td>" .'Employee Address'."</td>";
                    while($row = mysqli_fetch_assoc($result2)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    $sql3 = "SELECT Login_username, Login_password FROM employeedatabaseaccess WHERE Employee_Employee_id = '$e_id'";
                    $result3 = mysqli_query($mysqli,$sql3);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Employee Username'."</td>";
                    echo "<td>" .'Employee Password'."</td>";
                    while($row = mysqli_fetch_assoc($result3)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                    $sql4 = "SELECT Name, Age FROM dependent WHERE Employee_Employee_id = '$e_id'";
                    $result4 = mysqli_query($mysqli,$sql4);
                    echo "<br>";
                    echo "<table border='1'>";
                    echo "<td>" .'Dependent Name'."</td>";
                    echo "<td>" .'Depedent Age'."</td>";
                    while($row = mysqli_fetch_assoc($result4)){
                        echo "<tr>";
                        foreach($row as $field => $value){
                            echo "<td>".$value."</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </div>
                <form action="self_information_query.php" method="POST">
                    <div class="container">
                        <p>Employee Name: <input type="text" name="e_name"></p>
                        <p>Employee Address: <input type="text" name="e_address"></p>
                    </div>
                    <div class="container">
                        <p>Employee Login Username: <input type="text" name="l_username"></p>
                        <p>Employee Login Password: <input type="text" name="l_password"></p>
                    </div>
                    <div class="container">
                        <p>Dependent Name: <input type="text" name="d_name"></p>
                        <p>Dependent Age: <input type="text" name="d_age"></p>
                    </div>
                    <div class="container">
                        <input type="Submit" value="Make Changes">
                    </div>
                </form>
            </div>
            <!--<div class="bottom">
                <div class="container">
                    
                </div>
            </div>-->
        </div>
    </head>
</html>