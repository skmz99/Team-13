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






<title>Department Management System</title>

<form action="Department_query.php" method="POST">
    <div class="container">
    Department Number: <input type="text" name="Department_number">
    </div>
    <div class="container">
    HR: <input type="text" name="HR">
    </div>
    <div class="container">
    Accounting: <input type="text" name="Accounting">
    </div>
    <div class="container">
     FrontEnd Developers: <input type="text"  name="FrontEnd_Developers">
            </div>
    <div class="container">        
    BackEnd Developers: <input type="text" name="BackEnd_Developers">
    </div>
    <div class="container">
    Company ID: <input type="text" name="Company_Company_id">
    </div>
    <div class="container">
    <input type="Submit">
    </div>
</form>

<!--attermpting query button for data in form -->

</head>
</html>
