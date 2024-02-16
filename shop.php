<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>
<?php if(!isset($_SESSION['login'])){
    header("location:index.php");

}?>
<?php
$allCategories=selectAll('categories');?>
<?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
              unset($_SESSION['errors']);
              endif;
     ?>
<?php foreach ($allCategories  as $category): ?>
    <p class="text-center">Category Name: </p3>
    <h3 class="text-center"><?=$category['name']?></h3>

            <?php
             $id=$category['id'];
             $query="SELECT * from products where category_id=$id";
             $runQuery=mysqli_query($conn,$query);
            
                 $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
            ?>
<div class="container mt-4">
  <div class="row">
  <?php foreach($products as $product):?>
    <div class="col-md-4">
    <img src="admin/upload/<?=$product['image']?> " width="200" height=300 alt="p1" />
      <div class="des">
        <p>title:<?=$product['title']?></p>
               
                  
                    <div class="star ">
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <h4></h4>
                    <?php if(!isset($_SESSION['is_admin'])):?>
                    <form action="cart.php?id=<?=$product['id']?> " method="POST">
                    <p>Define Quantity</p><input type="number" name="quantity" value="">
                    <button type="submit" name='shop' class="cart " ><i class="fas fa-shopping-cart "></i></button>
                     </form>
                    <h4></h4>
                    <h4></h4>
                    <?php endif;?>
                    <?php if(isset($_SESSION['is_admin'])):?>
                    <button type="submit" ><a class="btn btn-danger" href="admin/handle/deleteProduct.php?id=<?=$product['id']?>">Remove</a></button><br><br>
                    <form action="admin/view/updateProduct.php?id=<?=$product['id']?>" method="POST">
                 
                   <button type="submit"  name='updateProduct'class="btn btn-success">Update</button>
                    </form>
                    <?php endif;?>
                    <h4></h4>
                </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endforeach;?>
    <?php require_once 'inc/footer.php' ?>
<!-- <i class="fas fa-shopping-cart "> -->
