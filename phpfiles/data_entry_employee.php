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

?>

<html>
<head>
<style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
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
        height:100%;
    }
    .wrapper{
        display: table;
        height: 100%;
        width: 100%;
    }
</style>






<title>Project Management System</title>
<p> Employee Form <br><br>
</p>
<div class="wrapper">
    <div class="top">
        <form action="Employee_query.php" method="POST">
            <div class="container">
                <p>Employee ID: <input type="text" name="Employee_id"></p>
                <p>Name: <input type="text" name="name"></p>
            </div>
            <div class="container">
                <p>DOB: <input type="date" name="meeting-time"></p>
            </div>
            <div class="container">
                <p>E-Mail: <input type="text" name="Address"></p>
                <p>Department #: <input type="text" name="Department_number"></p>
            </div>
            <div class="container">
                <p>Username: <input type="text" name="Username"></p>
                <p>Password: <input type="password" name="Password" minlength="1" maxlength="10"></p>
                <p>Role: <select type="text" name=role>  <!--testing here-->
                <option value='admin'>admin</option>
                <option value='employee'>employee</option>
                <option value='manager'>manager</option>
                </select></p> 
            </div>
<!--</form>-->
    </div>

    <div class="bottom">
        Dependent Form
    <!--<form action="Employee_query.php" method="POST">-->
            <div class="container">
                <p>Phone number: <input type="text" name="Phone_number"></p>
                <p>Age: <input type="text" name="Age"></p>
            </div>
            <div class="container">
                <p>Relationship With Employee: <input type="text" name="RelationShip_with_employee"></p>
                <p>Name Of Dependent: <input type="text" name="Dependent_name"></p>
            </div>
            <div class="container">
                <p> Sex: <select type="text" name="Sex">  <!--testing here-->
                <option value='M'>M</option>
                <option value='F'>F</option>
                </select></p> 
            </div>
            <div class="container">
                <input type="Submit">
            </div>
        </form>    
    </div>
</div>

<!--attermpting query button for data in form -->
<!--<form method="get" action="employeeQueryReport.php" >
    
    <button type="submit">query report</button>
   
    
</form>
-->
</head>
</html>
