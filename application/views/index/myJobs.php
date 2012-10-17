<?php
$fbuid = $this->session->userdata('uid');
$idRecruter = $this->session->userdata('userid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');
if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
    </script>
<?php endif; ?>
<script type="text/javascript">
function deactivateJob(idjob){
	$.post("<?php echo base_url(); ?>index/deactivateJob",{jobId : idjob},
			function(data){
				if(data != ""){
					$("#error").show();
					$("#success").hide();
					$("#msnError").html(data);
				}else{
					$("#error").hide();
					$("#success").show();
					$("#msnSuccess").html("Success job vacancy disabled!");
				}
			}
		);
}

function deleteJob(idjob){
	$.post("<?php echo base_url(); ?>index/deleteJob",{jobId : idjob},
			function(data){
				if(data != ""){
					$("#error").show();
					$("#success").hide();
					$("#msnError").html(data);
				}else{
					$("#error").hide();
					$("#success").show();
					$("#msnSuccess").html("Job vacancy deleted successfully!");
				}
				setTimeout(function(){window.location="<?php echo base_url(); ?>index/myJobs"},3000);	
			}
		);
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
function mandarParametro(idJob,idUserRec,idUserDev){
	$("#iduserdev").val(idUserDev);
	$("#iduserRec").val(idUserRec);
	$("#idjob").val(idJob);
}
function mudastatus(status,user,job){
	$.post("<?php echo base_url(); ?>index/mudastatus",{novostatus:status,idUser:user,idJob:job},
			function(data){
				//alert(data);
			}
	);
}
function sendMessage(){
	$.post("<?php echo base_url(); ?>index/sendMessage",{message:$("#message").val(),idUserDev:$("#iduserdev").val(),idUserRec:$("#iduserRec").val(),idJob:$("#idjob").val()},
			function(data){
				alert(data);
				$('#myModal').modal('hide');
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
		            		<?php if($userRecruter[0]->id_profile == 2){
									if(!empty($jobs)):	            		
		            			?>
							           <div class="tabbable tabs-left">
							              <div class="tab-content">
							                 <?php 
							                   	$k = 0;
							                   	foreach ($jobs as $job): ?>
							                       		<div class="row">
							                                    <div class="span8">
																	
															        	<table class="table  table-striped table-condensed">
															
																		        <colgroup>
																		          <col class="span2">
																		           <!-- <col class="span4"> -->
																		        </colgroup>
																		        <thead>
																		        	<tr>
																						<th width="87%">						     
																							<?php echo $job->title;?>
																						</th>
																						<th>                                   
													                                        <div class="btn-group ">
																											  <button class="btn btn-mini btn-success">Action</button>
																											  <button class="btn btn-mini  btn-success dropdown-toggle" data-toggle="dropdown">
																											    <span class="caret"></span>
																											  </button>
																											  <ul class="dropdown-menu">
																											    <li><a href="#" onclick="javascritp:deactivateJob('<?php echo $job->id_job;?>');"><i class="icon-off"></i>Disable</a></li>
																											    <?php if(empty($professionals[$k])):?>
																											    	<li><a href="#" onclick="javascritp:deleteJob('<?php echo $job->id_job;?>');"><i class="icon-trash"></i>Delete</a></li>
																											    <?php endif;?>
																											    <li><a href="<?php echo base_url();?>/index/editJob?<?php echo base64_encode($job->id_job."*".$job->title." ");?>"><i class="icon-edit"></i>Edit</a></li>
																											  </ul>
																									</div>
																							</th>
																						</tr>
																		        </thead>
																				<tbody>
																					<tr>
																							<td width="87%">
																								<?php echo $job->description;?>
																							</td>
																							<td>
																								<?php if($job->published == 0): 
																											echo"DISABLED";
																									  endif;
																								?>
																							</td>
																						</tr>
																						</tbody>
																					</table>
									                        <?php
											                        if(!empty($professionals[$k])):
											                           ?>
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
																					<th>Send message reminder</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php 
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
																							            	<button class="btn" type="button" onclick="javascript:mandarParametro('<?php echo $job->id_job;?>','<?php echo $idRecruter;?>','<?php echo $user[0]->id_user;?>');" data-toggle="modal" data-target="#myModal">
																												<i class="icon-envelope"></i>
																											</button>
																							            	<!-- <button class="btn" type="button" onclick="sendmail('<?php echo $user[0]->id_user;?>');">
																												SEND
																											</button> -->
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
							                                <div class="row">
							                                    <div class="span8">
							                                    	&nbsp;
							                                    </div>
							                                </div>
											                    	
														<?php 
															$k++;	
														endforeach;
														?>
			                    					</div>
			                    				</div>
			                    			<?php
			                    			else:
			                    				?>
				                    				 <div class="row">
					                                    <div class="span8">
					                                    	&nbsp;
					                                    </div>
					                                </div>
											     <?php  
						            			endif;
						            		} ?>
		            		
			     		<!-- Modal -->
						<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">Send message reminder</h3>
						  </div>
						  <div class="modal-body">
						    <textarea rows="3" id="message" name="message" style="width: 368px; height: 156px;"></textarea>
						    <input type="hidden" id="iduserdev" />
						    <input type="hidden" id="iduserRec" />
						    <input type="hidden" id="idjob" />
						  </div>
						  <div class="modal-footer">
						    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						    <button class="btn btn-primary" onclick="javascript:sendMessage();">Save changes</button>
						  </div>
						</div>
			     
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