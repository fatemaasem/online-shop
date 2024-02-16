<?php
include "../../inc/function.php";
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
?>
              <div class="card-body px-5 py-5" style="background-color:darkgray;">
              <?php if(isset($_SESSION['errors'])){printErrorArray($_SESSION['errors']);
              unset($_SESSION['errors']);
               }?>
                <h3 class="card-title text-left mb-3">Add Admin</h3>
                <form method="POST" action="../handle/addAdmin.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name='name'  class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name='email'  class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name='password'class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name='phone' class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name='address' class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" >
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit" name='addAdmin' class="btn btn-primary btn-block enter-btn">add</button>
                  </div><br>
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

    <?php 
    include "../view/footer.php";
 ?>
