<?php
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];

//Database connection
$conn = new mysqli('localhost','root','','cold');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into cold(name, gender, email, number) values(?,?,?,?)");
    $stmt->bind_param("sssi", $name, $gender, $email, $number);
    $stmt->execute();
    echo "registration sucessfull";
    header('Location: index.html');
    $stmt->close();
    $conn->close();
}
?>