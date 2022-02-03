<?php
session_start();
$nr=$_SESSION['nr'];
$id=$_POST['id'];

$servername = "localhost";
    $username = "root";
    $password = "";
    $db="sklep";
 
    $conn = mysqli_connect($servername, $username, $password, $db);
    if($conn->query("DELETE FROM `$nr` WHERE named='$id'")){
    }else{
        echo"problemy z serwerem, prosimy spróbować później..";
    }
?>