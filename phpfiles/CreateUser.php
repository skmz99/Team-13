

<!DOCTYPE html>


<html>
<head>
<body>
    <style>
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
    }
    .button{
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size:16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button1 {background-color: #D3D3D3;} /*Should be white*/
</style>
    

<div class="container">
<form action="CreateUserQuery.php" method="POST">
  <label for="Rank">Choose a rank</label>
  <select id="name" name="Rank">
    <option value="employee">employee</option>
    <option value="supervisor">supervisor</option>
  </select>
  -<input type="submit"> -
</form>


    Name: <input type="text" name="Name"/>
    <li><button class="button1">Create User</button></li>
</div>
    
    
    
</body>
</head>
</html>
