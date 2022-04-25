<?php
  session_start();
//  include("index.php");

  if(empty($_SESSION['Login_id'])){
    $_SESSION['Login_role'] = '';
  }


  if(!empty($_SESSION['Login_id'])){
    $log = '';
    $logref = 'index.php';

  }
  else{
    $log = '';
    $logref = 'index.php'; //login1

  }

  
  if(!empty($_SESSION['Login_id'])){
    if($_SESSION['Login_role'] == 'admin'){
      $sign = '';
      $signref = 'Admin_home.php';
    }
    

    else{
      $sign = '';
      $signref = 'index.php'; // user sees this one  choose a file for it ...
    }
  }
  else{
    $sign = '';
    $signref = 'signup.php';
    }
    
    
    
    
    
    
//      if(!empty($_SESSION['Login_id'])){
//     if($_SESSION['Login_role'] == 'employee'){
//       $sign = 'employee PANEL';
//       $signref = 'CreateUser.php';
//     }
    

//     else{
//       $sign = 'USER PANEL';
//       $signref = 'CreateUser.php'; // user sees this one  choose a file for it ...
//     }
//   }
//   else{
//     $sign = 'SIGNUP';
//     $signref = 'signup.php';
//     }
    
    
    
    
    
    
?>




<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="header-top">
      <h1>team project management</h1>
    </div>
    <div class="header" id="myHeader">
   <!--   <button class="button buttonHome" onclick="location.href='index.php';"></button>-->
			<!--<button class="button buttonCatalog" onclick="location.href='catalog.php';"></button>-->
			<!--<button class="button buttonLogin" onclick="location.href='<?php echo $logref; ?>';"><?php echo $log; ?></button>-->
   <!--   <button class="button buttonSignup" onclick="location.href='<?php echo $signref; ?>';"><?php echo $sign; ?></button>-->
			<!--<button class="button buttonAbout" onclick="location.href='about.php';"></button>-->
    </div>
               