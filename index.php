<?php 
if(isset($_SESSION['login'])){
    header("location:shop.php");
}
else{
    header("location:login.php");
}
?>