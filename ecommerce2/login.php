<?php
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
?>
<?php
if(isset($_SESSION['user_id'])){
	header("Location:index.php");
	exit();
}
?>
<?php
$login_array = array();
if(isset($_POST['login']) AND $_SERVER['REQUEST_METHOD']== "POST" ){

if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
	$em = mysqli_real_escape_string($connect,$_POST['email']);
}else{
	$login_array['email_error'] = "Enter a valid email";
}

if(preg_match('/^.{6,100}$/i',$_POST['password'])){
	$pw =  mysqli_real_escape_string($connect,$_POST['password']);
}else{
	$login_array['password_error'] = "Enter a password greater than 5 characters";
}



if(empty($login_array)){
		$vl =  mysqli_query($connect, "SELECT * FROM users WHERE(email='".$em."' AND password='".$pw."' AND active='1' )") or die(db_conn_error);
		if(mysqli_num_rows($vl)== 1){
		 $row = mysqli_fetch_array($vl,MYSQLI_NUM);
		 
		 $value = md5(uniqid(rand(), true));
		 $query_confirm_sessions = mysqli_query ($connect, "SELECT cookie_sessions FROM users WHERE email='".$em."' AND active = '1'") or die(db_conn_error);
	$cookie_value_if_empty = mysqli_fetch_array($query_confirm_sessions);
	
	if (empty($cookie_value_if_empty[0])){
	mysqli_query($connect,"UPDATE users SET cookie_sessions = '".$value."' WHERE email='".$em."' AND active = '1'") or die(db_conn_error);		
	setcookie("remember_me", $value, time() + 360);	//session time out is 5 min
	
	}else if(!empty($cookie_value_if_empty[0])){
	
	setcookie("remember_me", $cookie_value_if_empty[0], time() + 360);	
	}
	
		 
		 $_SESSION['user_id'] = $row[0];
		 $_SESSION['firstname'] = $row[2];
		 $_SESSION['lastname'] = $row[3];
		 $_SESSION['email'] = $row[4];
		 
		 header("Location:index.php"); exit;
		}else{ 
		 $login_array['password_mismatch']= "Email and password do not match";}
}
}
include"../incs_gen3/header.php";
?>
<!--<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                           
                        </div>
                    </div>-->
               
    <!-- Hero Section End -->


 <!-- Contact Form Begin -->
 
    <div class="contact-form spad">
        <div class="container">
            
			<div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2> Admin Login</h2>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
               <?php if(isset($login_array['password_mismatch'])){echo '<span style="color:red">'.$login_array['password_mismatch'].'<span>';}?>
				<div class="row">
					
                    <div class="col-lg-6 col-md-6">
                        <input name="email" type="text" placeholder="Email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>">
						 <?php if(isset($login_array['email_error'])){echo '<span style="color:red">'.$login_array['email_error'].'<span>';}?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input name="password" type="password" placeholder="Password">
						<?php if(isset($login_array['password_error'])){echo '<span style="color:red">'.$login_array['password_error'].'<span>';}?>
                    </div>
                    <div class="col-lg-12 text-center">
                        <!--<textarea placeholder="Your message"></textarea>-->
                        <button type="submit" name="login" class="site-btn" style="background:<?php  echo $BRAND_COLOR;?>;">Login</button>
                    </div>
               
				</div>
            </form>
			</div>
        </div>
  
    <!-- Contact Form End -->
	
	 </div>
            </div>
        </div>
    </section>

<?php include"../incs_gen3/footer.php"; ?>