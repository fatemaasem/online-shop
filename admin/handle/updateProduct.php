
<?php require_once '../..//inc/connection.php' ?>
<?php require_once '../../inc/function.php' ?>
<?php
if(isset($_POST['updateProducts'])){
    $id=$_GET['id'];
    $oldImageName=$_GET['image'];
    $errors=[];
    $category_id=$_POST['category'];//required
    $title='';
    $description='';
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $image=$_FILES['image'];
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $imageName=$image['name'];
    $imageSize=$image['size']/(1024*1024);
    $imageError=$image['error'];
    $tmp_name=$image['tmp_name'];
    $imageExt=pathinfo($imageName,PATHINFO_EXTENSION);
    $allPathImage=['jpeg','jpg','png','gif'];
    //validation on category_id
    
    if($category_id==0){
        $errors[]='select category';
    }
    //validation on quantity >0
    if($quantity<=0){
        $errors[]='Quantity must be greater than 0';
    }
     //validation on price >0
     if($price<=0){
        $errors[]='Price must be greater than 0';
    }
    //validation on title
    if(is_array(validateString($_POST['title'],'title'))){//function return array of errors else return valid string
        $errors=array_merge($errors,validateString($_POST['title']));
    }
    else{
        $title=validateString($_POST['title']);
    }
    //validation on description
    if(is_array(validateString($_POST['description'],'description'))){//function return array of errors else return valid string
        $errors=array_merge($errors,validateString($_POST['description']));
    }
    else{
        $description=validateString($_POST['description']);
    }
    
    //validate image...required
    if(empty( $imageName)){
        $errors[]="Image required";
    }
    if($imageSize>5){
        $errors[]="Image size must not be greater than 2 mega byte";
    }
    if(!in_array($imageExt,$allPathImage)){
       $errors[]="Extension is fault . ";
    }
    ////////////////////////////////
    $newName='';
    if(empty($errors)){
        unlink("../uploadProduct/$oldImageName");
    $newName=uniqid().".$imageExt";
    //upload this picture in upload file
    move_uploaded_file($tmp_name,"../uploadProduct/$newName");
    
    
    $query="update products set `title` = '$title',   `image` ='$newName', `description`='$description', `price`='$price',`quantity`='$quantity',`category_id`='$category_id' ";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery){
        $_SESSION['success']="Insert product Successfully.";
    }
    else{
        $errors[]="there is an error.";
    }
    }
    if(!empty($errors)){

        $_SESSION['errors']=$errors;
        print_r($errors);
        header("location:../view/addProduct.php");
      
    }
    else
    header("location:../view/layout.php");


}
else{
    header("location:../view/layout.php");
}
        
        
        