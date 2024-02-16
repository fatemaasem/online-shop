<?php require_once '../..//inc/connection.php' ?>
<?php require_once '../../inc/function.php' ?>
<?php
if(isset($_POST['updateMember'])){
    $id=$_GET['id'];
    $errors=[];
    $name=$_POST['name'];//required
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
   
    //validation on name
    if(is_array(validateString($name,'name'))){//function return array of errors else return valid string
        $errors=array_merge($errors,validateString($name,'name'));
    }
    else{
        $title=validateString($name,'name');
    }
    //validation on address
    if(is_array(validateString($address,'address'))){//function return array of errors else return valid string
        $errors=array_merge($errors,validateString($address,'address'));
    }
    else{
        $address=validateString($address,'address');
    }
    
   
    if(empty($errors)){
    $query="update users set `name` = '$name',   `email` ='$email', `address`='$address', `phone`='$phone' where id= $id ";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery){
        $_SESSION['success']="update member Successfully.";
    }
    else{
        $errors[]="there is an error.";
    }
    }
    if(!empty($errors)){

        $_SESSION['errors']=$errors;
        print_r($errors);
        header("location:../view/updateMember.php?id=$id");
      
    }
    else
    header("location:../view/layout.php");


}
else{
   header("location:../view/layout.php");
}
        
        
      