
<?php
include "../view/header.php";
include "../../inc/function.php";
include "../view/sidebar.php";




include "../view/navbar.php";

?>
<?php

if(isset($_GET['id'])){
    $errors=[];
    if(!isset($_GET['id'])){
        $errors[]="You must define id .";
    }
    $id=$_GET['id'];//
    $member=checkID('users',$id);//to check if this id is found
    if(!isset($member)){
        $errors[]="This product is not found.";
    }
   if(!empty($errors)){
   //header("location:layout.php");
   }
}
else{
//header("location:layout.php");
}
?>


<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">

          <div class="card-body px-5 py-5"> 
          <?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
          unset($_SESSION['errors']);
          endif;

          ?>
            <h3 class="card-title text-left mb-3">Update Member</h3>
          
            <form method="POST" action="../handle/updateMember.php?id=<?=$id?>" enctype="multipart/form-data">
              
              <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?=$member['name']?>"name="name" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>email</label>
                <input type="email" value="<?=$member['email']?>" name="email" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>address</label>
                <input type="text" value="<?=$member['address']?>"name="address" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="text" value="<?=$member['phone']?>" name="phone" class="form-control p_input">
              </div>
            
              <div class="text-center">
                <button type="submit" name="updateMember" class="btn btn-primary btn-block enter-btn">Update Member</button>
              </div>
            
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