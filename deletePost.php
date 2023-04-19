<?php

include 'authorizeEmployer.php';

if(isset($_GET['id'])){
    include 'connect.php';
    $id = $_GET['id'];
    $sql = "delete from post where id=$id";
    
    
    if ($conn->query($sql) === TRUE) {
       
           header('location: employerAccount.php');
       
    }else{
        echo "error deleting post";
    }
}

?>