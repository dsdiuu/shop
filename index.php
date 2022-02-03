<?php
session_start();
    if(!isset($_SESSION['nr'])){
        @$_SESSION['nr']=rand(10,1000);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Indie+Flower&family=The+Nautigal&family=Vujahday+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

        });
        function produkty(){
            $("#main_ctn").load("produkty.php");
        }
        function o_nas(){
            $("#main_ctn").load("o_nas.html");
        }
        function polityka(){
            $("#main_ctn").load("polityka.html");
        }
        function kasa(){
            $("#main_ctn").load("kasa.php");
        }
        function deleted(id){
            $.post("delete.php",{id},function(response){
                kasa();
            });
        }
        function finalizacja(){
            $("#main_ctn").load("finalizacja.html");
        }
        function product_details(id){
            $("#main_ctn").load("product_details.html",function(){
                $("#detail_title").html(id);
            });
           
        }
        function final(){
           
               var tel=$("#tel").val();
                var mail=$("#mail").val();
                var adres=$("#adres").val();
            
            $.post("platnosc.php",{tel,mail,adres},function(response){
                $("#main_ctn").html(response);
            });
        }
        function add_product(){
            var name=document.getElementById('detail_title').innerText
            $.post("add.php",{name},function(response){
                alert(response);
            });
            $("#product_details").hide(1000,function(){
                produkty();
            });
        }
    </script>
</head>
<body onload="produkty()">
    <div id="title">Pieczarki dobrej marki</div>
    <div id="nav_ctn">
        <div id="categories">
            <div id="sklep" onclick="produkty()" class="nav_btn">sklep</div>
            <div id="o_nas" onclick="o_nas()" class="nav_btn">o nas</div>
            <div id="polityka" onclick="polityka()" class="nav_btn">polityka</div>
            <div id="kasa" onclick="kasa()" class="nav_btn">kasa</div>
        </div>
    </div>
    <div id="main_ctn"></div>
</body>
</html>