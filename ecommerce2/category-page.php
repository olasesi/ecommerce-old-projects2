<?php
require"../incs_gen3/config.php";
if(!isset($_GET['products_in_cat'])){
header("Location:".GEN_WEBSITE);
exit();	
}
$selecting = mysqli_query($connect, "SELECT cat_name FROM category WHERE cat_name = '".mysqli_real_escape_string ($connect,$_GET['products_in_cat'])."'") or die(db_conn_error);
if(mysqli_num_rows($selecting) == 0){
header("Location:".GEN_WEBSITE);
exit();	
}

$active = $_GET['products_in_cat'];
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";
?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo $_GET['products_in_cat']; ?></h2>
                    </div>
                <?php include ('../incs_gen3/gen_paginate.php');?>					
				<?php 
				 $statement = "goods WHERE categories = '".mysqli_real_escape_string ($connect,$_GET['products_in_cat'])."' ORDER BY goods_timestamp DESC"; 
				?>
                </div>
            </div>
           


		   <div class="row featured__filter">
			 
			 
			 <?php 
			include('../incs_gen3/gen_products.php');
			?>
			 
			 
			 
			
			 <?php echo pagination($statement,$per_page,$page,$url=GEN_WEBSITE.'/category-page.php?'); ?>
			   
            </div>
        </div>
    
</section>














				
				
				
				
				
				
				
				
				
				
				
				
				</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>