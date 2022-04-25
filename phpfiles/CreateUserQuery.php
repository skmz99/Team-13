<?php
    include_once 'CreateUser.php';
    include 'config1.php';
    // $fname = $lname = $email = $username = $password = "";
    $Login_id = $Login_role = $Login_username = $Login_password = $Employee_Employee_id= "";

    $errors = array('Login_id'=>'', 'Login_role'=>'', 'Login_username'=>'', 'Login_password' => '', 'Employee_Employee_id'=>'');
    
    extract($_POST);
    
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


    
    // if(isset($_POST['submit-signup'])) {
      
    //     if(empty($_POST['email']) || trim($_POST['email']) == "") {
    //         $errors['email'] = "An email is required<br/>";
    //     } else {
    //         $email = htmlspecialchars($_POST['email']);
    //         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //             $errors['email'] = "Email must be a valid email address.<br/>";
    //         }
    //         else{
    //             $sql = "SELECT * FROM user WHERE email='$email'";
    //             $result = mysqli_query($con, $sql);

    //             if(mysqli_num_rows($result) > 0){
    //                 $errors['email'] = 'Email Already Taken';
    //             }
    //         } 
    //     }
        
    //     if(empty($_POST['fname']) || trim($_POST['fname']) == "" || empty($_POST['lname']) || trim($_POST['lname']) == "") {
    //         $errors['name'] = "A full name is required<br/>";
    //     } else {
    //         $fname = htmlspecialchars($_POST['fname']);
    //         $lname = htmlspecialchars($_POST['lname']);
    //         if(!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
    //             $errors['name'] = "Name must be letters and spaces only<br/>";
    //         }
    //         if(!preg_match('/^[a-zA-Z\s]+$/', $lname)) {
    //             $errors['name'] = "Name must be letters and spaces only<br/>";
    //         }
    //     }
          
    //     if(empty($_POST['uid']) || trim($_POST['uid']) == "") {
    //         $errors['username'] = "A username is required<br/>";
    //     } 
    //     else {
    //         $username = htmlspecialchars($_POST['uid']);
    //         $sql = "SELECT * FROM user WHERE username = '$username'";
    //         $result = mysqli_query($con, $sql);

    //         if(mysqli_num_rows($result) > 0){
    //             echo mysqli_num_rows($result);
    //             $errors['username'] = 'Username Already Taken';
    //         }
    //     }

    //     if(trim($_POST['pwd']) == "") {
    //         $errors['password'] = "Password is required<br/>";
    //     } 
    //     else{
    //         $password = htmlspecialchars($_POST['pwd']);

    //         $uppercase = preg_match('@[A-Z]@', $password);
    //         $lowercase = preg_match('@[a-z]@', $password);
    //         $number    = preg_match('@[0-9]@', $password);
    //         $passwordstyle = "Invalid Password: Include ";

    //         if(!$uppercase) {
    //             $passwordstyle = $passwordstyle . ' ' . "Uppercase,";
    //         }
    //         if(!$lowercase) {
    //             $passwordstyle = $passwordstyle . ' ' . "Lowercase,";
    //         }
    //         if(!$number) {
    //             $passwordstyle = $passwordstyle . ' ' . "Numbers,";
    //         }
    //         if(strlen($password) < 8) {
    //             $passwordstyle = $passwordstyle . ' ' . "8 characters in length,";
    //         }
    //         $passwordstyle = substr($passwordstyle, 0, -1);
    //         if($passwordstyle != "Invalid Password: Include"){
    //             $errors['password'] = $passwordstyle;
    //         }
            
            
    //         // else{
    //         //     if($_POST['pwd'] != $_POST['pwdrepeat']){
    //         //         $errors['password'] = "Passwords do not match<br/>";
    //         //     }
    //         // }
    //     }

        // if(!array_filter($errors)) {

            // Check if connection was successful or not

            if(!$mysqli) {
                echo "Bad connect";
                die ('Connection unsuccessful : '.mysqli_connect_error());
                // header('location: home.php');
            } else {
                // echo 'Connection Success';

                $encpwd = password_hash($Login_password, PASSWORD_DEFAULT);
                // $created = new DateTime();
                // $created = $created->format('Y-m-d H:i:s');
                
                $sql = "INSERT INTO employeedatabaseaccess (Login_id, Login_password, Login_role, Login_username, Employee_Employee_id) VALUES ('$Login_id','$encpwd','$Login_role','$Login_username','$Employee_Employee_id')";
                $result = mysqli_query($mysqli, $sql);
                $num = mysqli_affected_rows($mysqli);

                // Check if INSERT data was successful
                if($result && $num > 0) {

                    mysqli_close($con);
                    header('location: login1.php');
                } else {
                    mysqli_close($mysqli);

                        // $errors['duplicate'] = "Error: ".$sql.mysqli_error($con);

                }
            }
        // }
    // }

?>