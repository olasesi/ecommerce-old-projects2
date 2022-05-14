<?php
$active = "Search Results";
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";
?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Search Results</h2>
                    </div>
                  <?php include ('../incs_gen3/gen_paginate.php');?>					
				<?php 
				 if(!isset($_GET['search_input'])){
					$_GET['search_input']=""; 
				 }
				 $statement = "goods WHERE goods_name LIKE '%".mysqli_real_escape_string ($connect,$_GET['search_input'])."%' ORDER BY goods_timestamp DESC"; 
				 
				 ?>
                </div>
            </div>
           


		   <div class="row featured__filter">
			 
			 
			 <?php 
			include('../incs_gen3/gen_products.php');
			?>
			 
			
			 <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/search.php?search_input='.$_GET['search_input'].'&'); ?>
			   
            </div>
        </div>
    
</section>














				
				
				
				
				
				
				
				
				
				
				
				
				</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>