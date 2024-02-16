
<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>

            
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
              <?php if(isset($_SESSION['success'])):
              printSuccessMessage($_SESSION['success']);
              unset($_SESSION['success']);
              endif;?>
              <?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
              unset($_SESSION['errors']);
              endif;
              ?>
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="handle/login.php" method="POST" >
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" name="email"value="<?php if (isset($_SESSION['name']))echo $_SESSION['name']?>" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" name='password' class="form-control p_input" >
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php?is_login=1" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name='login' class="btn btn-primary btn-block enter-btn">Login</button>
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


    //table user, product, cart ,, review comment , rating  = session