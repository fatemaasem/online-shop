<?php
session_start();
if(isset($_GET['lang'])){
$_SESSION['lang']=$_GET['lang'];
echo $_SESSION['lang'];
//echo $_SERVER['HTTP_REFERER'];
header("location:".$_SERVER['HTTP_REFERER']);
}
else{
    header("location:../index.php");
}
?>