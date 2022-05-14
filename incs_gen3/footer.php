<!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                             <?php 
			if(empty($LOGO_IMG_FILENAME)){
				echo '<a style="color:black;" href="'.GEN_WEBSITE.'"><h3>'.$LOGO_NAME_TEXT.'</h3></a>';
			} else{
				echo '<a href="'.GEN_WEBSITE.'"><img style="height:70px;" src="img/'.$LOGO_IMG_FILENAME.'" alt="website logo" title="'.GEN_WEBSITE.'"></a>';
			}


			?>
                        </div>
                        <ul>
                            <li><?php 
				if(!empty($ADDRESS)){
					echo	'<a style="color:black;" ><i class="fa map-marker"></i> '.$ADDRESS.'</a>';
				} 
				?></li>
                            <li> <?php 
				if(!empty($TEL)){
					echo	'<a style="color:black;" href="tel:'.$TEL.'"><i class="fa fa-phone"></i> '.$TEL.'</a>';
				} 
				?></li>
                    <li> <?php 
				if(!empty($TEL2)){
					echo	'<a style="color:black;" href="tel:'.$TEL2.'"><i class="fa fa-phone"></i> '.$TEL2.'</a>';
				} 
				?></li>       
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="contact.php">Contact</a></li>
                           <!-- <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>-->
                        </ul>
                        <!--<ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>-->
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Send a Message</h6>
                        <p>Get E-mails updates on our latest offers and bonuses.<br>
						  <?php 
				//if(!empty($EMAIL)){
					//echo	'<a style="color:black;" href="mailto:'.$EMAIL_CUSTOM.'"><i class="fa fa-envelope"></i> '.$EMAIL_CUSTOM.'</a>';
				//} 
				?>
				<br>
				 <?php 
				if(!empty($EMAIL)){
					echo	'<a style="color:black;" href="mailto:'.$EMAIL.'"><i class="fa fa-envelope"></i> '.$EMAIL.'</a>';
				} 
				?>
						</p>
						
                       <!-- <form action="" method="POST">
                            <input type="text" placeholder="Enter your mail">
							 <input type="text" placeholder="Phone number">
							 <textarea></textarea>
							<button type="submit" name="" class="site-btn">Send Message</button>
                        </form>-->
                        <div class="footer__widget__social">
                             <?php
		if(!empty($FB_LINK)){
			
			echo '<a style="background: '.$BRAND_COLOR.';" href="'.$FB_LINK.'"><i class="fa fa-facebook" style="color:white;"></i></a>';
			
			}
		?>
		<?php
		if(!empty($INSTAGRAM_LINK)){
			
			echo '<a style="background: '.$BRAND_COLOR.';" href="'.$INSTAGRAM_LINK.'"><i class="fa fa-instagram"></i></a>';
			
			}
		?>
		
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
						
						Copyright &copy; <?php 
					$COPYYEAR = 2020;
					$curyear = date('Y');
					echo $COPYYEAR. (($COPYYEAR != $curyear)? '-' . $curyear : '');
					?>  All rights reserved | This was created by <a href="https://facebook.com/designsbyblocks/" target="_blank" class="text-primary">Designs by Blocks</a>
						
						
  
  </p></div>
                        <div class="footer__copyright__payment"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
<div id="mybutton">

<button class="feedback">
	<?php if(!empty($WHATSAPP_LINK)){
		 echo '<a href="'.$WHATSAPP_LINK.'"><img src="img/whatsapp.png" width="40px" height="40px"></a>';
		
	} ?>
	
	
</button>

</div>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

<!--<div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">LOGIN</button>
                    </div>-->

</body>

</html>