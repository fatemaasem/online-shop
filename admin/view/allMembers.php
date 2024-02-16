<!-- view all users not admin -->
<?php
require_once '../../inc/function.php' ;
$allMembers=1;
include "../view/header.php";
include "../view/navbar.php";
//include "../view/sidebar.php";
 ?>




<?php

$query="select *from users where `case_admin`= 0 ";
$allMembers=[];
$runQuery=mysqli_query($conn,$query);
if(mysqli_num_rows($runQuery)>0){
    $allMembers= mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
}

echo "<pre>";
//print_r( $allMembers);
echo "</pre>";

?>
<?php if(isset($_SESSION['errors'])):printErrorArray($_SESSION['errors']) ;
              unset($_SESSION['errors']);
              endif;
     ?>

 
    <section id="cart" class="section-p1"><br>
        <h1 class="text-center">Members</h1>
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Remove</td>
                    <td>Confirm</td>
                </tr>
            </thead>
   
            <tbody>
               
                <?php foreach($allMembers as $member):
                    
                    ?>
                <tr>
                
                    <td><?=$member['name']?> </td>
                    <td><?=$member['email']?> </td>
                    <td><?=$member['address']?> </td>
                    <td><?=$member['phone']?> </td>
                    <!-- Remove any cart item  -->
                    <td><button type="submit" ><a class="btn btn-danger" href="../handle/removeMember.php?id=<?=$member['id']?>">Remove</a></button></td><td>
                    <form action="updateMember.php?id=<?=$member['id']?>" method="POST">
                   <button type="submit"  name='updateMember'class="btn btn-success">update</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach;?>
              
            </tbody>
            <!-- confirm order  -->
           
            
        </table>
    </section>

</body>
</html>
<?php require_once 'footer.php' ?>
<!-- <i class="fas fa-shopping-cart "> -->
