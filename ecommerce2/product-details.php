<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
if(!isset($_GET['details'])){
	$_GET['details']="";
}
$select_edit = mysqli_query($connect,"SELECT * FROM goods WHERE goods_id ='".mysqli_real_escape_string($connect,$_GET['details'])."'")or die(db_conn_error);
if(mysqli_num_rows($select_edit) == 0 ){
	header("Location:index.php");
	exit();
}
include"../incs_gen3/header.php";
?>
  <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
               <?php 
			$goods_array = mysqli_fetch_array($select_edit);
			$var_name = $goods_array['goods_name'];
			$var_price = $goods_array['goods_price'];
			$var_desc = $goods_array['description'];
			$var_cat = $goods_array['categories'];
			$var_sec = $goods_array['section'];
			$var_file = $goods_array['file_name_goods'];
			   ?>
			   
			    <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="img/products/<?php echo $var_file ;?>" alt="<?php echo $var_name; ?>">
                        </div>
                       
                    </div>
                </div>
			   
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $var_name; ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                           
                        </div>
                        <div class="product__details__price"><?php if(empty($var_price)){echo '';}else{echo '&#8358;'.number_format($var_price);} ?></div>
                        <p><?php echo $var_desc; ?></p>
                       
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Delivery</b> <span>Nationwide</span></li>
                            <li><b>Share on <i class="fa fa-facebook"></i></b>
                                <span>
                                    
                                  <div class="fb-share-button" data-href="http://<?php echo $website_name; ?>.com.ng/product-details.php?details=<?php echo $_GET['details']; ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo $website_name; ?>.com.ng/product-details.php?details=<?php echo $_GET['details']; ?>%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
		
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
              
            </div>
        </div>
    </section>


    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Items</h2>
                    </div>
                </div>
            </div>
			<div class="row">
			<?php 
$related_products = mysqli_query($connect,"SELECT * FROM goods WHERE goods_name LIKE '%".$var_name."%' AND goods_name != '".$var_name."' LIMIT 0,4" )or die(db_conn_error);
 
 if(mysqli_num_rows($related_products) == 0){
	echo '<h5 class="text-center">No related item</h5>';
	}
	
while($related_array = mysqli_fetch_array($related_products)){
			
		echo '<div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                       
						<div class="product__item__pic set-bg" data-setbg="img/products/'.$related_array['file_name_goods'].'">
                           
                        </div>
                        <div class="product__item__text">
                            <h6><a href="product-details.php?details='.$related_array['goods_id'].'">'.$related_array['goods_name'].'</a></h6>
                            <h5>';
							if(empty($related_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($related_array['goods_price']);}
							echo '</h5>
                        </div>
                    </div>
                </div>';	
			
			
			
}	
			
			
			?>
			
           </div>
			
        </div>
    </section>











				
				
				
				
				
				
				
				
				
				
				
				
				</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>