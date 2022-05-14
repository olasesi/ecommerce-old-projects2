<?php
$active = "Shop";
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";
?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Shop</h2>
                    </div>
                  <?php include ('../incs_gen3/gen_paginate.php');?>					
				<?php 
				 
				 $statement = "goods ORDER BY goods_timestamp DESC"; 
				 
				 ?>
                </div>
            </div>
           


		   <div class="row featured__filter">
			 
			 
			 <?php 
			include('../incs_gen3/gen_products.php');
			?>
			 
			 
			 
			
			 <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/shop.php?'); ?>
			   
            </div>
        </div>
    
</section>














				
				
				
				
				
				
				
				
				
				
				
				
				</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>