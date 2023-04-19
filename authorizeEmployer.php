<?php

$eid="";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["eid"])){
    $eid=$_SESSION["eid"];
    
}else{
    header('Location:index.php');
}