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
<p> Department Delete Form <br><br>
</p>
<p>DELETING A DEPARTMENT WILL DELETE EMPLOYEES AND PROJECTS ASSOCIATED WITH THE DEPARTMENT</p>
<div class="wrapper">
    <form action="department_delete_query.php" method="POST">
        <div class="container">
            <p>Department id: <input type="text" name="Department_id"></p>
            <p>HR Name: <input type="text" name="name"></p>
            <input type="Submit">
        </div>
        </form>
</div>

<!--attermpting query button for data in form -->
<!--<form method="get" action="employeeQueryReport.php" >
    
    <button type="submit">query report</button>
    
    
</form>
-->
</head>
</html>
