<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");

if(!isset($_SESSION['user_id'])){
	header("Location:".GEN_WEBSITE);
	exit();
}


include"../incs_gen3/header.php";

?>
<?php							
					
 if (!isset($reg_errors_slider)) {$reg_errors_slider = array();}
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['uploadslide'])){
	 
	if (preg_match ('/^.{3,20}$/i', trim($_POST['slide_goods_name']))) {		//only 20 characters are allowed to be inputted
		$slidegoodname = mysqli_real_escape_string ($connect, trim($_POST['slide_goods_name']));
	
	} else {
		$reg_errors_slider['slide_name'] = 'Maximum characters, 20';
	} 
	 
 //only numbers are allowed here. no decimals or commas
 if (preg_match ('/^[0-9]{1,10}$/', trim($_POST['slide_price'])) OR empty($_POST['slide_price']))  {	// OR empty(trim($_POST['slide_price']))
		$slideprice = mysqli_real_escape_string ($connect,trim($_POST['slide_price']));
		} else {
		$reg_errors_slider['slide_price'] = 'Please enter valid characters e.g 13000';
		}
		
		
	if ($_POST['slide_categories'] == "Choose category") {
		$reg_errors_slider['slide_categories'] = 'Please choose from the category';			//same reason as above
		}else{
		$slidecategories = $_POST['slide_categories'];
		}
		
	if ($_POST['section'] == "Choose section") {
		$reg_errors_slider['section_error_key'] = 'Please choose section to upload to';			//same reason as above
		}else{
		$section = $_POST['section'];
		}

		

	if (preg_match ('/^.{0,5000}+$/i', trim($_POST['description']))) {			//exclamation mark(!) added to it. To be added to others	
		$description_g = mysqli_real_escape_string ($connect, trim($_POST['description']));
		} else {
		$reg_errors_slider['description'] = 'Maximum characters: 5000';
		}
			
	if (is_uploaded_file($_FILES['slideimage']['tmp_name']) AND $_FILES['slideimage']['error'] == UPLOAD_ERR_OK){ 
		
			if($_FILES['slideimage']['size'] > 1048576){ 		//conditions for the file size 1MB
				$reg_errors_slider['file_size']="File size is too big. Max file size 1MB.";
			}
		
			$allowed_extensions = array('jpeg', '.png', '.jpg', '.JPG', 'JPEG', '.PNG');		
			$allowed_mime = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/x-png');
			$image_info = getimagesize($_FILES['slideimage']['tmp_name']);
			$ext = substr($_FILES['slideimage']['name'], -4);
			
			
			
			
			if (!in_array($_FILES['slideimage']['type'], $allowed_mime) || !in_array($image_info['mime'], $allowed_mime) || !in_array($ext, $allowed_extensions)){
				$reg_errors_slider['wrong_upload'] = "Please choose jpg or png file type. GIF images are not allowed.";
				
			}
			
		}
 		
	
	
	
	if(empty($reg_errors_slider)){
	if($_FILES['slideimage']['error'] == UPLOAD_ERR_OK){
			$new_name= (string) sha1($_FILES['slideimage']['name'] . uniqid('',true));
			$new_name .= ((substr($ext, 0, 1) != '.') ? ".{$ext}" : $ext);
			$dest = "img/products/".$new_name;
			
			if (move_uploaded_file($_FILES['slideimage']['tmp_name'], $dest)){
			
			$_SESSION['images']['new_name'] = $new_name;
			$_SESSION['images']['file_name'] = $_FILES['slideimage']['name'];
			
			
			} else {
			trigger_error('The file could not be moved.');
			$reg_errors_slider['not_moved'] = "The file could not be moved.";
			unlink ($_FILES['slideimage']['tmp_name']);
			}
			}
 
if(empty($reg_errors_slider)){

	
$new_name = ((isset($_SESSION['images']['new_name']))? $_SESSION['images']['new_name']:"goods_serv_pix.jpg");
$q = mysqli_query($connect,"INSERT INTO goods (goods_id, UID, goods_name, goods_price, file_name_goods, description, categories, section, goods_timestamp) 
						VALUES ('','".$_SESSION['user_id']."','".$slidegoodname."','".$slideprice."','".$new_name."','".$description_g."','".$slidecategories."','".$section."', '".strtotime('now')."')") or die(db_conn_error);
 
 if (mysqli_affected_rows($connect) == 1) {
			
			$_POST = array();
			$_FILES = array();
			unset($_FILES['slideimage'], $_SESSION['images']);
					
		echo '<br><br><h2 class="text-success text-center">Upload was successful!!!</h2>';
			}
 

 
 
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
                        <h2> Upload Product</h2>
                    </div>
              


			
				<form action="" method="POST" enctype="multipart/form-data">		
				
						<?php if(array_key_exists('slide_name', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_name'].'</small>';}?>
						<input required = "required" name="slide_goods_name" type="text" placeholder="Product name" value="<?php if(isset($_POST['slide_goods_name'])){echo $_POST['slide_goods_name'];} ?>"/>
						
						 <?php if(array_key_exists('slide_price', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_price'].'</small>';}?>
						<br><small><em>(optional)</em></small>
						<input name="slide_price" type="text" placeholder="Product Price e.g 13000" value="<?php if(isset($_POST['slide_price'])){echo $_POST['slide_price'];} ?>" />
						
						
						
						<?php $select_from_cat = mysqli_query($connect,"SELECT cat_name FROM category") or die(db_conn_error); ?>
						
						<?php if(array_key_exists('slide_categories', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_categories'].'</small>';}?>
						
						<div class="row" style="margin-bottom:25px;">
						<div class="col-lg-12">
						
						
						<select name="slide_categories" class="">
						<option>Choose category</option>
						<?php 
							
							while($row_loop = mysqli_fetch_array($select_from_cat)){
							
							$sel = (isset($_POST['slide_categories']) AND $_POST['slide_categories'] == $row_loop['cat_name'])?'selected="selected"':'';
							//if(isset($_POST['slide_categories'])){$sel = 'selected="selected"';}else{$sel = '';}
							echo '<option '.$sel.'>'.$row_loop['cat_name'].'</option>';
						}
						
						?>
						
						</select>
						
						</div>
						</div>
						
						
						
						
						
						
                  
				   <?php if(array_key_exists('section_error_key', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['section_error_key'].'</small>';}?>
						
						<div class="row" style="margin-bottom:25px;">
						<div class="col-lg-12">
						 
						 <select class="section" name="section">
						 <option>Choose section</option>
						
						<?php
								
								$productssection_array= array('Latest Products', 'Top Selling Products', 'Top Rated Products');
								
								if(isset ($_POST['section'])){
									foreach ($productssection_array as $productssection){
									$productsselsection = ($productssection==$_POST['section'])?"Selected='selected'":"";
									echo '<option '.$productsselsection.'>'.$productssection.'</option>';}
								}else{
									foreach ($productssection_array as $productssection){
									echo '<option>'.$productssection.'</option>';
									}
									}
						?>

						 </select>
						
						</div>
						</div>
						
						
						
						<?php if(array_key_exists('description', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['description'].'</small>';}?>
						<br><small><em>(optional)</em></small>
                         <textarea name="description" placeholder="Enter description"><?php if(isset($_POST['description'])){echo $_POST['description'];} ?></textarea>
						
					
					<?php if(array_key_exists('file_size', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['file_size'].'</small>';}?>
					<?php if(array_key_exists('wrong_upload', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['wrong_upload'].'</small>';}?>
					<?php if(array_key_exists('not_moved', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['not_moved'].'</small>';}?>
					<br><small><em>(optional)</em></small>
						<div class=""><small>Please only upload square-size images</small></div>
							<input type="file" id="slide_1_image_1" name="slideimage" class="form-control"/>
						 
						
                        
                        <button type="submit" name="uploadslide" class="btn btn-secondary">Upload Product</button><br><br><br>
                    

			
            </form>
		
			</div>
			
			
			
			<?php
			
			
			?>
            
			
			
			
			
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