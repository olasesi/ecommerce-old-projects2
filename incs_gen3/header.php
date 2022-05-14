<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo PAGE_DESCRIPTION;?>">
    <meta name="keywords" content="<?php echo KEY_WORDS;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	
	<title><?php echo TITLE;?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

<style>
	.primary-btn {
	background: #7fad39;
	}
	
	.primary-btn.cart-btn {
	background: #f5f5f5;
}



.actives:hover{
	color:<?php  echo $BRAND_COLOR; ?> !important;
}

	.feedback{
		color:white;
		margin-bottom:20px;
		border:0;
		background:transparent;
		z-index:1000;
		}
	
	#mybutton{
		position:fixed;
		bottom:-4px;
		right:10px;
	
	}
	
	</style>

	
</head>

<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="vFDKZ2J4"></script>

    <!-- Page Preloder -->
  

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <?php 
			if(empty($LOGO_IMG_FILENAME)){
				echo '<a style="color:black;" href="'.GEN_WEBSITE.'"><h3>'.$LOGO_NAME_TEXT.'</h3></a>';
			} else{
				echo '<a href="'.GEN_WEBSITE.'"><img style="height:70px;" src="img/'.$LOGO_IMG_FILENAME.'" alt="website logo" title="'.GEN_WEBSITE.'"></a>';
			}


			?>
        </div>
        <!--<div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>-->
		<?php //echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME); ?>
        <div class="humberger__menu__widget">
            <!--<div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>-->
			 <div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="subscription-list.php"><i class="fa fa-list"></i>Subscription list</a>';
										} 
								?>
                            </div>
			
             <div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="marketing-tips.php"><i class="fa fa-wrench"></i>Marketing tips</a>';
										} 
								?>
                            </div>
			<div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="upload.php"><i class="fa fa-upload"></i> Upload</a>';
										} 
								?>
                            </div>
			<div class="header__top__right__auth">
			 <?php if(isset($_SESSION['user_id'])){
				 echo '<a style="margin-right:10px;" href="logout.php"><i class="fa fa-user"></i> Logout</a>';
				 
				 
			 } else{
				 echo '<a style="margin-right:10px;" href="login.php"><i class="fa fa-user"></i> Login</a>';
			 }?>
                
            </div>
			
			
							
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class=""><a  class="actives" <?php if(isset($active) AND $active == 'home' ) {echo "active"; }  ?>  href="index.php">Home</a></li>
               
				<li class=""><a class="actives" <?php if(isset($active) AND $active == 'aboutus' ) {echo "active"; }?>  href="about-us.php">About us</a></li>
				  <li class=""><a class="actives" <?php if(isset($active) AND $active == 'shop' ) {echo "active"; }?>  href="shop.php">Shop</a></li>
               
			   <!-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>-->
                <li class=""><a class="actives" <?php if(isset($active) AND $active == 'contact' ) {echo "active"; }?>  href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
		
		<div class="fb-share-button" data-href="http://<?php echo $website_name; ?>.com.ng" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo $website_name; ?>.com.ng%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
		
		<?php
		if(!empty($FB_LINK)){
			
			echo '<a href="'.$FB_LINK.'"><i class="fa fa-facebook"></i></a>';
			
			}
		?>
		<?php
		if(!empty($INSTAGRAM_LINK)){
			
			echo '<a href="'.$INSTAGRAM_LINK.'"><i class="fa fa-instagram"></i></a>';
			
			}
		?>
	
            
            
            <!--<a href="#"><i class="fa fa-pinterest-p"></i></a>-->
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li>
				<?php 
				if(!empty($EMAIL_CUSTOM)){
					echo	'<a style="color:black;" href="mailto:'.$EMAIL_CUSTOM.'"><i class="fa fa-envelope"></i>'.$EMAIL_CUSTOM.'</a>';
				} 
				?>
				</li>
				<li>
				<?php 
				if(!empty($TEL)){
					echo '<a style="color:black;" href="tel:'.$TEL.'"><i class="fa fa-phone"></i>'.$TEL.'</a>';
				} 
				?>
				</li>
				
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
							<li>
				<?php 
				if(!empty($EMAIL_CUSTOM)){
					echo '<a style="color:black;" href="mailto:'.$EMAIL_CUSTOM.'"><i class="fa fa-envelope"></i>'.$EMAIL_CUSTOM.'</a>';
				} 
				?>
				</li>
				<li>
				<?php 
				if(!empty($TEL)){
					echo '<a style="color:black;" href="tel:'.$TEL.'"><i class="fa fa-phone"></i>'.$TEL.'</a>';
				} 
				?>
				</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
							
							
		<div class="fb-share-button" data-href="http://<?php echo $website_name; ?>.com.ng" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo $website_name; ?>.com.ng%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
		
                                <?php
		if(!empty($FB_LINK)){
			
			echo '<a href="'.$FB_LINK.'"><i class="fa fa-facebook"></i></a>';
			
			}
		?>
		<?php
		if(!empty($INSTAGRAM_LINK)){
			
			echo '<a href="'.$INSTAGRAM_LINK.'"><i class="fa fa-instagram"></i></a>';
			
			}
		?>
		
                                <!--<a href="#"><i class="fa fa-pinterest-p"></i></a>-->
                            </div>
                           <!-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>-->
							 <div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="subscription-list.php"><i class="fa fa-list"></i>Subscription list</a>';
										} 
								?>
                            </div>
                            <div class="header__top__right__auth">
							 <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="marketing-tips.php"><i class="fa fa-wrench"></i>Marketing tips</a>';
										} 
								?>
							</div>
							<div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="upload.php"><i class="fa fa-upload"></i>Upload</a>';
										} 
								?>
                            </div>
							
							<div class="header__top__right__auth">
                                <?php if(isset($_SESSION['user_id'])){
									echo '<a style="margin-right:10px;" href="logout.php"><i class="fa fa-user"></i> Logout</a>';
									} else{
										echo '<a style="margin-right:10px;" href="login.php"><i class="fa fa-user"></i> Login</a>';
								}?>
				  
                            </div>
							
							
							
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <?php 
			if(empty($LOGO_IMG_FILENAME)){
				echo '<a style="color:black;" href="index.php"><h3>'.$LOGO_NAME_TEXT.'</h3></a>';
			} else{
				echo '<a href="index.php"><img style="height:70px;" src="img/'.$LOGO_IMG_FILENAME.'" alt="website logo" title="'.SITE_NAME_NO_WWW.'"></a>';
			}


			?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a class="actives" <?php if(isset($active) AND $active == 'home' ) {echo "active"; }  ?> href="index.php">Home</a></li>
							
                <li class=""><a class="actives" <?php if(isset($active) AND $active == 'aboutus' ) {echo "active"; }?> href="about-us.php">About us</a></li>
				 <li class=""><a class="actives" <?php if(isset($active) AND $active == 'shop' ) {echo "active"; }?> href="shop.php">Shop</a></li>
               <!-- <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>-->
                <li class=""><a class="actives" <?php if(isset($active) AND $active == 'contact' ) {echo "active"; }?> href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <!--<div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>-->
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div style="background:<?php  echo $BRAND_COLOR;?>;" class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All categories</span>
                        </div>
                       
						<?php
