<?php


include 'connect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    
  if(!isset($_POST['email']) || !isset($_POST['password'])){
     $output = json_encode(array('type' => 'error', 'text' => 'Please enter credentials!'));
     die($output);
    }
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{ //email validation
    $output = json_encode(array('type' => 'error', 'text' => 'Please enter a valid email!'));
    die($output);
}
																																		 
if($conn->connect_error){
        $output = json_encode(array('type' => 'error', 'text' => 'Error connecting'.$conn->connect_error));
    die($output);
    }
    
    $sqlA = "select * from admin where email = '$email' and password = '$password';";
    $sqlE = "select * from employer where email = '$email' and password = '$password';";
    $sqlS = "select * from seeker where email = '$email' and password = '$password';";
     
$resultA = $conn->query($sqlA);
    
if ($resultA->num_rows > 0) {
    // output data of each row
     if($rowA = $resultA->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["aid"]= $rowA["id"];
    $_SESSION["login_admin"]= $rowA["name"];

     
    $output = json_encode(array('type' => 'success', 'text' => 'Login successfull'.$_SESSION["login_admin"]));
    die($output);

}}
    

$resultE = $conn->query($sqlE);
if ($resultE->num_rows > 0) {
    // output data of each row
     if($rowE = $resultE->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["eid"]= $rowE["id"];
    $_SESSION["login_employer"]= $rowE["name"];

     
    $output = json_encode(array('type' => 'success', 'text' => 'Login successfull'.$_SESSION["login_employer"]));
    die($output);

}}



    $resultS = $conn->query($sqlS);
    
if ($resultS->num_rows > 0) {
    // output data of each row
     if($rowS = $resultS->fetch_assoc()) { 
     
     
    
    session_start();
    $_SESSION["sid"]= $rowS["id"];
    $_SESSION["login_user"]= $rowS["name"];

     
    $output = json_encode(array('type' => 'success', 'text' => 'Login successfull'.$_SESSION["login_user"]));
    die($output);

}}else{
    $output = json_encode(array('type' => 'error', 'text' => 'Invalid credentials!'));
    die($output);
}

    }