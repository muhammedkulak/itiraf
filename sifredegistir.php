<?php
ini_set('display_errors','0');
ob_start();
session_start();
include("ayar.php");

if(isset($_SESSION["login"])==false){
        header('Location: http://www.ssuitiraf.com/index.php');}

if(_POST){
    
    $nick1  = $_SESSION["nick"];
    $sifre   = $_POST["yenisifre"];
    
    if($sifre == "" or strlen($sifre) < 6){
        echo "<script> alert('Boşluğu Doldurun ve Şifre En Az 6 Karakter Olmalı!!')</script>";
        header ('Location: http://www.ssuitiraf.com/profil.php');

    }
    else{
    $sor    = mysql_query("select * from user where nick='$nick1' ");
    $sql    = mysql_fetch_array($sor);
    $email  = $sql["email"]; 
    $update = mysql_query("update user set sifre='$sifre' where email='$email' ");
    
    if($update){
        echo "<script> alert('Islem Basarili - Lutfen Tekrar Giris Yapiniz..')</script>";
        header ('Location: http://www.ssuitiraf.com/cikis.php');
    }else{
        echo "Güncellenemedi";
    }
    
}
}





ob_end_flush();
?>