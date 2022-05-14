<?php
require"../incs_gen3/config.php";
if(!isset($_SESSION['user_id'])){
header("Location:".GEN_WEBSITE);
exit();	
}

include("../incs_gen3/cookie_for_most.php");
include"../incs_gen3/header.php";
?>


 <div class="contact-form spad">
        <div class="container">
            
			<div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Subscribers List</h2>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
              
				<div class="row">
					
                    <div class="col-lg-6 col-md-6">
                      <small>Phone numbers</small>
                          <?php $sub_nos = mysqli_query($connect,"SELECT sub_phone FROM subscribers") or die(db_conn_error);  ?>
						 <textarea><?php while($num_rows = mysqli_fetch_array($sub_nos)){echo $num_rows['sub_phone'].", ";}?></textarea>
                    </div>
                   
					 <div class="col-lg-6 col-md-6">
                      <small>Email addresses</small>
                          <?php $sub_nos1 = mysqli_query($connect,"SELECT sub_email FROM subscribers") or die(db_conn_error);  ?>
						 <textarea><?php while($num_rows1 = mysqli_fetch_array($sub_nos1)){echo $num_rows1['sub_email'].", ";}?></textarea>
                    </div>
				</div>
				
		
            </form>
			</div>
        </div>















			</div>
            </div>
        </div>
    </section>

	
 
	
	
<?php include"../incs_gen3/footer.php"; ?>