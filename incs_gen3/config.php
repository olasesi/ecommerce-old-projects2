<?php
date_default_timezone_set('UTC');
session_start();

//Website name without www and .com
$website_name = "ijenwafertilityandwombmassage";
//first eight characters of website name and end with underscore
//$website_name_part ="ijenwafe_";
$website_name_part ="3gen_shop";
//Website name without www and .com and words spaced
$website_name_with_spaces = "Ijenwa Fertility and Womb Massage";
//Enter a description of your business. Not too short and not too long.
define("PAGE_DESCRIPTION","
We use natural herbs to treat all kinds of male and female infertility. We also use traditional womb setting. Our herbs are 100% effective.
");
//Enter the key words
define("KEY_WORDS","
natural, herbs, male, female, infertility, trditional, womb, setting, effective
");

//Enter your main phone number.
$TEL = "08062341177";
//Enter your second phone number.
$TEL2 = "";
//Enter your email address.
$EMAIL = "ijenwafertilityandwombmassagemassage@gmail.com";
//Enter your facebook link. 
$FB_LINK = "";
//Enter your instagram link.
$INSTAGRAM_LINK = "https://www.instagram.com/tv/CUzINVnpub4/?utm_medium=copy_link";
//Enter your whatsapp link.
$WHATSAPP_LINK = "https://wa.me/message/VBMJ54KZMESZJ1";
//Enter your business address.
$ADDRESS = "Delivery is Nationwide";
//Enter your  second business address.
$ADDRESS2 ="";
//Text logo ie website name. This is if you dont have a logo
$LOGO_NAME_TEXT = "Ijenwa Fertility <br>and Womb Massage";
//brand color:
$BRAND_COLOR = "#00be0d";
//price tag color
$BRAND_COLOR_SUB = "#1111ff";
//price tag color
$BRAND_PRICE_COLOR = "#ffffff";
//Logo isge filenama eg logo.jpg.
$LOGO_IMG_FILENAME = "";
//cover image filename
$CAROUSEL_IMAGE_FILENAME = "2.jpg";		//870px x 431px
//Password
$pass_word = "";
		


///////CAROUSEL PART///////
//$CAROUSEL_DESC1 = "";      //call to action or collect details.
//$CAROUSEL_DESC2 = "";
//$CAROUSEL_DESC3 = "";




define("db_conn_error","<div>
					<h1 id='oops_h1'>Oops!!!</h1>
					<h1>We are sorry</h1>
					<h3>Data could not be fetched at this moment</h3>
					</div>");

//$website_name_part.'admin'------>username
//$website_name_part.'admin'------>database

$connect = mysqli_connect('localhost','root',$pass_word,$website_name_part) or die(db_conn_error);		
$data_select = mysqli_select_db($connect,$website_name_part) or die(db_conn_error);


//$connect = mysqli_connect('localhost',$website_name_part.'admin',$pass_word,$website_name_part.'admin') or die(db_conn_error);
//$data_select = mysqli_select_db($connect,$website_name_part.'admin') or die(db_conn_error);



define("GEN_WEBSITE","http://www.".$website_name.".com.ng");      //Enter your website name eg www.designsbyblocks.com.ng.
define("SITE_NAME_NO_WWW", $website_name_with_spaces); //Enter the name of your website logo eg designs by blocks.
define("TITLE", $website_name_with_spaces);            //Enter your website title eg welcome to designs by blocks.

//$EMAIL_CUSTOM = "sales@".$website_name.".com.ng";	//Your email address


?>