<?php
$active = "home";
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";

?>
<?php include"../incs_gen3/carousel1.php";?>
<?php include"../incs_gen3/carousel_slide.php";?>
    

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
						 <li class="" data-filter="*">All</li>
						<?php 
						$random = mysqli_query($connect,"SELECT cat_name FROM category ORDER BY cat_timestamp DESC") or die(db_conn_error);
						if(mysqli_num_rows($random)> 0){
						
						while($rand_array = mysqli_fetch_array($random)){
							
							echo '<li class="" data-filter=".'.$rand_array['cat_name'].'">'.$rand_array['cat_name'].'</li>';
							}
							}
						
						
						?>
						
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
			 <?php  
			 $goods = mysqli_query($connect,"SELECT * FROM goods ORDER BY goods_timestamp DESC LIMIT 0,8") or die(db_conn_error);
			 if (mysqli_num_rows($goods)> 0){
				while($goods_array = mysqli_fetch_array($goods)){
					echo '<div class="col-lg-3 col-md-4 col-sm-6 mix '.$goods_array['categories'].' fresh-meat">
                    <div class="featured__item">
                        
						<div class="featured__item__pic set-bg" data-setbg="img/products/'.$goods_array['file_name_goods'].'">
                             <div class="product__discount__item__pic set-bg" data-setbg="">
							<div class="product__discount__percent" style="background:'. $BRAND_PRICE_COLOR.';">-20%</div>
							<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$goods_array['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$goods_array['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                             echo ' 
                            </ul>
							</div>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">'.$goods_array['goods_name'].'</a></h6>
                            <h5>';
							if(empty($goods_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($goods_array['goods_price']);}
							
							
							echo '</h5>
                        </div>
                    </div>
					</div>';	
				}	
				
			 }else{
				echo '<h5 class="text-center">No featured products</h5>';
			 }
			
			
			
			?>
			



            </div>
        </div>
    </section>
    <!-- Featured Section End -->

   

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
							
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
							<!---->
							 <div class="row featured__filter">
							<!---->
							 <?php 
							 $latest = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Latest Products' ORDER BY goods_timestamp DESC LIMIT 0,2") or die(db_conn_error);
							 if(mysqli_num_rows($latest)>0){
								 while($latest_array = mysqli_fetch_array($latest)){
								//**	
								echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$latest_array['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$latest_array['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$latest_array['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$latest_array['goods_name'].'</h6>
                                        <span>'; if(empty($latest_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($latest_array['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**	
								 
								 
								 
								 }
							 }else{
								echo '<h5 class="text-center">No latest products</h5>';
								}
							 
							 ?>
							 
							
							
                                
                            <!---->  
                            </div>
							<!---->
							</div>
							
                            <div class="latest-prdouct__slider__item">
							<!---->
							 <div class="row featured__filter">
							<!---->
							
							  <?php 
							 $latest1 = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Latest Products' ORDER BY goods_timestamp DESC LIMIT 2,2")or die(db_conn_error);
							
								 while($latest_array1 = mysqli_fetch_array($latest1)){
											//**	
								echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$latest_array1['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$latest_array1['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$latest_array1['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$latest_array1['goods_name'].'</h6>
                                        <span>'; if(empty($latest_array1['goods_price'])){echo '';}else{echo '&#8358;'.number_format($latest_array1['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**	
								 
								 
								 } 
							
							 ?>
							 <!---->  
                            </div>
							<!---->
							
							
                               
                            </div>
                        </div>
                    </div>
                </div>
               

			   <div class="col-xs-3 col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Selling Products</h4>
						 
                        <div class="latest-product__slider owl-carousel">
                            
							<div class="latest-prdouct__slider__item">
							 <!---->
							 <div class="row featured__filter">
							<!---->
							  <?php 
							 $rated = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Top Selling Products' ORDER BY goods_timestamp DESC LIMIT 0,2")or die(db_conn_error);
							 if(mysqli_num_rows($rated)>0){
								 while($rated_array = mysqli_fetch_array($rated)){
						//**	
								echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$rated_array['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$rated_array['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$rated_array['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$rated_array['goods_name'].'</h6>
                                        <span>'; if(empty($rated_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($rated_array['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**	
								  
								 
								 } 
							 }else{
				echo '<h5 class="text-center">No top rated products</h5>';
			 }
							 ?>
							
							
							<!---->	
							</div>
							<!---->
						</div>
                            
							
							<div class="latest-prdouct__slider__item">
							 <!---->
							 <div class="row featured__filter">
							<!---->
							 <?php 
							 $rated1 = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Top Selling Products' ORDER BY goods_timestamp DESC LIMIT 2,2") or die(db_conn_error);
							
								 while($rated_array1 = mysqli_fetch_array($rated1)){
						//**	
								echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$rated_array1['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$rated_array1['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$rated_array1['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$rated_array1['goods_name'].'</h6>
                                        <span>'; if(empty($rated_array1['goods_price'])){echo '';}else{echo '&#8358;'.number_format($rated_array1['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**	
								   
								 
								 } 
							
							 ?>
							<!---->
							</div> 
							<!---->
                            </div>
                        </div>
                    </div>
                </div>
               


			   <div class="col-xs-3 col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
						 
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
							 <!---->
							 <div class="row featured__filter">
							<!---->
							 <?php 
							 $review = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Top Rated Products' ORDER BY goods_timestamp DESC LIMIT 0,2")or die(db_conn_error);
							 if(mysqli_num_rows($review)>0){
								 while($review_array = mysqli_fetch_array($review)){
									 echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$review_array['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$review_array['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$review_array['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$review_array['goods_name'].'</h6>
                                        <span>'; if(empty($review_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($review_array['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**	
								   
								 } 
							 }else{
				                    echo '<h5 class="text-center">No reviewed products</h5>';
			                          }
							 ?>
                             <!---->	
							</div>
							<!---->
                            </div>
                            <div class="latest-prdouct__slider__item">
							 <!---->
							 <div class="row featured__filter">
							<!---->
							 <?php 
							 $review1 = mysqli_query($connect,"SELECT * FROM goods WHERE section ='Top Rated Products' ORDER BY goods_timestamp DESC LIMIT 2,2")or die(db_conn_error);
							
								 while($review_array1 = mysqli_fetch_array($review1)){
									  echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$review_array1['file_name_goods'].'">';
							
							echo '<ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone" ></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$review_array1['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$review_array1['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                              
                           echo '</ul>';
							
							echo '
									</div>';
								//**	
								echo '
                                   
                                    <div class="featured__item__text">
                                        <h6>'.$review_array1['goods_name'].'</h6>
                                        <span>'; if(empty($review_array1['goods_price'])){echo '';}else{echo '&#8358;'.number_format($review_array1['goods_price']);} echo '</span>
                                    </div>
                               ';
							//**	 
							echo '</div>
							</div>'; 
							//**
								 } 
								 ?>
							
							<!---->
							</div> 
							<!---->
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

 
	
    <!-- Blog Section End -->
	<?php include"../incs_gen3/footer.php"; ?>
	
