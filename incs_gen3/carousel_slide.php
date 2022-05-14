<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
				 
                    
					
					<?php 
					
					$goods_collection = mysqli_query($connect,"SELECT * FROM goods ORDER BY RAND() LIMIT 15") or die(db_conn_error);
					if(mysqli_num_rows($goods_collection) > 0){
					
					while($loop_goods = mysqli_fetch_array($goods_collection,MYSQLI_ASSOC)){
						
					echo	'<div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/products/'.$loop_goods['file_name_goods'].'">
                            <h5><a href="product-details.php?details='.$loop_goods['goods_id'].'">'.$loop_goods['goods_name'].'</a></h5>';
							if(isset($_SESSION['user_id'])){
							echo '<small><a class="text-primary" title="Edit" href="edit.php?id='.$loop_goods['goods_id'].'"><i class="fa fa-edit"></i> Edit</a></small>';} 
								
                     echo   '</div>
                    </div>';
						
					}
					}else{
						echo '<h5 class="text-center">No products in slides</h5>';
					}
					
					?>
					
					
					
                  
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
	