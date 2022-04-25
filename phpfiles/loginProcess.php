<?php 

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

// if($_SERVER['REQUEST_METHOD'] == "POST"){
// if(isset($_POST['submit']))
// { // submits
// echo "i am awake" ;
//     $name = $_POST['name']; // username
//     $ID =  $_POST['ID']; // password
//     // $rank = $_POST['rank'];
//      $query = "SELECT Login_password FROM employeedatabaseaccess WHERE Login_username= '$name'" ;
//     //   $query = "SELECT * FROM employeedatabaseaccess WHERE Login_username = '$name' AND Login_password = '$ID' ";
//   echo "$query";
//   $result = mysqli_query($mysqli, $query) or die("failed to load the database" .mysql_error());
   
//   echo "$result";
//   echo " after result";
        
//         if($row = mysql_fetch_assoc($result))// problem is here
//         {
//             echo "row if ";
//             if($ID == $row['Login_password'])
//             {
                
//                 echo "success lol";
//                 header("location:Admin_home.php");
//                 exit();
        
//             }else
//                  echo "<script> alert('invalid password')</script>";
//         } else

//              echo "<script>alert('invalid username')</script>";

        
    
// }


//  }

if($_SERVER['REQUEST_METHOD'] == "POST"){
if(isset($_POST['submit']))
{ // submits
echo "i am awake" ;
    $name = $_POST['name']; // username
    $ID =  $_POST['ID']; // password
    // $rank = $_POST['rank'];
    //  $query = "SELECT Login_password FROM employeedatabaseaccess WHERE Login_username= '$name'" ;
      $query = "SELECT * FROM employeedatabaseaccess WHERE Login_username = '$name' AND Login_password = '$ID' ";
   echo "$query";
   $result = mysqli_query($mysqli, $query) or die("failed to load the database" .mysql_error());
   $row = mysql_fetch_array($result);
   echo "$result";
   echo " after result";
        // $row = mysql_fetch_assoc($result)
        if($row['Login_username'] == $name && $row['Login_password'] == $ID)// problem is here
        {
            echo "login success ";
            // if($ID == $row['Login_password'])
            // {
                
                echo "success lol";
                header("location:Admin_home.php");
                exit();
        echo "<script> alert('invalid password')</script>";
            // }else
                 
        } else

             echo "<script>alert('invalid username')</script>";

        
    
}


 }




?>
