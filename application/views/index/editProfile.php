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
					 <div class="control-group">
					  	<label class="control-label">First Name</label>
					  	<div class="controls">
					  		<input type="text" placeholder="First Name" class="span4" name="name" value="<?php echo $user->name; ?>"/>
					  	</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">Last name</label>
					  		<div class="controls">
					  			<input type="text" placeholder="Last name" class="span4" name="surname" value="<?php echo $user->surname; ?>"/>
					  		</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">E-mail</label>
					  		<div class="controls">
					  			<span class="add-on"><i class="icon-envelope"></i><span><input type="text" placeholder="E-mail" class="span4" name="email" value="<?php echo $user->email; ?>" />
					  		</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">I want a position as:</label>
					  		<div class="controls">
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
							</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">I am avaliable to work in:</label>
					  		<div class="controls">
								  <label class="checkbox inline">
										  <input name="anotherCity" type="checkbox" <?php if($user->another_city == "1"){ echo "checked = 'checked'";}?> value="1"/>
										 Another City
										</label>
										<label class="checkbox inline">
										  <input type="checkbox" name="anotherCountry" <?php if($user->another_country == "1"){ echo "checked = 'checked'";}?> value="1"/>
										  Another Country
										</label>
							</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">State</label>
					  		<div class="controls">
						    	<select name="state">
								  <option value="">select your state</option>
								   <?php foreach ($state as $stateDados){ ?>
								   		<option value="<?php echo $stateDados->id_state;?>" <?php if($user->state == $stateDados->id_state){ echo "selected = 'selected'";}?>><?php echo $stateDados->name; ?></option>
								   	<?php } ?>
								</select>
							</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">1 minute introduction (youtube):</label>
					  		<div class="controls">
					  			<input type="text" placeholder="http://www.youtube.com/watch?v=" class="span4" name="video_url" value="<?php echo $user->video_url; ?>"/>
					  		</div><!-- controls -->
					  </div><!-- control-group -->
					   <div class="control-group">
					  		<label class="control-label">Vizify portfolio:</label>
					  		<div class="controls">
					  			<input type="text" placeholder="http://www.vizify.com/your-username" class="span4" name="vizify_portfolio" value="<?php echo $user->vizify_portfolio; ?>"/>
					  		</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
    					<div class="controls">
					  		<button type="submit" class="btn btn-large btn-primary">Submit</button>
					  	</div><!-- controls -->
					  </div><!-- control-group -->
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