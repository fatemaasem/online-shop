<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>

              <div class="card-body px-5 py-5" style="background-color:darkgray;">
              <?php if(isset($_SESSION['errors'])){printErrorArray($_SESSION['errors']);
              unset($_SESSION['errors']);
               }?>
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST" action="handle/signup.php">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name='name' value="<?php if (isset($_SESSION['name']))echo $_SESSION['name']?>" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name='email' value="<?php if (isset($_SESSION['email']))echo $_SESSION['email']?>" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name='password'class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name='phone' value="<?php if (isset($_SESSION['phone']))echo $_SESSION['phone']?>"class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name='address' value="<?php if (isset($_SESSION['address'])) echo $_SESSION['address']?>"class="form-control p_input" >
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit" name='signup' class="btn btn-primary btn-block enter-btn">Signup</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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
