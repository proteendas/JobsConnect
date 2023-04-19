<?php

$sid="";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["sid"])){
    $sid=$_SESSION["sid"];
    
}else{
    header('Location:index.php');
}