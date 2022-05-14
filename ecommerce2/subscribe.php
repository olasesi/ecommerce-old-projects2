<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";

?>
<?php							
					
 $reg_errors_slider = array();
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['uploadslide'])){
	 
	if (filter_var(trim($_POST['slide_goods_name']), FILTER_VALIDATE_EMAIL)) {		//only 20 characters are allowed to be inputted
		$slidegoodname = mysqli_real_escape_string ($connect, trim($_POST['slide_goods_name']));
	
	} else {
		$reg_errors_slider['slide_name'] = 'Enter valid email address';
	} 
	 
 //only numbers are allowed here. no decimals or commas
 if (preg_match ('/0\d{10}/', trim($_POST['slide_price'])))   {	// OR empty(trim($_POST['slide_price']))
		$slideprice = mysqli_real_escape_string ($connect,trim($_POST['slide_price']));
		} else {
		$reg_errors_slider['slide_price'] = 'Enter correct phone number';
		}

 		
if(empty($reg_errors_slider)){

$q = mysqli_query($connect,"INSERT INTO subscribers (id_sub, sub_email, sub_phone, sub_timestamp) 
						VALUES ('','".$slidegoodname."','".$slideprice."','".strtotime('now')."')") or die(db_conn_error);
 
 if (mysqli_affected_rows($connect) == 1) {
			
					
		echo '<br><br><h2 class="text-success text-center">Successful</h2>';
			}
 

 
 
 }
 
 

 
 
 }
 
 
 //end of slide upload
 ?>
 
 



<div class="contact-form spad">
        <div class="container">
            
			
			
			<div class="row">
			 <div class="col-lg-9 col-sm-9">
			
                    <div class="contact__form__title">
                        <h2> Subscribe</h2>
                    </div>
              
			<form action="" method="POST">		
				
						<?php if(array_key_exists('slide_name', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_name'].'</small>';}?>
						<input required = "required" name="slide_goods_name" type="text" placeholder="Email address" value="<?php if(isset($_POST['slide_goods_name'])){echo $_POST['slide_goods_name'];} ?>"/>
						
						 <?php if(array_key_exists('slide_price', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_price'].'</small>';}?>
						<br>
						<input required = "required" name="slide_price" type="text" placeholder="Phone number" value="<?php if(isset($_POST['slide_price'])){echo $_POST['slide_price'];} ?>" />
						
						 
						
                        
                        <button type="submit" name="uploadslide" class="btn btn-secondary">Subscribe</button><br><br><br>
                    

			
            </form>
		
			</div>
			
		
			</div>
			
			
			
			
			</div>
        </div>
	
	<!--<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                           
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
	
	
<?php include"../incs_gen3/footer.php"; ?>