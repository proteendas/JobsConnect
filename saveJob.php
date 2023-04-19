<?php

include 'connect.php';



if($_SERVER['REQUEST_METHOD']=='POST'){
    
    	 $eid = $_POST["name"];
    $name = $_POST["name"];
     $category = $_POST["email"];
     $minexp = $_POST["password"];
       $desc = $_POST["name"];
     $salary = $_POST["email"];
     $industry = $_POST["password"];
    
    $sql = "INSERT INTO employer (name,email,password)
VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}else{
    header("location : index.php");
}


