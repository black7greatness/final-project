<?php
$name = $_POST['name'];
$message = $_POST['message'];

//Database connection
$conn = new mysqli('localhost','root','','light');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into light(name, message) values(?,?)");
    $stmt->bind_param("ss",$name, $message);
    $stmt->execute();
    echo "message sent";
    header('Location: index.html');
    $stmt->close();
    $conn->close();
}    
?>