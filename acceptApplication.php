<?php

include 'authorizeAdmin.php';
if(isset($_GET['id'])){
    $aip = $_GET['id'];  //application id
   
    
        include 'connect.php';
      
        
        $sql = "update jobsapplied set status='Accepted' where id='$aip';";
        $result=$conn->query($sql);
        header('location: ViewApplicantsAdmin.php');
}else{     
                header('location: index.php?msg=dup');
}
                die();
?>