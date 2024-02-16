<?php require_once '../inc/connection.php' ?>
<?php require_once '../inc/function.php' ?>
<?php
if(isset($_GET['i'])){
    $i=$_GET['i'];
 array_splice($_SESSION['shop'], $i, 1);
 header("location:../cart.php");
}
else{
header("location:../cart.php");
}
 ?>