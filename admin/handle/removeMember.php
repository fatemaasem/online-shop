<?php require_once '../..//inc/connection.php' ?>
<?php require_once '../../inc/function.php' ?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="delete from users where id=$id";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery){
        $_SESSION['success']="Delete member Successfully.";
        header("location:../view/layout.php");
    }
    else{
        $errors[]="there is an error.";
        header("location:../../shop.php");
    }
 
}
else{
    $errors[]="You must define id.";
header("location:../../shop.php");
}
 ?>