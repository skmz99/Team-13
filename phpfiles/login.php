



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
<form  action="Admin_home.php" method="POST">
 

  <label for="Rank">Choose a rank</label>
 
  <select id="name" name="Rank" >
    <option value="employee">employee</option>
    <option value="supervisor">supervisor</option>
  </select>
 
 
  Name: <input type="text" name="name" />


  ID: <input type="password" name="ID" />
  

submit :<input type="submit" name="submit" value="Submit"/>
    

<p> dont have account </p>

</form> 


<ul>
    <li><a href="#"><button>Login</button></a></li>

    <li><a href="data_entry_employee.php"><button>Create User</button></a></li>
</ul>





</div>
</body>





</html>


