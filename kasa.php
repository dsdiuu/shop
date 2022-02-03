<?php
     session_start();
     $nr=$_SESSION['nr'];
 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $db="sklep";
 
     $conn = mysqli_connect($servername, $username, $password, $db);
 
     if($result=$conn->query("SELECT * FROM `$nr`")){
        echo'
        <div class="kasa_title">Twoje zamówienie:</div>
        ';
        $i=0;
        while ($row = $result -> fetch_row()){
            echo'
            <div class="row"><div class="nazwa">'.$row[1].'</div><div class="cena">'.$row[2].'</div><div id="'.$row[1].'" onclick="deleted(this.id)" class="delete">x</div></div>
            ';$i++;
        }$i=150*$i;echo'<br><div class="suma">Suma:'.$i.'</div><br><div onclick="finalizacja()" class="add_btn">dostawa i płatność</div>';
     }else{
         echo'<div class="title_politic">Twój koszyhk jest pusty.</div>';
     }
       $_SESSION['suma']=@$i;  
?>