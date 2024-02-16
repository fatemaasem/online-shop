<?php?>

<section id="header">
<a href="index.html">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>
        <!-- <li class="link">
            <a href="index.php"><?=$mes['Home']?></a>
        </li> -->
       <?php if(isset($_SESSION['is_admin'])):?>
        <li class="link">
            <a href="admin/view/layout.php"><?=$mes['Admin Page']?></a>
        </li>
        <?php endif;?>
        <?php  if(isset($_SESSION['login'])):?>
        <li class="link">
            <a href="shop.php">Shop</a>
        </li>
        <?php endif;?>
        <li class="link">
            <a href="about.html">About</a>
        </li>
        <li class="link">
            <a href="contact.html">Contact</a>
        </li>
        
        <?php if(isset($_SESSION['lang'])&&($_SESSION['lang']=='ar')):
          
          ?>
        <li class="nav-item">
          <a class="nav-link" href="inc/language.php?lang=<?='en'?>">English</a>
        </li>
        <?php endif;?>
        <?php if(!isset($_SESSION['lang'])||($_SESSION['lang']=='en')):
          
          ?>
        <li class="nav-item">
          <a class="nav-link" href="inc/language.php?lang=<?='ar'?>">Arabic</a>
        </li>
        <?php endif;?>
        <?php if(!isset($_SESSION['login'])): ?>
        <li class="link">
            <a href="signup.php">Signup</a>
        </li>
        <?php endif;?>
        <?php if(!isset($_SESSION['login'])): ?>
        <li class="link">
            <a href="login.php">Login</a>
        </li>
        <?php endif;?>
        <?php if(isset($_SESSION['login'])): ?>
        <li class="link">
            <a href="handle/logout.php">Logout</a>
        </li>
        <?php endif;?>
        <?php if(isset($_SESSION['login'])): ?>
        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </li>
       
        <?php endif;?>
        <?php if(isset($_SESSION['login'])): ?>
        <li class="link">
            <h3 ><?=$_SESSION['login']?></h3>
        </li>
        <?php endif;?>
    </ul>

</div>

</section>