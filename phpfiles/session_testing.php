<?php 
    use \Datetime;
    $now = new DateTime();
    
    echo $now->format('s');
    echo $now->getTimestamp();
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






<title>Project Management System</title>

<form action="session_testing.php" method="POST">
    Message: <input type="text" name="message">
    <input type="Submit" value="Go To Session test2">
</form>
<!--attermpting query button for data in form -->

</head>
</html>