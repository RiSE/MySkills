<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/professional.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Professional.onReady();
        Professional.leaderboard();
    })
</script>

<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Leaderboard');
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

            <?php if ($this->session->flashdata('hasapplied') == true) : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> You already applied for this job
                </div>
            <?php endif; ?>

            
            <div class="span3">
                &nbsp;
            </div>
            
            <div class="span12">

                <ul class="testimonials-list">
                    <li>
                        <div class="testimonial-text span1"><span class="testimonial-author">&nbsp;</span></div>
                        <div class="testimonial-text span2"><span class="testimonial-author">Name </span></div>
                        <div class="testimonial-text span2"> <span class="testimonial-author">Since </span></div>
                        <div class="testimonial-text span1"><span class="testimonial-author" style="text-align:right">&nbsp;Points </span></div>
                        <div class="testimonial-text span3"><span class="testimonial-author" style="text-align:center">Badges </span></div>
                         
                    </li>
                    <?php foreach ($professionals as $professional) : 
                    	$ThisBadge = $this->badge_model->listBadgesProfessionalByProfessional($professional->id_professional);
                    
                    ?>
                        <li>
                            <div class="testimonial-avatar span1">
                                <div class="img">
                                  <img id="userpic" src="https://graph.facebook.com/<?php echo $professional->fbuid; ?>/picture&type=large" alt="Thumbnail"/>
                                </div>
                            </div>
                            
                            <div class="testimonial-text span2">
                    
                                    <h3><strong><?php echo $professional->name; ?></strong></h3>
                              
                            </div>
                            
                            <div class="testimonial-text span2">
                                
                                   
                                    <h3><strong><?php echo date('d/m/Y', strtotime($professional->created)); ?></strong></h3>
                                
                            </div>
                            <div class="testimonial-text span2">
                           
                                  <h3 style="text-align:center" ><?php echo $professional->points; ?></h3>
                                
                            </div>
                            <div class="testimonial-text span3">
				<span class="testimonial-author">
					<?php
						for ($i = 0; $i <= 3; $i++) {
							if ($i >= count($ThisBadge)) { ?>
								<img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
							<?php } else {
								if ($ThisBadge[$i]->active == 1) { ?>
								<img src="<?php echo base_url(); ?>assets/images/badges/<?php echo $this->badge_model->getImgBadgs($ThisBadge[$i]->id_badge) ?>" width="65"></img>
								<?php } else { ?>
									<img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="65"></img>
								<?php
								                            }
								                        }
								                    }
								              ?>
										 </span>
							</div>
                            
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>

        </div>

    </div>
</div>