<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Hello <strong>!</strong></h2>
					 <h5 class="text-center"><p>From Account page you have the ability to view of your recent account activity and update your account information. Select a link below to edit information.</p></h5>	    				    				
					</div>
				</div>			 		
			</div>    	
    	 	
	    <!-- Main Content -->
        <div class="content">
        <div class="row">
        <div class="container">
            <!-- content -->
            <div class="form-one">
                <h3 class="subtitle" >User Information</h3>
                <form>
                    <input type="text" value="<?=$_SESSION['user_data']['name']?>" disabled="disabled">
                    <input type="text" value="<?=$_SESSION['user_data']['mail']?>" disabled="disabled">
                    <input type="text" value="********" disabled="disabled">
        			<select class="form-control">
						<?php
						foreach ($viewmodel[0] as $item) {
							?>
							<option class=""><?=$item['address']?></option>
							<?php
						}
						?>

					</select>
				</form>
					<ul class="cd-box">
						<footer class="show">
							<a href="#0" class="btn btn-primary"><i class="fa fa-pencil"></i> Manage Persional Information</a></footer></ul>
							<div class="cd-form">
								<form action="" method="post">
									<fieldset>
									<legend>Change Account Information</legend>
										<div>
											<label for="userEmail">Email</label>
											<input type="Email" id="userEmail" name="user_mail" placeholder="<?=$_SESSION['user_data']['mail']?>" disabled>
										</div>
										<div>
											<label for="userPassword">Address</label>
											<input type="text" id="userPassword" name="user_address" placeholder="Add your Address">
										</div>
										<div>
											<label for="userPassword">Password</label>
											<input type="Password" id="userPassword" name="user_pass">
										</div>
										<div>
											<label for="userPassword">Change Password</label>
											<input type="Password" id="userPasswordre" name="new_user_pass" placeholder="Leave it blank if you dont want to change password">
										</div>
									</fieldset>

									<fieldset>
										<div>
											<input type="submit" name="submit" value="Save">
										</div>
									</fieldset>
								</form>
								<a href="#0" class="cd-close"></a> <!-- just close when click on x button or ouside table -->
							</div> <!-- .cd-form -->
							<div class="cd-overlay"></div> 
            </div> 
                                   	
            <div class="form-two">
                <h3 class="subtitle">Payment Menthod</h3>

					<div class="checkout-option">
						<div class="accepted">
							<span><img src="<?=ROOT_PATH?>/assets/images/Z5HVIOt.png"></span>
							<span><img src="<?=ROOT_PATH?>/assets/images/Le0Vvgx.png"></span>
							<span><img src="<?=ROOT_PATH?>/assets/images/D2eQTim.png"></span>
							<span><img src="<?=ROOT_PATH?>/assets/images/ewMjaHv.png"></span>
							<span><img src="<?=ROOT_PATH?>/assets/images/3LmmFFV.png"></span>
						</div>
					</div>
					<div class="master-card-info">
						<form action="" method="post">
							<div class="form-group">
								<br><label>Name on Card</label>
								<input type="text" class="form-control" name="card_holder" id="card_holder">            
							</div>      
							<div class="cardtype form-group">
								<label>Credit Card Type</label>
								<select class="form-control" name="card_type" id="card_type">
									<option>--Please Select--</option>
									<option>American Express</option>
									<option>Visa</option>
									<option>MasterCard</option>
									<option>Discover</option>
									<option>Cirrus</option>
								</select>
							</div>

							<div class="form-group">
								<label>Credit Card Number</label>
									<input type="text" class="form-control" name="card_number" id="card_number">            
							</div>  

							<div class="expirationdate form-group">
								<label>Expiration Date</label>
									<select class="form-control month-select" name="valid_month" id="valid_month">
										<option>Month</option>
										<option value="01">01 - January</option>
										<option value="02">02 - February</option>
										<option value="03">03 - March</option>
										<option value="04">04 - April</option>
										<option value="05">05 - May</option>
										<option value="06">06 - June</option>
										<option value="07">07 - July</option>
										<option value="08">08 - August</option>
										<option value="09">09 - September</option>
										<option value="10">10 - October</option>
										<option value="11">11 - November</option>
										<option value="12">12 - December</option>
									</select>
									<select class="form-control year-select" name="valid_year" id="valid_year">
										<option>Year</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
									</select>
							</div>
							
							<div class="verificationcard form-group">
								<label>Card Verification Number</label>
									<input type="text" class="form-control" name="cve" id="cve">
							</div>     
							<button type="submit" value="submit_payment" class="btn btn-primary" name="submit">Save</button>
						</form>                            
					</div>

			</div>
		
		</div>
		</div>
		</div>
    </div> 
    <i id="get_card_holder" style="display: none;"><?=$viewmodel['1']['card_holder']?></i>
    <i id="get_card_type" style="display: none;"><?=$viewmodel['1']['card_type']?></i>
    <i id="get_card_number" style="display: none;"><?=$viewmodel['1']['card_number']?></i>
    <i id="get_valid_month" style="display: none;"><?=$viewmodel['1']['valid_month']?></i>
    <i id="get_valid_year" style="display: none;"><?=$viewmodel['1']['valid_year']?></i>
    <i id="get_cve" style="display: none;"><?=$viewmodel['1']['cve']?></i>

    <script>
    	var card_holder = document.getElementById('get_card_holder').innerHTML;
    	var card_type = document.getElementById('get_card_type').innerHTML;
    	var card_number = document.getElementById('get_card_number').innerHTML;
    	var valid_month = document.getElementById('get_valid_month').innerHTML;
    	var valid_year = document.getElementById('get_valid_year').innerHTML;
    	var cve = document.getElementById('get_cve').innerHTML;

    	document.getElementById('card_holder').value = card_holder;
    	document.getElementById('card_type').value = card_type;
    	document.getElementById('card_number').value = card_number;
    	document.getElementById('valid_month').value = valid_month;
    	document.getElementById('valid_year').value = valid_year;
    	document.getElementById('cve').value = cve;

    </script>