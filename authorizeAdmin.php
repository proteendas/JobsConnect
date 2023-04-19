<?php

$aid="";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["aid"])){
    $aid=$_SESSION["aid"];
    
}else{
    header('Location:index.php');
}