if(isset($_SESSION['user_id'])){

$add_error = array();
if(isset($_POST['add']) AND $_SERVER['REQUEST_METHOD'] == "POST"){

if(preg_match('/^[a-z0-9 ]{3,25}$/i',$_POST['add-cat'])){
	$ac = mysqli_real_escape_string($connect, ucwords(trim($_POST['add-cat'])));
}else{
	$add_error['error_add_cat'] = "Remove invalid characters. (Maximum characters, 30)";
}

if(empty($add_error)){
    $val_cat = mysqli_query($connect,"SELECT * FROM category WHERE cat_name ='".$ac."'") or die(db_conn_error);
	$cat_add_time = strtotime('now');
	if(mysqli_num_rows($val_cat) == 0 ){
		$insert = mysqli_query($connect,"INSERT INTO category (cat_UID,cat_name,cat_timestamp) VALUES ('".$_SESSION['user_id']."', '".$ac."','".$cat_add_time."')") or die(db_conn_error);
		
		$success_add = 'A new category has been added successfully';
		
		
	}else{
		$add_error['exist'] = "Category name already exists";
		
		
	}
}
}
echo '
  <form role="form" action="" method="POST"><br>';
               
					if(isset($success_add)){echo '<p class="text-center text-success">'.$success_add.'</p>'; $_POST = array();}
					 if(array_key_exists('error_add_cat',$add_error)){echo '<small class="text-center text-danger">'.$add_error['error_add_cat'].'</small>';} 
                    
					echo '<div class="form-group">
					<label for="add"><small>Add category</small></label>
                        <input id="add" class="form-control" name="add-cat" type="text" placeholder="e.g Health and Fitness"'; if(isset($_POST['add-cat'])){echo 'value="'.$_POST['add-cat'].'"';} echo '>
						 
                    </div>
                    
                    <div class="col-lg-12 text-center">
                       
                        <button type="submit" name="add" class="btn btn-secondary">Add Category</button>
                    </div>
               
				
            </form><br>';
			
}

?>
<ul>
							<?php
							$cat_collection = mysqli_query($connect,"SELECT * FROM category WHERE cat_name != 'Others' ORDER BY cat_name ASC") or die(db_conn_error);
							
							while($loop_cat= mysqli_fetch_array($cat_collection,MYSQLI_ASSOC)){
								 echo '<div>';
								 if(isset($_SESSION['user_id'])){
							 echo '<a style="display:inline-block; margin-right:5px;" class="text-primary" title="modify" href="modify.php?cat='.$loop_cat['cat_name'].'"><i class="fa fa-edit"></i></a>';} 
								
								echo '<li style="display:inline-block;"><a href="category-page.php?products_in_cat='.$loop_cat['cat_name'].'">'.$loop_cat['cat_name'].'</a></li>';
								echo '</div>';}
								
								$others_collection = mysqli_query($connect,"SELECT * FROM category WHERE cat_name = 'Others'") or die(db_conn_error);
							    if(mysqli_num_rows($others_collection) == 0){
									$insert_new_others_time = strtotime('now');
									$insert_new_others = mysqli_query($connect,"INSERT INTO category (cat_UID,cat_name,cat_timestamp) VALUES ('1', 'Others','".$insert_new_others_time."')") or die(db_conn_error);
								}
								
								
							while($others_cat= mysqli_fetch_array($others_collection,MYSQLI_ASSOC)){
								
							echo '<div><li><a href="category-page.php?products_in_cat=Others">Others</a></li></div>';}
								
								
								
								
								
								
							
								
							
							
							?>
                            
                            <!--<li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="search.php" method="GET">
                               <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>

                                </div>-->
                                <input type="text" placeholder="What do you need?" name="search_input" value="<?php if(isset($_GET['search_input'])){echo $_GET['search_input'];} ?>">
                                <button type="submit" class="site-btn" name="search_button" style="background:<?php  echo $BRAND_COLOR;?>;">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone" style="color:<?php  echo $BRAND_COLOR;?>;"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?php echo	'<a style="color:black;" href="tel:'.$TEL.'">'.$TEL.'</a>'; ?></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
