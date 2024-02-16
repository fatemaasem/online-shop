<?php require_once '../inc/connection.php' ?>
<?php require_once '../inc/function.php' ?>
<?php
if(isset($_POST['confirm'])){
    $errors=[];
    $user_id=$_SESSION['user_id'];
    $product_id=$_POST['product_id'];
    $quantity=$_POST['quantity'];
    $paymentType=$_POST['paymentType'];
    $phone=htmlspecialchars(trim($_POST['phone']));
    //validate name
    if(is_array(validateString($_POST['name']))){
        $errors=array_merge($errors,validateString($_POST['name']));
    }
    else{
        $name=validateString($_POST['name']);
    }
    //validate address
    if(is_array(validateString($_POST['address']))){
        $errors=array_merge($errors,validateString($_POST['address']));
    }
    else{
        $address=validateString($_POST['address']);
    }
    //validate email
    if(validateEmail($_POST['email'])){
        $email=validateEmail($_POST['email']);
    }
    else{
        $errors[]='Email is not valid.';
    }
    if(empty($errors)){
            //insert this order in order table
            $query="insert into orders (`user_id`,`name`,`email`,`address`,`phone`,`paymentType`) values($user_id,'$name','$email','$address','$phone','$paymentType')";
            $runQuery=mysqli_query($conn,$query);
            if($runQuery){
                //to find order id to add row in order details
                //we need the last id in order table
                $query="select id  from orders order by id desc limit 1 ";
                $runQuery=mysqli_query($conn,$query);
                if (mysqli_num_rows($runQuery)==1){
                    $order_id= mysqli_fetch_assoc($runQuery)['id'];
                    echo $order_id .$product_id. $quantity;
                }
                //insert this order in order details
                $query="insert into orderdetails (`order_id`,`product_id`,`quantity`) values($order_id,$product_id,$quantity)";
                $runQuery=mysqli_query($conn,$query);
            }
            else{
                $errors=['there is an error'];
            }
    }
    if(!empty($errors)){
        $_SESSION['errors']=$errors;
       
        header("location:../confirmOrder.php");
    }
    else{
        $_SESSION['success']='Order confirm successfully.';
        header("location:../cart.php");
    }
 }
 else{
    header("location:../cart.php");
 }
?>