<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
    </script>
<?php endif; ?>
<script type="text/javascript">
function deactivateJob(idjob){
	$.post("<?php echo base_url(); ?>index/deactivateJob",{jobId : idjob});
}
function sendmail(idUser){
	$.post("<?php echo base_url(); ?>index/sendMail",{UserId : idUser},
			function(data){
				if(data != ""){
					$("#error").show();
					$("#success").hide();
					$("#msnError").html(data);
				}else{
					$("#error").hide();
					$("#success").show();
					$("#msnSuccess").html("Success email sent!");
				}
					
			}
		);
}
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
			  <div class="span9">
			  		
		                <div class="alert alert-error" style="display:none" id="error">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>Oh snap!</strong> <div id="msnError"></div>
		                </div>
            		

		            
		                <div class="alert alert-success" style="display:none" id="success">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    <strong>Well done!</strong> <div id="msnSuccess"></div>
		                </div>
		          
		            
		            		<?php if($userRecruter[0]->id_profile == 2){?>
							           <div class="tabbable tabs-left">
							              <div class="tab-content">
							                 <?php 
							                   	$k = 0;
							                   	foreach ($jobs as $job):?>
							                       		<div class="row">
							                                    <div class="span8">
							                                        
							                                        <div class="span7"><button type="button" class="close" onclick="javascritp:deactivateJob('<?php echo $job->id_job;?>');"><i class="icon-trash"></i></button> <?php echo $job->title;?></div>
							                                        <table class="table  table-striped table-condensed">
													
																        <colgroup>
																          <col class="span2">
																           <!-- <col class="span4"> -->
																        </colgroup>
														
																	<thead>
																		<tr>
																			<th>Name</th> 
																			<th>Video</th>
																			<th>Vizify</th>
																			<th>Applied</th>
																			<th>Evaluation</th>
																			<th>Approved</th>
																			<th>Rejected</th>
																			<th>Send E-mail to</th>
																		</tr>
																	</thead>
																	<tbody>
											                        <?php
											                           if(!empty($professionals)):
											                           
											                            foreach ($professionals[$k] as $user) :
											                             
											                            ?>
																		          <tr>
																			            <td width=20%>
																			             	<a href="<?php echo base_url()."index/profile?".$user[0]->fbuid;?>">
																			             	 <?php echo $user[0]->name; ?>
																			             	 </a>
																			            </td>
																			            <td >
																			             	<?php if ($user[0]->video_url != null) :?>
										                                                        <i class="icon-ok"></i>
										                                                    <?php else: ?>
										                                                        
										                                                    <?php endif; ?>
																			            </td>
																			            <td>
																			             	<?php if ($user[0]->vizify_portfolio != null) :?>
										                                                        <i class="icon-ok"></i>
										                                                    <?php else: ?>
										                                                        
										                                                    <?php endif; ?>
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
																			            <td>
																			            		<?php if ($user[0]->vizify_portfolio == null || $user[0]->video_url == null) :?>
																					            	<button class="btn" type="button" onclick="sendmail('<?php echo $user[0]->id_user;?>');">
																										data updates
																									</button>
																								<?php endif;?>
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