
<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>


<?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
              unset($_SESSION['errors']);
              endif;
              ?>
<?php
if(isset($_POST['cart'])&&$_GET['product_id']){//must the previous page cart
    $product_id=$_GET['product_id'];
    $quantity=$_POST['quantity'];
 }
else{
   header("location:shop.php");
}
    ?>
<section id="cart-add" class="section-p1">
    <form>
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" name="coupon" placeholder="Enter coupon code">
            <button class="normal" type="submit" >Apply</button>
        </div>
        </form>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <form class=" col-4" action="handle/confirm.php" method="POST">
                name<input type="text" name='name' >
               email <input type="email" name='email' >
                address<input type="text" name='address' >
                phone<input type="text" name='phone'>
                    <!-- product id must be defined -->
                        <input type="hidden" name='product_id' value="<?=$product_id?> ">
                        <input type="hidden" name='quantity' value="<?=$quantity?>">
                paymentType<select name=' paymentType'>
                    <option value="Cash_on_Delivery">Cash on Delivery</option>
                    <option value="Credit_Card">Credit Card</option>
                    <option value="Fawry">Fawry</option>
                </select>
                <button class="normal" type="submit" name='confirm' >proceed to checkout</button>
            </form>
           
        </div>
    </section>


    <?php require_once 'inc/footer.php' ?>