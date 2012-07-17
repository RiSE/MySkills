<div id="subheader">
    <div class="inner">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</div>

<div id="subpage">	
    <div class="container">
            <div class="row-fluid">
					<div class="tabbable tabs-left">
					        <ul class="nav nav-tabs ">
					          <li class=""><a href="#lA" data-toggle="tab">Web Development</a></li>
					          <li class="active"><a href="#lB" data-toggle="tab">Mobile Development</a></li>
					        </ul>
					        <div class="tab-content">
					          <div class="tab-pane" id="lA">
					           <?php foreach ($badges as $badge) : 
					           		if($badge->id_badge == 2 || $badge->id_badge == 4 ){
					           ?>
                                    <div class="row">
                                    <form method="POST" name="frmClaim">
                                    <input type="hidden" name="badges" value="<?php echo $badge->id_badge; ?>" />
                                	   
					            <?php 
					            		switch ($badge->id_badge){
					            			case 2 : 
					            			echo '<div class="span8">
					            					<div class="span2">
					            						<img src="'.base_url().'assets/images/badges/php.png" width="100"></img>
					            					</div>';
					            					
					            			echo '<div class="span5">
					                                    The PHP badge is provided for students that participated on an 
					                                    Zend technology trainning. This course provided content and 
					                                    practice in web application development.
					                                    Unlock Badge.
					                                    <br />
					                                    <input type="submit" value="Claim Right now!" name="claim" class="btn btn-warning" />
					                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
					                               </div>
					                               </div>';
					            			echo form_error('code');
					            			echo form_error('badge_error');
					            			break;	
					            			case 4: 
						            			echo '<div class="span8">
						            					<div class="span2">
						            						<img src="'.base_url().'assets/images/badges/php.png" width="100"></img>
						            					</div>';
						            			echo '<div class="span5">
						                                    The Zend badge is provided for students that participated on an 
						                                    Zend technology trainning. This course provided content and 
						                                    practice in Web application development.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" class="btn btn-warning" name="claim" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                              </div>
						                               </div>';
						            			echo form_error('code');
					            			echo form_error('badge_error');
						            			break;
					            		}?>
					            		</form>
					            		</div>
					            		<br />
					            	 <?php }
					            	 endforeach; ?>
					          </div>
					          <div class="tab-pane active" id="lB">
					            <?php foreach ($badges as $badge) : 
					            		if($badge->id_badge == 1 || $badge->id_badge == 3 ){
					            ?>
	                                    <div class="row">
	                                    <form method="POST" name="frmClaim">
	                                    <input type="hidden" name="badges" value="<?php echo $badge->id_badge; ?>" />
	                                	   
						            <?php 
						            		switch ($badge->id_badge){
						            			case 1 : 
						            			echo '<div class="span8">
						            					<div class="span2">
						            						<img src="'.base_url().'assets/images/badges/iOSBadge100.png" width="100"></img>
						            					</div>';
						            					
						            			echo '<div class="span5">
						                                    The iOS badge is provided for students that participated on an 
						                                    Apple technology trainning. This course provided content and 
						                                    practice in iOS application development including: iPad, iPhone and iPod touch.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" name="claim" class="btn btn-warning" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                               </div>
						                               </div>';
						            			echo form_error('code');
					            			   echo form_error('badge_error');
						            			break;	
						            			case 3: 
							            			echo '<div class="span8">
							            					<div class="span2">
							            						<img src="'.base_url().'assets/images/badges/androidbadges.png" width="100"></img>
							            					</div>';
							            			echo '<div class="span5">
							                                    The Android badge is provided for students that participated on an 
							                                    Google technology trainning. This course provided content and 
							                                    practice in Android application development including: Tablet, Phones and iPod touch.
							                                    Unlock Badge.
							                                    <br />
							                                    <input type="submit" value="Claim Right now!" disabled="disabled" class="btn btn-warning" name="claim" />
							                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
							                              </div>
							                               </div>';
							            			echo form_error('code');
					            			        echo form_error('badge_error');
							            			break;
							            			
						            		}?>
						            		</form>
						            		</div>
						            		<br/>
					            	 <?php 
					            		}
					            	 	endforeach; ?>
					          </div>
					        </div>
					      </div>
				</div>
    </div>
</div>