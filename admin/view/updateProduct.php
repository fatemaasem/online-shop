<?php
include "../view/header.php";
include "../../inc/function.php";
include "../view/sidebar.php";




include "../view/navbar.php";

?>
<?php

if(isset($_POST['updateProduct'])){
    $errors=[];
    if(!isset($_GET['id'])){
        $errors[]="You must define id .";
    }
    $id=$_GET['id'];//
    $product=checkID('products',$id);//to check if this id is found
    if(!isset($product)){
        $errors[]="This product is not found.";
    }
   if(!empty($errors)){
    header("location:layout.php");
   }
}
else{
header("location:layout.php");
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
          echo $product['image']."<br>";
          ?>
            <h3 class="card-title text-left mb-3">Update Product</h3>
          
            <form method="POST" action="../handle/updateProduct.php?id=<?=$id?>& image=<?=$product['image']?>" enctype="multipart/form-data">
              <div class="form-group">
                <?php $allCategories=selectAll('categories'); ?>
                  <label>Category</label>

                  <!-- select all category from database -->
                  <select  name="category">
                  <option value="0">......</option>
                    <?php
                    foreach( $allCategories as $category):
                        if($category['id']==$product['category_id']){
                           $category_id=$category['id'];
                           $name=$category['name'];
                            echo "<option value=  $category_id  selected >$name</option>";
                        }
                        else{
                    ?>
                    
                    <option value=" <?=$category['id']?>"> <?=$category['name']?></option>
                    <?php }endforeach;?>
                  </select>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" value="<?=$product['title']?>"name="title" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" value="<?=$product['description']?>" name="description" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" value="<?=$product['price']?>"name="price" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input type="number" value="<?=$product['quantity']?>" name="quantity" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" id="image" name="image" >
              </div>
              <div class="text-center">
                <button type="submit" name="updateProduct" class="btn btn-primary btn-block enter-btn">Update Product</button>
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