<?php require_once '../inc/connection.php' ?>
<?php require_once '../inc/function.php' ?>
<?php 
    if(isset($_POST['signup'])){
    //to check user is admin or normal
        $errors=[];
        $name='';
        $email='';
        $address='';
        $phone=htmlspecialchars(trim($_POST['phone']));
        $password=htmlspecialchars($_POST['password']);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        //validate name
        if(is_array(validateString($_POST['name']))){
            $errors=array_merge($errors,validateString($_POST['name']));echo "b";
        }
        else{
            $name=validateString($_POST['name']);
        }
        //validate address
        if(is_array(validateString($_POST['address']))){
            $errors=array_merge($errors,validateString($_POST['address']));echo "c";
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
        if(empty($errors)){
            //insert in database
            $query="insert into users (`name`,`email`,`password`,`phone`,`case_admin`) values ('$name','$email','$hashedPassword','$phone', 0)";
            $runQuery=mysqli_query($conn,$query);
            if($runQuery){
                $_SESSION['success']="Register successfully";
                header("location:../login.php");
            }
            else{
                $errors[]='There is an error';
            }
        }
        $pattern = "/^(01)[0125]\d{8}$/";
        if(!preg_match($pattern, $phone)){
            $errors[]='phone is not valid';
        }
        if(!empty($errors)){
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['address']=$address;
            $_SESSION['phone']=$phone;
            $_SESSION['errors']=$errors;
            //print_r($errors);
            header("location:../signup.php");
        }
    }
    else{
       header("location:../signup.php");
    }
?>
