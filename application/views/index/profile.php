<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');
if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Professional Profile');
        
    </script>
<?php endif; ?>
<script type="text/javascript">
function mudastatus(status,user,job){
	$.post("<?php echo base_url(); ?>index/mudastatus",{novostatus:status,idUser:user,idJob:job},
			function(data){
				//alert(data);
			}
	);
}
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
                <!-- -->

                <?php if ($this->session->flashdata('signup') == true) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> Your subscription was successfully
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('applyforajob') == true) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> You applied for a job
                    </div>                
                <?php endif; ?>

                <?php if ($this->session->flashdata('claimbadge') == true) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> You claimed a badge
                    </div>                
                <?php endif; ?>

                <?php if ($this->session->flashdata('applyforacourse') == true) : ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> You applied for a course
                    </div>                
                <?php endif; ?>

                <div class="span2" name="divProfile">
                    <img id="userpic" src="https://graph.facebook.com/<?php echo $user[0]->fbuid; ?>/picture&type=normal" style="/*border:thick groove green;*/" />
                    <br /><br />

                    <?php
                    if($user[0]->id_profile == 1):
	                    for ($i = 0; $i <= 7; $i++) {
	                        if ($i >= count($ThisBadge)) {
	                            ?>
	                            <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
	                            <?php
	                        } else {
	                            if ($ThisBadge[$i]->active == 1) {
	                                ?>
	                                <img src="<?php echo base_url(); ?>assets/images/badges/<?php echo $this->badge_model->getImgBadgs($ThisBadge[$i]->id_badge) ?>" width="65"></img>
	                            <?php } else { ?>
	                                <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
	                                <?php
	                            }
	                        }
	                    }
	                 endif;
                    ?>

                </div>

                <div class="span7" name="divContainer">

                    <h3 id="name"><span class="slash">Professional:</span><?php echo $user[0]->name; ?></h3>

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <!--<div class="span2"><a href="#" class="btn btn-large btn disabled">Skill Points</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Offers</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Applications</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Course Savings</a></div>-->


                    <!--<div class="span2"><a href="#" class="btn btn-large btn disabled">Badges</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Courses</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Profile Views</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Expected Salary</a></div>-->
				<?php if($user[0]->id_profile == 1):?>
		                    <?php if ($user[0]->video_url != null) : ?>
		                        <div class="span8">
		                            <center>
		                                <iframe width="250" height="188" src="<?php echo $user[0]->video_url; ?>" frameborder="0" allowfullscreen></iframe>
		                            </center>
		                        </div>
		
		                        <div class="row">
		                            <div class="span8">
		                                &nbsp;
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="span8">
		                                &nbsp;
		                            </div>
		                        </div>
		
		                    <?php else: ?>
		                        <div class="row">
		                            <div class="span8">
		                                &nbsp;
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="span8">
		                                &nbsp;
		                            </div>
		                        </div>
		
		                    <?php endif; ?>
		
						 
		                    <div class="span2">
		                        <a href="<?php echo base_url(); ?>index/jobs" class="btn btn-success btn-large">Apply for a Job</a>
		                    </div>
		
		                    <div class="span2">
		                        <a href="<?php echo base_url(); ?>index/claimbadges" class="btn btn-warning btn-large">Claim your Badges</a>
		                    </div>
		
		                    <div class="span2">
		                        &nbsp;<a href="<?php echo base_url(); ?>index/courses" class="btn btn-success btn-large" >Apply for a Course</a>
		                    </div>
				
		                    <div class="row">
		                        <div class="span8">
		                            &nbsp;
		                        </div>
		                    </div>
		
		                    <div class="row">
		                        <div class="span8">
		                            &nbsp;
		                        </div>
		                    </div>
					<?php endif;?>

                    <div class="span8">
                        <?php if($user[0]->id_profile == 2){?>
							           <div class="tabbable tabs-left">
							              <div class="tab-content">
							                 <?php 
							                   	$k = 0;
							                   	foreach ($jobs as $job):?>
							                       		<div class="row">
							                                    <div class="span5">
							                                        
							                                        <table class="table  table-striped table-condensed">
													
																        <colgroup>
																          <col class="span2">
																           <!-- <col class="span4"> -->
																        </colgroup>
														
																	<thead>
																		<tr>
																			<th><?php echo $job->title;?></th> 
																			<th>Applied</th>
																			<th>Evaluation</th>
																			<th>Approved</th>
																			<th>Rejected</th>
																		</tr>
																	</thead>
																	<tbody>
											                        <?php
											                           if(!empty($professionals)):
											                           
											                            foreach ($professionals[$k] as $user) :
											                             
											                            ?>
																		          <tr>
																			            <td width=40%>
																			             	 <?php echo $user[0]->name; ?>
																			            </td>
																			            <td >
																			             	 <input type="radio" name="<?php echo $user[0]->name.$k;?>"  value="Applied" onclick="mudastatus('Applied','<?php echo $user[0]->id_user?>','<?php echo $job->id_job;?>');" <?php if($user[1] == "Applied"){?> checked = "checked" <?php }?>>
																			            </td>
																			            <td >
																			             	 <input type="radio" name="<?php echo $user[0]->name.$k;?>"  value="Evaluation" onclick="mudastatus('Evaluation','<?php echo $user[0]->id_user?>','<?php echo $job->id_job;?>');" <?php if($user[1] == "Evaluation"){?> checked = "checked" <?php }?>>
																			            </td>
																			            <td >
																			             	 <input type="radio" name="<?php echo $user[0]->name.$k;?>"  value="Approved" onclick="mudastatus('Approved','<?php echo $user[0]->id_user?>','<?php echo $job->id_job;?>');" <?php if($user[1] == "Approved"){?> checked = "checked" <?php }?>>
																			            </td>
																			            <td >
																			             	 <input type="radio" name="<?php echo $user[0]->name.$k;?>"  value="Rejected" onclick="mudastatus('Rejected','<?php echo $user[0]->id_user?>','<?php echo $job->id_job;?>');" <?php if($user[1] == "Rejected"){?> checked = "checked" <?php }?>>
																			            </td>
																			     </tr>
																	<?php 
																	    endforeach;
																	  endif;
																	?>
																	</tbody>
																	</table>
																	
							  										 </div>
							                                </div>
											                    	
											<?php 
												$k++;	
											endforeach;
											?>
                    					</div>
                    				</div>
                    			<?php } ?>
                    	</div>

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                </div>
					
					<div class="span3">
	                <div class="sidebar">
	                <?php if($user[0]->id_profile == 1):?>
	                    <h4><span class="slash">//</span>iOS Training Badge</h4>
	                    <img width="50" align="left" src="<?php echo base_url(); ?>assets/images/badges/iOSBadge100.png">
	
	                    <p>
	                        The iOS badge is provided for students that participated on an 
	                        Apple technology trainning. This course provided content and 
	                        practice in iOS application development including: iPad, iPhone and iPod touch.
	                        Unlock Badge.
	                    </p>
	
	                    <h4><span class="slash">//</span>The Unlock Badge</h4>
	                    <img width="50" align="left" src="<?php echo base_url(); ?>assets/images/badges/unlock100.png">
	
	                    <p>
	                        The Unlock badge is used as a visual representation for programmers and 
	                        recruiters that the programmer can unlock other badges in the future to improve his profile page.
	                    </p>
					<?php else:?>
							<h4><span class="slash">//</span>iOS Training Badge recruter</h4>
	                    <img width="50" align="left" src="<?php echo base_url(); ?>assets/images/badges/iOSBadge100.png">
	
	                    <p>
	                        The iOS badge is provided for students that participated on an 
	                        Apple technology trainning. This course provided content and 
	                        practice in iOS application development including: iPad, iPhone and iPod touch.
	                        Unlock Badge.
	                    </p>
	
	                    <h4><span class="slash">//</span>The Unlock Badge</h4>
	                    <img width="50" align="left" src="<?php echo base_url(); ?>assets/images/badges/unlock100.png">
	
	                    <p>
	                        The Unlock badge is used as a visual representation for programmers and 
	                        recruiters that the programmer can unlock other badges in the future to improve his profile page.
	                    </p>
	                 <?php endif;?>
	                </div>
              </div>
    
            </div>
            

            <!--            </div>-->

            <!--<div class="row">
        
                <div class="span2">
                    <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal" style="border:thick groove green;" />
                    <br /><br />
        
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
        
                </div>
        
                <div class="span10">
                    <h3 id="hname"><span class="slash">Professional:</span></h3>
                    <hr>
        
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Skill Points</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Offers</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Applications</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Course Savings</a></div>
        
                    <br /><br /><br />
        
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Badges</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Courses</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Profile Views</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Expected Salary</a></div>
                </div>
        
                <br /><br /><br />
        
                <br /><br /><br />
        
                <div class="span10">
                    <a class="btn btn-primary btn-large">Learn more</a>
                    <a class="btn btn-primary btn-large">Learn more</a>
                    <a class="btn btn-primary btn-large">Learn more</a>
                    <a class="btn btn-primary btn-large">Learn more</a>
                    <a class="btn btn-primary btn-large">Learn more</a>
                </div>
        
        
            </div>-->

            <!--<div class="row-fluid">
        
                <div class="span12">
        
                    <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal" style="border:thick groove green;" />
        
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                    <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
        
                    <div class="row-fluid">
                        <div class="span9">
                            <hr>
                            <h3 id="hname"><span class="slash">Professional:</span></h3>
                            <hr>
                            <span class="slash">Badges:</span>
                            <select name="selectBadges">
                                <option value="">--SELECT--</option>
            <?php foreach ($badges as $badge) : ?>
                                                                                                                                                                                                                                                    <option value="<?php echo $badge->id_badge; ?>"><?php echo $badge->name; ?></option>
            <?php endforeach; ?>
                            </select>
            <?php echo form_error('selectBadges'); ?>
                            <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
            <?php echo form_error('code'); ?>
        
                            <input type="submit" value="Claim Right now!" name="claim" />
            <?php echo $badge_error; ?>
                        </div>
                        <div class="span3">
                            <div class="sidebar">
                                <h4><span class="slash">//</span>iOS Training Badge</h4>
                                <img src="<?php echo base_url(); ?>assets/images/badges/iOSBadge100.png" width="50" align="left" />
        
                                <p>
                                    The iOS badge is provided for students that participated on an 
                                    Apple technology trainning. This course provided content and 
                                    practice in iOS application development including: iPad, iPhone and iPod touch.
                                    Unlock Badge.
                                </p>
        
                                <h4><span class="slash">//</span>The Unlock Badge</h4>
                                <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="50" align="left"/>
        
                                <p>
                                    The Unlock badge is used as a visual representation for programmers and 
                                    recruiters that the programmer can unlock other badges in the future to improve his profile page.
                                </p>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
    </div>
</div>