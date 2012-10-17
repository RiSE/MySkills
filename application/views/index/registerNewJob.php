<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
       
    </script>
<?php endif; ?>
<script>
$(function() {
    $("#datepicker").datepicker();
});
</script>
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
            		<?php 
            				
            			endif; ?>

		            <?php if ($this->session->flashdata('success_message') != '') : ?>
		                <div class="alert alert-success">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>Well done!</strong> <?php echo $this->session->flashdata('success_message'); ?>
		                </div>
		            <?php 
		            	$this->session->flashdata('success_message','');
		            endif; ?>
			    <form method="POST" class="form-horizontal" name="frmEditProfile">
			   	   
					 <div class="control-group">
					  	<label class="control-label">Title*:</label>
					  	<div class="controls">
					  		<input type="text"  class="span4" name="title" value="<?php echo""; /*$user->title;*/ ?>"/>
					  	</div><!-- controls -->
					  </div><!-- control-group -->
					 <div class="control-group">
					  	<label class="control-label">Due Date:</label>
					  	<div class="controls">
					  		<input type="text"  class="span4" id="datepicker" name="period" value="<?php echo""; /*$user->title;*/ ?>"/>
					  	</div><!-- controls -->
					  </div><!-- control-group -->
					  <div class="control-group">
					  		<label class="control-label">Description:</label>
					  		<div class="controls">
					  			<textarea rows="3"  name="description" style="width: 368px; height: 156px;"></textarea>
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