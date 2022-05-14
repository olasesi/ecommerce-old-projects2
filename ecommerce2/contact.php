<?php
$active = "Contact";
require"../incs_gen3/config.php";
include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";
?>
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Contact</h2>
                    </div>
                 
				 
				 
				 <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span style="color:<?php  echo $BRAND_COLOR;?>;" class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p><?php echo $TEL; ?></p>
						<p><?php echo $TEL2; ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span style="color:<?php  echo $BRAND_COLOR;?>;" class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p><?php echo $ADDRESS; ?></p>
						<p><?php echo $ADDRESS2; ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span style="color:<?php  echo $BRAND_COLOR;?>;" class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>24/7</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span style="color:<?php  echo $BRAND_COLOR;?>;" class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p><?php echo $EMAIL; ?></p>
						<p><?php //echo $EMAIL_CUSTOM; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
				 
				 
                </div>
            </div>
           
        </div>
    
</section>


</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>