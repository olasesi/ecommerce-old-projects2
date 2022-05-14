<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");

if(!isset($_SESSION['user_id'])){
	header("Location:".GEN_WEBSITE);
	exit();
}

if(!isset($_GET['cat'])){
	$_GET['cat'] = "";
	}


include"../incs_gen3/header.php";

?>


	
			
			<?php
			
$edit_error = array();
$query_confirm = mysqli_query($connect,"SELECT * FROM category WHERE cat_name = '".mysqli_real_escape_string($connect,$_GET['cat'])."' AND cat_name != 'Others'") or die(db_conn_error);
$current_catname = mysqli_fetch_array($query_confirm);		
$single_catname = $current_catname['cat_name'];

if(mysqli_num_rows($query_confirm) == 1){	

			

if (isset($_POST['edit_button']) AND $_SERVER['REQUEST_METHOD'] == "POST"){

	if( preg_match('/^[a-z0-9]{3,25}$/i',$_POST['edit_cat']))
	{$fn = mysqli_real_escape_string($connect,ucwords(trim($_POST['edit_cat'])));}
	else{ 
	$edit_error['error'] = "Enter valid characters not more than 25. Use just one word.";}
	
	
	
	if(empty($edit_error)){
	$used = mysqli_query($connect,"SELECT * FROM category WHERE cat_name ='".$fn."'") or die(db_conn_error);
	if (mysqli_num_rows($used)== 0){
	$done = mysqli_query($connect,"UPDATE category SET cat_name ='".$fn."' WHERE cat_name = '".$_GET['cat']."'") or die(db_conn_error);
	$edit_success = 'Category name has been edited sucessfully';
	}else{
	$already_exist = 'Category name already exists';
		}
}
}




}else{
	$doesnot_exist ='Category name does not exist';
}			
			?>
			
	<div class="contact-form spad">
        <div class="container">
            
			
			
			<div class="row">
			 <div class="col-lg-6">
			 <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2> Edit Category</h2>
                    </div>
                </div>
            </div>
			
 <form action="" method="POST">		

 <div class="col-lg-12 col-md-12">
                       <?php if(array_key_exists('error', $edit_error)){echo '<p class="text-center  text-danger">'.$edit_error['error'].'</p>';}?>
					   <?php if(isset($edit_success)){echo '<p class="text-center  text-success">'.$edit_success.'</p>';}?>
						<?php if(isset($already_exist)){echo '<p class="text-center  text-danger">'.$already_exist.'</p>';}?>
						<?php if(isset($doesnot_exist)){echo '<p class="text-center  text-danger">'.$doesnot_exist.'</p>';}?>
						<input name="edit_cat" type="text" placeholder="Edit category" value="<?php if(!isset($_POST['edit_cat'])){ echo $single_catname;}else{echo $_POST['edit_cat'];} ?>">
						 
                    </div>
                    
                    <div class="col-lg-12 text-center">
                        
                        <button type="submit" name="edit_button" class="btn btn-secondary">Edit Category</button><br><br><br><br>
                    </div>

			
            </form>
			</div>
			
			
			
			<?php
			
			if(mysqli_num_rows($query_confirm) == 1){	
			 if(isset($_POST['delete']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
			 
			
			$changing = mysqli_query($connect,"UPDATE goods SET categories='Others' WHERE categories='".mysqli_real_escape_string($connect,$_GET['cat'])."'") or die(db_conn_error);
			$deleting = mysqli_query($connect,"DELETE FROM category WHERE cat_name = '".mysqli_real_escape_string($connect,$_GET['cat'])."'") or die(db_conn_error);
			
			$delete_success = 'This category has been deleted successfully. Items in its category has been moved to "Others" category';
			 
			 }
			}else{
				$delete = 'Category name does not exist';
			}
			?>
            
			
			
			
			<div class="col-lg-6">
			
			 <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2> Delete Category</h2>
                    </div>
                </div>
            </div>
			
		<form action="" method="POST">
               
				
					
                    <div class="col-lg-12 col-md-12">
					
					<?php if(isset($delete_success)){echo '<p class="text-center  text-success">'.$delete_success.'</p>';} ?>
					<?php if(isset($delete)){echo '<p class="text-center  text-danger">'.$delete.'</p>';} ?>
					<input class="form-control"  type="text" placeholder="<?php if(isset($single_catname)){echo $single_catname;} ?>" disabled>  
					
                       
                    </div>
                    
                    <div class="col-lg-12 text-center">
                        <!--<textarea placeholder="Your message"></textarea>-->
                        <button type="submit" name="delete" class="btn btn-secondary">Delete Category</button><br><br><br><br>
                    </div>
               
				
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