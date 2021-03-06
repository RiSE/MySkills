﻿<?php
$fbuid = $this->session->userdata('uid');
$userData = array();
if (!empty($fbuid)) {
    $userData = $this->user_model->loadUserOfFacebookId($fbuid);
}
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Leaderboard');
    </script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/professional.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Professional.onReady();
        Professional.leaderboard();
    })
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
            <?php if ($this->session->flashdata('hasapplied') == true) : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> You already applied for this job.
                </div>
            <?php endif; ?>
            <div class="span3">
                &nbsp;
            </div>        
            <div class="span12">

                <ul class="testimonials-list">
Do you want to unlock your badges? Go to our homepage, login, choose the option CLAIM BADGE and choose those that you are able to have. We have the following badges: Java Certified developer, PHP and Zend certified developer and also Try Git and Try Ruby (15 minutes course). Go ahead, choose your badge and present your skills. New badges coming soon.
                   <li>

                       <div class="testimonial-text span1"><span class="testimonial-author">&nbsp;</span></div>
                        <div class="testimonial-text span2"><span class="testimonial-author">Name </span></div>
                        <div class="testimonial-text span2"> <span class="testimonial-author">Since </span></div>
                        <div class="testimonial-text span1"><span class="testimonial-author" style="text-align:right">&nbsp;Skills</span></div>
                        <div class="testimonial-text span3"><span class="testimonial-author" style="text-align:center">Badges </span></div>
                         
                    </li>
                    <?php foreach ($professionals as $professional) : 
                    	$ThisBadge = $this->badge_model->listBadgesProfessionalByProfessional($professional->id_user);
                        $firstName = explode(' ', $professional->name);
                    ?>
                        <li>
                            <div class="testimonial-avatar span1">
                                <div class="img">
                                  <img id="userpic" src="https://graph.facebook.com/<?php echo $professional->fbuid; ?>/picture&type=large" alt="Thumbnail"/>
                                </div>
                            </div>
                            
                            <div class="testimonial-text span2">
                    
                                    <h3>
                                    <?php if (!empty($userData[0]->id_profile)) :
                                    		if ($userData[0]->id_profile == "1") :?>
                                                    <?php if ($professional->video_url != null) :?>
                                                        <a class="btn btn-small" href="<?php echo base_url() . 'index/profile?' . $professional->fbuid; ?>"><i class="icon-facetime-video"></i></a>
                                                    <?php else: ?>
                                                        <a class="btn btn-small" href="<?php echo base_url() . 'index/profile?' . $professional->fbuid; ?>"><i class="icon-user"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo base_url()."index/profile?".$professional->fbuid;?>">
                                                        <strong><?php echo $firstName[0]; ?></strong>
                                                    </a>
                                    </h3>
                                                <?php else: ?>	
                                                    <strong><?php echo $firstName[0]; ?></strong>
                                                <?php endif; ?>
                                    <?php else: ?>
                                                    
                                        <?php if ($professional->video_url != null) :?>
                                            <a class="btn btn-small" href="#"><i class="icon-facetime-video"></i></a>
                                        <?php else: ?>
                                            <a class="btn btn-small" href="#"><i class="icon-user"></i></a>
                                        <?php endif; ?>
                                                                                                        
                                    	<strong><?php echo $firstName[0]; ?></strong>
                                    	<?php endif; ?>
                                    </h3>
                            </div>
                            
                            <div class="testimonial-text span2">
                                    <h3><strong><?php echo date('d/m/Y', strtotime($professional->created)); ?></strong></h3>
                            </div>
                            <div class="testimonial-text span2">
				<div class="progress progress-success">
				  <div class="bar" style="width: <?php echo ($professional->points*100)/112; ?>%;"></div>
				</div>                                                         
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