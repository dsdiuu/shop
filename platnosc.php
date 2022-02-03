<?php
session_start();
$suma=$_SESSION['suma'];
$nr=$_SESSION['nr'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$adres=$_POST['adres'];
$servername = "localhost";
$username = "root";
$password = "";
$db="sklep";

$conn = mysqli_connect($servername, $username, $password, $db);
if($result=$conn->query("CREATE TABLE `{$tel}` (nr CHAR(12), mail CHAR(12), adres CHAR(12))")){
    if($conn->query("INSERT INTO `$tel` (`nr`, `mail`, `adres`) VALUES ('$nr','$mail','$adres')")){
        echo'
        <div class="title_politic">Finalizacja</div>
        <p>Wykonaj przelew według instrukcji celem realizacji wysyłki:</p>
        <p>1)Nr konta: xyz</p>
        <p>2)W tytule wpisz: '.$nr.'</p>
        <p>3)Kwota: '.$suma.'</p>
        <p>Niezwłocznie po zaksięgowaniu płatności skontaktujemy się z Tobą celem potwierdzenia danych do wysyłki :)</p>
        ';
        unset($_SESSION['nr']);
    }
}else{
    echo'<p>Proszę poprawnie uzupełnić formularz.</p>';
}

?>
