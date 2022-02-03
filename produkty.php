<?php
    session_start();
    $nr=$_SESSION['nr'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="sklep";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if($result=$conn->query("SELECT * FROM produkty")){
        
        while ($row = $result -> fetch_row()){
          echo'
              <div id="'.$row[1].'" class="product_ctn" onclick="product_details(this.id)"><div class="product_name">'.$row[1].'</div></div>
          ';
        }
    }
    else{

    }
?>