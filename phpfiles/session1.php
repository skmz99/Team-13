<?php
session_start();

if(isser($_SESSION["userid"]) && $_SESSION["userid"] == true){
    
    header("Location: index.php");
 exit;   
}

?>