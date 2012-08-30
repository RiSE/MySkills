<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
    </script>
<?php endif; ?>

<div id="subheader">
    <div class="inner">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</div>

<div id="subpage">	
 <div class="container">
	 <div class="row">
			  <div class="span9">
			  		<?php if ($this->session->flashdata('error_message') != '') : ?>
		                <div class="alert alert-error">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>Oh snap!</strong> <?php echo $this->session->flashdata('error_message'); ?>
		                </div>
            		<?php endif; ?>

		            <?php if ($this->session->flashdata('success_message') != '') : ?>
		                <div class="alert alert-success">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>Well done!</strong> <?php echo $this->session->flashdata('success_message'); ?>
		                </div>
		            <?php endif; ?>
			    <form method="POST" class="form-horizontal" name="frmEditProfile">
			   	    <legend>Legend</legend>
					  <label>First Name</label>
					  <input type="text" placeholder="First Name" class="span4" name="name" value="<?php echo $user->name; ?>"/>
					  <label>Last name</label>
					  <input type="text" placeholder="Last name" class="span4" name="surname" value="<?php echo $user->surname; ?>"/>
					  <label>E-mail</label>
					  <span class="add-on"><i class="icon-envelope"></i><span><input type="text" placeholder="E-mail" class="span4" name="email" value="<?php echo $user->email; ?>" />
					  <label>I want a position as:</label>
					  		<label class="checkbox inline">
							  <input type="checkbox" name="trainee" <?php if($user->trainee == "1"){ echo "checked = 'checked'";}?> value="1"/>
							 Trainee
							</label>
                            <label class="checkbox inline">
							  <input type="checkbox" name="employee" <?php if($user->employee == "1"){ echo "checked = 'checked'";}?> value="1"/>
							  Employee
							</label>
                            <label class="checkbox inline">
							  <input type="checkbox" name="freelancer" <?php if($user->freelancer == "1"){ echo "checked = 'checked'";}?> value="1"/>
							  Freelancer
							</label>
					  
					  <label>I am avaliable to work in:</label>
					  <label class="checkbox inline">
							  <input name="anotherCity" type="checkbox" <?php if($user->another_city == "1"){ echo "checked = 'checked'";}?> value="1"/>
							 Another City
							</label>
							<label class="checkbox inline">
							  <input type="checkbox" name="anotherCountry" <?php if($user->another_country == "1"){ echo "checked = 'checked'";}?> value="1"/>
							  Another Country
							</label>
					  <label>State</label>
					  		<select name="state">
							  <option value="">select your state</option>
							  <option value="AC" <?php if($user->state == "AC"){ echo "selected = 'selected'";}?> >AC</option>
							  <option value="AL" <?php if($user->state == "AL"){ echo "selected = 'selected'";}?>>AL</option>
							  <option value="AM" <?php if($user->state == "AM"){ echo "selected = 'selected'";}?>>AM</option>
							  <option value="BA" <?php if($user->state == "BA"){ echo "selected = 'selected'";}?>>BA</option>
							  <option value="CE" <?php if($user->state == "CE"){ echo "selected = 'selected'";}?>>CE</option>
							  <option value="DF" <?php if($user->state == "DF"){ echo "selected = 'selected'";}?>>DF</option>
							  <option value="ES" <?php if($user->state == "ES"){ echo "selected = 'selected'";}?>>ES</option>
							  <option value="GO" <?php if($user->state == "GO"){ echo "selected = 'selected'";}?>>GO</option>
							  <option value="MA" <?php if($user->state == "MA"){ echo "selected = 'selected'";}?>>MA</option>
							  <option value="MT" <?php if($user->state == "MT"){ echo "selected = 'selected'";}?>>MT</option>
							  <option value="MS" <?php if($user->state == "MS"){ echo "selected = 'selected'";}?>>MS</option>
							  <option value="MG" <?php if($user->state == "MG"){ echo "selected = 'selected'";}?>>MG</option>
							  <option value="PA" <?php if($user->state == "PA"){ echo "selected = 'selected'";}?>>PA</option>
							  <option value="PB" <?php if($user->state == "PB"){ echo "selected = 'selected'";}?>>PB</option>
							  <option value="PR" <?php if($user->state == "PR"){ echo "selected = 'selected'";}?>>PR</option>
							  <option value="PE" <?php if($user->state == "PE"){ echo "selected = 'selected'";}?>>PE</option>
							  <option value="PI" <?php if($user->state == "PI"){ echo "selected = 'selected'";}?>>PI</option>
							  <option value="RJ" <?php if($user->state == "RJ"){ echo "selected = 'selected'";}?>>RJ</option>
							  <option value="RN" <?php if($user->state == "RN"){ echo "selected = 'selected'";}?>>RN</option>
							  <option value="RS" <?php if($user->state == "RS"){ echo "selected = 'selected'";}?>>RS</option>
							  <option value="RO" <?php if($user->state == "RO"){ echo "selected = 'selected'";}?>>RO</option>
							  <option value="RR" <?php if($user->state == "RR"){ echo "selected = 'selected'";}?>>RR</option>
							  <option value="SC" <?php if($user->state == "SC"){ echo "selected = 'selected'";}?>>SC</option>
							  <option value="SP" <?php if($user->state == "SP"){ echo "selected = 'selected'";}?>>SP</option>
							  <option value="SE" <?php if($user->state == "SE"){ echo "selected = 'selected'";}?>>SE</option>
							  <option value="TO" <?php if($user->state == "TO"){ echo "selected = 'selected'";}?>>TO</option>
							</select>
					  <label>1 minute introduction (youtube):</label>
					  <input type="text" placeholder="http://www.youtube.com/watch?v=" class="span4" name="video_url" value="<?php echo $user->video_url; ?>"/>
					  <label>Vizify portfolio:</label>
					  <input type="text" placeholder="http://www.vizify.com/your-username" class="span4" name="vizify_portfolio" value="<?php echo $user->vizify_portfolio; ?>"/>
					  
					  <label>
					  	<button type="submit" class="btn btn-primary">Submit</button>
					  </label>
				</form>
			  </div><!-- span9 -->
			      <div class="span3">
			      	   <div class="sidebar">
	                        <h4>
	                        	<span class="slash">Applicants (Coming Soon)</span>
	                        </h4><!-- h4 -->
	                        <p>Are you the only one who wants to work in this company? Find out here.</p>
	                        <h4>
	                        	<span class="slash">Skill Points (Coming Soon)</span>
	                        </h4><!-- h4 -->
	                        <p>The developers in this company are skilled? Here you find how many skill points this company has.</p>
	                        <h4>
	                        	<span class="slash">Wishlist (Coming Soon)</span>
	                        </h4><!-- h4 -->
	                        <p>Do you wish to work in a specific company? Add it to your Wishlist and we might help you.</p>

		               </div><!-- sidebar -->
			      </div><!-- span3 -->
	 </div><!-- row -->
</div> <!-- container -->
</div><!-- Subpage -->