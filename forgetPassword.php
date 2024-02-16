<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>
<?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
              unset($_SESSION['errors']);
              endif;
              ?>
<?php

 if(!isset($_GET['is_login'])){
 header("location:login.php");
}
if(isset($_POST['forgetPassword'])){
      $errors=[];
      $email=$_POST['email'];
      $new_password=htmlspecialchars(trim($_POST['new_password']));
      $confirm_password=htmlspecialchars(trim($_POST['confirm_password']));
      //validate email
      if(validateEmail($_POST['email'])){
        //if the first five char from email is admin then user is admin 
        
        $email=validateEmail($_POST['email']);
    }
    else{
        $errors[]='Email is not valid.';
    }
    if(empty($error)){
      $query="select * from users where `email`='$email'";
            $runQuery=mysqli_query($conn,$query);
            if(mysqli_num_rows($runQuery)==1){
                //check if new_password=confirm password
                if($new_password==$confirm_password){
                //make hashing
                $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                //update
                $query="update users set `password`='$hashedPassword' where `email`='$email'";
                $runQuery=mysqli_query($conn,$query);
                if(!$runQuery){
                  $errors[]='There is an error';
                }
                }
                else{
                  $errors[]='new password and confirm password must be equal.';
                }

            }
            else{
              $errors='email not found';
            }
    }
    if(!empty($errors)){
      $_SESSION['errors']=$errors;
    }
    else{//success login

      $_SESSION['success']="login successfully";
      $_SESSION['login']="$userName";
    if($case_admin==0)//this user not admin
    header("location:shop.php");
    else{
      //this user is admin
      $_SESSION['is_admin']=$user['id'];
   header("location:admin/view/layout.php");
    }
    }
}

  ?>
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
    
            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="" method="POST" >
                  <div class="form-group">
                    <label>email *</label>

                    <input type="email" name='email'class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label> New Password *</label>
                    <input type="text" name='new_password'class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Confirm Password *</label>
                    <input type="text" name='confirm_password' class="form-control p_input" >
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name='forgetPassword'class="btn btn-primary btn-block enter-btn" >Confirm</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php require_once 'inc/footer.php' ?>


