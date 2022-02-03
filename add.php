<?php
session_start();
$name=$_POST['name'];
if(!isset($_SESSION['nr'])){
    $_SESSION['nr']=rand(10,1000);
}
$nr= $_SESSION['nr'];
$servername = "localhost";
$username = "root";
$password = "";
$db="sklep";

$conn = mysqli_connect($servername, $username, $password, $db);

if($result=$conn->query("CREATE TABLE `{$nr}` (ID int, named TEXT, price int)")){
    $conn->query("INSERT INTO `$nr` (`ID`, `named`, `price`) VALUES ('1','$name','150')");
    echo"Produkt został dodany do listy zakupów, przejdź do sekcji 'kasa' aby sfinalizować tranzakcję.";
}else{
    $conn->query("INSERT INTO `$nr` (`ID`, `named`, `price`) VALUES ('1','$name','150')");
    echo"Produkt został dodany do listy zakupów, przejdź do sekcji 'kasa' aby sfinalizować tranzakcję.";
}

?>