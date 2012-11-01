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
function vermensagem(idjob,userdevId,idrecebeu){
	$.post('<?php echo base_url(); ?>index/seeMessage',{id_job:idjob,id_userRecebeu:userdevId,id_userMandou:idrecebeu},
			function(data){
				$("#seeMessage").html(data);
				$("#iduserdev").val(userdevId);
				$("#iduserRec").val(idrecebeu);
				$("#idjob").val(idjob);

			}
	);
}
function sendMessage(){
	$.post("<?php echo base_url(); ?>index/sendMessage",{message:$("#message").val(),idUserRecebeu:$("#iduserRec").val(),idUserEnviou:$("#iduserdev").val(),idJob:$("#idjob").val()},
			function(data){
				alert(data);
				$('#myModal').modal('hide');
				$("#message").val("");
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
				<?php if($user[0]->fbuid != $fbuid): ?>
                    <h3 id="name"><span class="slash">Professional:</span><?php echo $user[0]->name; ?></h3>
				<?php endif;?>
                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

				<?php if($user[0]->id_profile == 1):?>
		                    <?php if ($user[0]->video_url != null || $user[0]->vizify_portfolio != null) : ?>
		                        <div class="span4">
		                           <?php if ($user[0]->video_url != null): ?> 
			                            <center>
			                                <iframe width="350" height="200" src="<?php echo $user[0]->video_url; ?>" frameborder="0" allowfullscreen></iframe>
			                            </center>
		                           <?php endif; ?>
		                        </div>
		                        <div class="span2">
		                           <?php if($user[0]->fbuid == $fbuid):?>				 
					                      <div class="row">
						                    	<div class="span2">
						                        	<a href="<?php echo base_url(); ?>index/jobs" class="btn btn-success btn-large">Apply for a Job</a>
						                    	</div>
					                      </div>
					                      <div class="row">
					                      		&nbsp;
					                      </div>
					                      <div class="row">
							                    <div class="span2">
							                        <a href="<?php echo base_url(); ?>index/claimbadges" class="btn btn-warning btn-large">Claim your Badges</a>
							                    </div>
							               </div>
							                <div class="row">
					                      		&nbsp;
					                        </div>
						                   <div class="row">
							                    <div class="span2">
							                        &nbsp;<a href="<?php echo base_url(); ?>index/courses" class="btn btn-success btn-large" >Apply for a Course</a>
							                    </div>
							                </div>
					  				<?php endif;?>
		                        </div>
		
		                        <div class="row">
		                            <div class="span8">
		                               &nbsp; 
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="span8">
		                               <i class="icon-folder-close"></i>Vizify: <a href="<?php echo $user[0]->vizify_portfolio; ?>" target="_blank"><?php echo $user[0]->vizify_portfolio; ?></a>
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
		                    <div class="row">
		                        <div class="span8">
		                           <table class="table table-hover">
						              <thead>
						                <tr>
						                  <th>Job</th>
						                  <th>Due Date</th>
						                  <th>Status</th>
						                  <th>FeedBack Message</th>
						                </tr>
						              </thead>
						              <tbody>
				             <?php if(!empty($jobsapplied)):
									$rjm = 0;	
				             		foreach ($jobsapplied as $dadosjobsapplied):						             			
				             				
				             ?>
						                <tr>
						                  <td width="20%"><?php echo $dadosjobsapplied->title;?></td>
						                  <td width="20%"><?php echo date('d/m/Y', strtotime($dadosjobsapplied->period));?></td>
						                  <td width="20%"><?php echo $dadosjobsapplied->status;?></td>
						                  <td width="20%">
						                  		<button class="btn" type="button" onclick="javascript:vermensagem('<?php echo $dadosjobsapplied->id_job?>','<?php echo $dadosjobsapplied->id_user?>','<?php echo $dadosjobsapplied->idrecruter?>');" data-toggle="modal" data-target="#myModal">
													<i class="icon-envelope">
														<?php if($resultJobMessage[$rjm][0]->qtd > 0):?>
						                  						<span class="badge badge-important" ><?php echo $resultJobMessage[$rjm][0]->qtd;?></span>
						                  				<?php endif;?>
													</i>
												</button>
				             					
						                  </td>
						                  			
						                </tr>
						    <?php 		
						    			$rjm++;
						    		endforeach;
						    
						    		endif;
						    ?>
						              </tbody>
						           </table>
		                        </div>
		                    </div>
		
		                    <div class="row">
		                        <div class="span8">
		                            
		                            &nbsp;
		                        </div>
		                    </div>
					<?php else:
						  if ($user[0]->fbuid == $fbuid):
					
		               		endif;
		               endif;?>
                    <div class="span8">
                    
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
            <!-- Modal -->
			<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">Message</h3>
			    <input type="hidden" id="iduserdev" />
			    <input type="hidden" id="iduserRec" />
			    <input type="hidden" id="idjob" />
			  </div>
			  <div class="modal-body">
			    <div id="seeMessage"></div>
			   
			  </div>
			  <div class="modal-footer">
			    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			    <button class="btn btn-primary" onclick="javascript:sendMessage();">Send</button>
			  </div>
			</div>
    </div>
</div>