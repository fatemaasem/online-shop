<?php require_once '../..//inc/connection.php' ?>
<?php require_once '../../inc/function.php' ?>
<?php 
    if(isset($_POST['addAdmin'])){
    //to check user is admin or normal
        $errors=[];
        $name='';
        $email='';
        $address='';
        $phone=htmlspecialchars(trim($_POST['phone']));
        $password=htmlspecialchars($_POST['password']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
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
        //validate name
        if(is_array(validateString($_POST['name']))){
            $errors=array_merge($errors,validateString($_POST['name']));
        }
        else{
            $name=validateString($_POST['name']);
        }
        //validate address
        if(is_array(validateString($_POST['address']))){
            $errors=array_merge($errors,validateString($_POST['address']));
        }
        else{
            $address=validateString($_POST['address']);
        }
        //validate email
        if(validateEmail($_POST['email'])){echo "d";
            $email=validateEmail($_POST['email']);
        }
        else{
            $errors[]='Email is not valid.';
        }
        //check of password length  must be greater than 6 char
        if(!validLength($password,6)){
            $errors[]='password must be greater than 6 char.';
        }
        //validation of image
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
            $newName=uniqid().".$imageExt";
            //upload this picture in upload file
            move_uploaded_file($tmp_name,"../uploadAdmin/$newName");
            //insert in database
            $query="insert into users (`name`,`email`,`password`,`phone`,`case_admin`,`image`) values ('$name','$email','$hashedPassword','$phone', 1,'$newName')";
            $runQuery=mysqli_query($conn,$query);
            if($runQuery){
                $_SESSION['success']="Add admin successfully";
                header("location:../view/layout.php");
            }
            else{
                $errors[]='There is an error';
            }
        }
        //validation on phone
        $pattern = "/^(01)[0125]\d{8}$/";
        if(!preg_match($pattern, $phone)){
            $errors[]='phone is not valid';
        }
        if(!empty($errors)){
            $_SESSION['errors']=$errors;
            //print_r($errors);
            header("location:../view/addAdmin.php");
        }
    }
    else{
       header("location:../view/layout.php");
    }
?>
