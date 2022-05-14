<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
?>
<?php
if(!isset($_GET['id'])){
	$_GET['id']="";
}
$select_edit = mysqli_query($connect,"SELECT * FROM goods WHERE goods_id ='".mysqli_real_escape_string($connect,$_GET['id'])."'")or die(db_conn_error);
if(!isset($_SESSION['user_id']) or mysqli_num_rows($select_edit) == 0 ){
	header("Location:index.php");
	exit();
}

include"../incs_gen3/header.php";
?>

<?php
$goods_array = mysqli_fetch_array($select_edit);
$var_name = $goods_array['goods_name'];
$var_price = $goods_array['goods_price'];
$var_desc = $goods_array['description'];
$var_cat = $goods_array['categories'];
$var_sec = $goods_array['section'];
$var_file = $goods_array['file_name_goods'];

$reg_errors_slider = array();
if(isset($_POST['edit']) AND $_SERVER['REQUEST_METHOD']== "POST" ){

if (preg_match ('/^.{3,20}$/i', trim($_POST['goods_name']))) {		//only 20 characters are allowed to be inputted
		$slidegoodname = mysqli_real_escape_string ($connect, trim($_POST['goods_name']));
	
	} else {
		$reg_errors_slider['slide_name'] = 'Maximum characters, 20';
	} 

if(!empty($_POST['goods_price'])){
	if (preg_match ('/^[0-9]{1,10}$/', trim($_POST['goods_price'])))  {	// OR empty(trim($_POST['slide_price']))
		$slideprice = mysqli_real_escape_string ($connect,trim($_POST['goods_price']));
		} else {
		$reg_errors_slider['edit_price'] = 'Please enter valid characters e.g 13000';
		}
}else{
		$slideprice = $_POST['goods_price'];
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
			


if(empty($reg_errors_slider)){

$q = mysqli_query($connect,"UPDATE goods SET goods_name = '".$slidegoodname."', goods_price = '".$slideprice."', description = '".$description_g."', categories = '".$slidecategories."', section = '".$section."' WHERE goods_id = '".mysqli_real_escape_string($connect,$_GET['id'])."'") or die(db_conn_error);
 
 if (mysqli_affected_rows($connect) == 1) {
			
			$_POST = array();
			$_FILES = array();
		
					
		echo '<br><br><h2 class="text-success text-center">Edit was successful!!!</h2>';
			}
 
}

}


$reg_errors_slider2 = array();
if(isset($_POST['edit_image']) AND $_SERVER['REQUEST_METHOD']== "POST"){
	
	if (is_uploaded_file($_FILES['slideimage1']['tmp_name']) AND $_FILES['slideimage1']['error'] == UPLOAD_ERR_OK){ 
		
			if($_FILES['slideimage1']['size'] > 1048576){ 		//conditions for the file size 1MB
				$reg_errors_slider1['file_size1']="File size is too big. Max file size 1MB";
			}
		
			$allowed_extensions1 = array('jpeg', '.png', '.jpg', '.JPG', 'JPEG', '.PNG');		
			$allowed_mime1 = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/x-png');
			$image_info1 = getimagesize($_FILES['slideimage1']['tmp_name']);
			$ext1 = substr($_FILES['slideimage1']['name'], -4);
			
			
			
			
			if (!in_array($_FILES['slideimage1']['type'], $allowed_mime1) || !in_array($image_info1['mime'], $allowed_mime1) || !in_array($ext1, $allowed_extensions1)){
				$reg_errors_slider1['wrong_upload1'] = "Please choose jpg or png file type. GIF images are not allowed.";
				
			}
			
		}
 		
	
	
	
	if(empty($reg_errors_slider1)){
	if($_FILES['slideimage1']['error'] == UPLOAD_ERR_OK){
			$new_name1= (string) sha1($_FILES['slideimage1']['name'] . uniqid('',true));
			$new_name1 .= ((substr($ext1, 0, 1) != '.') ? ".{$ext1}" : $ext1);
			$dest = "img/products/".$new_name1;
			
			if (move_uploaded_file($_FILES['slideimage1']['tmp_name'], $dest)){
			
			$_SESSION['images1']['new_name'] = $new_name1;
			$_SESSION['images1']['file_name'] = $_FILES['slideimage1']['name'];
			
	
		
			
			} else {
			trigger_error('The file could not be moved.');
			$reg_errors_slider1['not_moved1'] = "The file could not be moved.";
			unlink ($_FILES['slideimage1']['tmp_name']);
			}
			}
 
if(empty($reg_errors_slider1)){

if(!array_key_exists('not_moved1', $reg_errors_slider)){	
if($var_file != "goods_serv_pix.jpg"){
		unlink ('img/products/'.$var_file);
	}
}
	
$new_name1 = ((isset($_SESSION['images1']['new_name']))? $_SESSION['images1']['new_name']:"goods_serv_pix.jpg");
$q1 = mysqli_query($connect,"UPDATE goods SET file_name_goods = '".$new_name1."' WHERE goods_id = '".mysqli_real_escape_string($connect,$_GET['id'])."'") or die(db_conn_error);
 
 if (mysqli_affected_rows($connect) == 1) {
			
			$_POST = array();
			$_FILES = array();
			unset($_FILES['slideimage1'], $_SESSION['images1']);
					
		echo '<br><br><h2 class="text-success text-center">Image change was successful!!!</h2>';
			}
 

 
 
 }
 
 
 }
 
 
 }	
	
	
















?>

<div class="contact-form spad">
        <div class="container">
            
			<div class="row">
                <div class="col-lg-9 col-sm-9">
                    <div class="contact__form__title">
                        <h2> Edit Details</h2>
                    </div>
               
            <form action="" method="POST">
               
			
                        <?php if(array_key_exists('slide_name', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_name'].'</small>';}?>
						<input name="goods_name" type="text" placeholder="Goods name" value="<?php if(!isset($_POST['goods_name'])){echo $var_name;}else {echo $_POST['goods_name'];}?>">
						
                  
                        <?php if(array_key_exists('edit_price', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['edit_price'].'</small>';}?>
						<br><small><em>(optional)</em></small>
						<input name="goods_price" type="text" placeholder="Product Price e.g 13000" value="<?php if(!isset($_POST['goods_price'])){echo $var_price;}else {echo $_POST['goods_price'];} ?>" />
						
			
				  <?php $select_from_cat = mysqli_query($connect,"SELECT cat_name FROM category") or die(db_conn_error); ?>
				  <?php if(array_key_exists('slide_categories', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['slide_categories'].'</small>';}?>
				  
				<div class="row" style="margin-bottom:25px;">
					<div class="col-lg-12">
                      
						
						<select name="slide_categories" class="">
						<option>Choose category</option>
						<?php 
						
					
						if(!isset($_POST['slide_categories'])){
							
							while($row_loop = mysqli_fetch_array($select_from_cat)){
							 
							$sel = ($var_cat == $row_loop['cat_name'])?'selected="selected"':"";
							
							
							echo '<option ' .$sel.'>'.$row_loop['cat_name'].'</option>';
						}
						}else{
							while($row_loop1 = mysqli_fetch_array($select_from_cat)){
							$sel1 = ($row_loop1['cat_name'] == $_POST['slide_categories'])?'selected="selected"':"";
							echo '<option ' .$sel1.'>'.$row_loop1['cat_name'].'</option>';
						}
						
						}
						?>
						
						</select>
						
						<?php 
						
						if(isset($login_array['email_error'])){echo '<span style="color:red">'.$login_array['email_error'].'<span>';}?>
                    </div>
                </div>
				
				 <?php if(array_key_exists('section_error_key', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['section_error_key'].'</small>';}?>
						
						<div class="row" style="margin-bottom:25px;">
						<div class="col-lg-12">
						 
						 <select class="section" name="section">
						 <option>Choose section</option>
						
						<?php
							
								$productssection_array= array('Latest Products', 'Top Selling Products', 'Top Rated Products');
								
								foreach ($productssection_array as $productssection){
								if(!isset ($_POST['section'])){
									
									$productsselsection = ($productssection==$var_sec)?"Selected='selected'":"";
									
								}else{
									$productsselsection = ($productssection==$_POST['section'])?"Selected='selected'":"";
									}
								echo '<option '.$productsselsection.'>'.$productssection.'</option>';
								}
						?>

						 </select>
						
						</div>
						</div>
				
				
						<?php if(array_key_exists('description', $reg_errors_slider)){echo '<small class="text-danger">'.$reg_errors_slider['description'].'</small>';}?>
						<br><small><em>(optional)</em></small>
                         <textarea name="description" placeholder="Enter description"><?php if(!isset($_POST['description'])){echo $var_desc;}else {echo $_POST['description'];} ?></textarea>
						
					
						
						
						
					 <button type="submit" name="edit" class="btn btn-secondary">Edit Details</button><br><br><br>	
                
            </form>
			</div>
        </div>
		</div>
		</div>
		
		
		
		
	<div class="contact-form spad">
        <div class="container">
            
			<div class="row">
                <div class="col-lg-9 col-sm-9">
                    <div class="contact__form__title">
                        <h2> Change Image</h2>
                    </div>
               
            <form action="" method="POST" enctype="multipart/form-data">
               
					<?php if(array_key_exists('file_size', $reg_errors_slider2)){echo '<small class="text-danger">'.$reg_errors_slider2['file_size'].'</small>';}?>
					<?php if(array_key_exists('wrong_upload', $reg_errors_slider2)){echo '<small class="text-danger">'.$reg_errors_slider2['wrong_upload'].'</small>';}?>
					<?php if(array_key_exists('not_moved', $reg_errors_slider2)){echo '<small class="text-danger">'.$reg_errors_slider2['not_moved'].'</small>';}?>
					<br><small><em>(optional)</em></small>
						<div class=""><small>Please only upload square-size images</small></div>
							<input type="file" id="slide_1_image_1" name="slideimage1" class="form-control"/>
						 
						
						
						
					 <button type="submit" name="edit_image" class="btn btn-secondary">Change Image</button><br><br><br>	
                
            </form>
			</div>
        </div>
		</div>
		</div>
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	 </div>
            </div>
        </div>
    </section>

<?php include"../incs_gen3/footer.php"; ?>