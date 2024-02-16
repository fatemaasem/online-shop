<?php require_once '../..//inc/connection.php' ?>
<?php require_once '../../inc/function.php' ?>
<?php
if(isset($_POST['addCategory'])){
    $errors=[];
    $name='';
   //validation on title
   if(is_array(validateString($_POST['name']))){//function return array of errors else return valid string
    $errors=array_merge($errors,validateString($_POST['name']));
}
else{
    $name=validateString($_POST['name']);
}
if(empty($errors)){
    $query="insert into categories (`name`) values('$name')";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery){
        $_SESSION['success']="Insert product Successfully.";
        header("location:../view/layout.php");
    }
    else{
        $errors[]="there is an error.";
    }
}
if(!empty($errors)){
    $_SESSION['errors']=$errors;
    header("location:../view/addCategory.php");

}
}
else{
    header("location:../view/layout.php");
}
        
?>