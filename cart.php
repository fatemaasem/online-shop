<?php require_once 'inc/connection.php' ?>
<?php require_once 'inc/function.php' ?>
<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/navbar.php' ?>
<?php if(!isset($_SESSION['login'])){
    header("location:index.php");

}?>
<?php
if(isset($_POST['shop'])){
    $quantity=$_POST['quantity'];
    $id=$_GET['id'];
    if(!$quantity){
    $_SESSION['errors']=['Quantity must be greater than 0'];
    header("location:shop.php");
    }
    $product=checkID('products',$id);
    if(!in_array([$quantity,$product,0],$_SESSION['shop']))
    $_SESSION['shop'][]=[$quantity,$product,0];
    echo sizeof($_SESSION['shop']);
   
}

?>
<?php if(isset($_SESSION['success'])):
              printSuccessMessage($_SESSION['success']);
              unset($_SESSION['success']);
              endif;?>
<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Confirm</td>
                </tr>
            </thead>
   
            <tbody>
                <?php if(isset($_SESSION['shop'])):?>
                <?php for($i=0;$i<sizeof($_SESSION['shop']);$i++ ):
                    $product=$_SESSION['shop'][$i][1];
                    $quantity=$_SESSION['shop'][$i][0];
                    ?>
                <tr>
                    <td><img src="admin/upload/<?=$product['image']?> " height=300 alt="no image"></td>
                    <td><?=$product['title']?> </td>
                    <td><?=$product['description']?> </td>
                    <td><?=$quantity?> </td>
                    <td><?=$product['price']?> </td>
                    <td><?php echo  $product['quantity']*$product['price']?> </td>
                    <!-- Remove any cart item  -->
                    <td><button type="submit" ><a class="btn btn-danger" href="handle/removeCart.php?i=<?=$i?>">Remove</a></button></td><td>
                    <form action="confirmOrder.php?product_id=<?=$product['id']?>" method="POST">
                   <input type='hidden' name='quantity' value=<?=$quantity?>>
                   <button type="submit"  name='cart'class="btn btn-success">confirm</button>
                    </form>
                    </td>
                </tr>
                <?php endfor;?>
                <?php endif;?>
            </tbody>
            <!-- confirm order  -->
           
            
        </table>
    </section>

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

    <?php require_once 'inc/footer.php' ?>

