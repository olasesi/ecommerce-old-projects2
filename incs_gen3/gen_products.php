 <?php  
 
 $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 12; 								// Set how many records do you want to display per page.

$startpoint = ($page * $per_page) - $per_page;
 
$select_products3 = mysqli_query($connect,"SELECT * FROM ".$statement." LIMIT $startpoint, $per_page") or die(db_conn_error);

			 if (mysqli_num_rows($select_products3)> 0){
				while($goods_array = mysqli_fetch_array($select_products3)){
					
					
					echo '<div class="col-lg-4 col-md-4 col-sm-6 mix ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/products/'.$goods_array['file_name_goods'].'">
                            <ul class="featured__item__pic__hover">
                                <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="'.$TEL.'" href="tel:'.$TEL.'"><i class="fa fa-phone"></i></a></li>
								 <li><a style="background:'. $BRAND_COLOR.'; border:0;" title="Product Details" href="product-details.php?details='.$goods_array['goods_id'].'"><i class="fa fa-info"></i></a></li>
								';
                                
								 if(isset($_SESSION['user_id'])){
									 echo '<li><a style="background:'. $BRAND_COLOR.'; border:0;" class="text-primary" title="Edit" href="edit.php?id='.$goods_array['goods_id'].'"><i class="fa fa-edit"></i></a></li>';} 
								
                             echo ' 
                            </ul>
                        </div>
						
                        <div class="featured__item__text">
                            <h6><a href="#">'.$goods_array['goods_name'].'</a></h6>
                            <h5>'; 
							if(empty($goods_array['goods_price'])){echo '';}else{echo '&#8358;'.number_format($goods_array['goods_price']);}
								echo '</h5>
                        </div>
						 
						  <div class="product__details__text">
						 <div class="product__details__rating text-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                           
                        </div>
						</div>
                    </div>
					</div>';	
				
				
				}	
				
			 }else{
				echo '<h5 class="text-center">No result found</h5>';
			 }
			
			
			
			?>