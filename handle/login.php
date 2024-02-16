<?php require_once '../inc/connection.php' ?>
<?php require_once '../inc/function.php' ?>
<?php
    if(isset($_POST['login'])){
        $errors=[];
        $email='';
        $case_admin=0;//to check user is admin or normal
        $password=htmlspecialchars(trim($_POST['password']));
        //var_dump(validateString($_POST['name']));
        if(validateEmail($_POST['email'])){
            //if the first five char from email is admin then user is admin 
            
            $email=validateEmail($_POST['email']);
        }
        else{
            $errors[]='Email is not valid.';
        }
        $userName='';
        $user=[];
        if(empty($errors)){
            //check if is found in database..check email is found and password is found too
            //check email

            $query ="select * from users where `email`='$email' ";
            $runQuery=mysqli_query($conn,$query);
            $user=mysqli_fetch_assoc($runQuery);
            if(mysqli_num_rows($runQuery)==1){ 
                //email is found
                //check password
                if (!password_verify($password,$user['password'])) {
                   //user not found
                   $errors[]='Password not correct.';
                }
                else{
                    $case_admin=$user['case_admin'];
                    $userName=$user['name'];
                }
            }
            else{
                $errors[]='email not found';
            }
          
            

            

        }
        if(!empty($errors)){
            $_SESSION['errors']=$errors;
            $_SESSION['email']=$email;
            header("location:../login.php");
        }
        else{
            $_SESSION['success']="login successfully";
            $_SESSION['login']="$userName";
            $_SESSION['user_id']=$user['id'];
          if($case_admin==0)//this user not admin
          header("location:../shop.php");
          else{
            //this user is admin
            $_SESSION['is_admin']=$user['id'];
            $_SESSION['admin_image']=$user['image'];
         header("location:../admin/view/layout.php");
          }
        }


    }
    else{
       header("location:../index.php");
    }
    
?>