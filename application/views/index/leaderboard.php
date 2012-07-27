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

        <!--<div class="row-fluid">

            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#lA" data-toggle="tab">Web Development</a></li>
                    <li class=""><a href="#lB" data-toggle="tab">Mobile Development</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="lA">
                        1A
                    </div>
                    <div class="tab-pane" id="lB">
                        1B
                    </div>
                </div>
            </div>
        </div>-->

        <div class="row">

            <?php if ($this->session->flashdata('hasapplied') == true) : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> You already applied for this job
                </div>
            <?php endif; ?>

            <!--<div class="span2">
                <ul class="nav nav-tabs nav-stacked">
                </ul>
            </div>-->
            
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
<!--                            <h3><span class="slash"></span>Developers are here</h3>-->
                            <div class="testimonial-avatar span1">
                                <div class="img">
                                    <!--<img src="../assets/images/Testemonial-MichaelDaugherty.png" alt="Thumbnail">-->
                                    <img id="userpic" src="https://graph.facebook.com/<?php echo $professional->fbuid; ?>/picture&type=large" alt="Thumbnail" />
                                </div>
                            </div>
                            
                            <div class="testimonial-text span2">
                    
                                    <h3><strong id="fb_<?php echo $professional->fbuid; ?>"></strong></h3>
                              
                            </div>
                            
                            <div class="testimonial-text span2">
                                
                                   
                                    <h3><strong><?php echo date('d/m/Y', strtotime($professional->created)); ?></strong></h3>
                                
                            </div>
                            <div class="testimonial-text span2">
                           
                                  <h3 style="text-align:center" >0</h3>
                                
                            </div>
                            <div class="testimonial-text span3">
                            			<span class="testimonial-author">
                            				<?php
								                    for ($i = 0; $i <= 2; $i++) {
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
								              ?>
										 </span>
							</div>
                            <!--<div class="span2">
                                <strong>Name:</strong>
                                <strong id="fb_<?php echo $professional->fbuid; ?>"></strong>
                                <!--<p id="fb_<w?php echo $professional->fbuid; ?>"> </p>
                            </div>-->

                            <!--<div class="span2">
                                <strong>Since: <?php echo date('d/m/Y', strtotime($professional->created)); ?></strong>
                            </div>-->
                            
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!--<div class="span8 sidebar ">
                <?php foreach ($professionals as $professional) : ?>
                                    <div class="span4">
                                        <p>
                                            <img id="userpic" src="https://graph.facebook.com/<?php echo $professional->fbuid; ?>/picture&type=small" style="border:thick groove green;" />
                                        </p>
                                    </div>

                                    <div class="span1">
                                        <p id="fbs_<?php echo $professional->fbuid; ?>"></p>
                                    </div>
                                    <div class="span1">
                                        <p><?php echo date('d/m/Y', strtotime($professional->created)); ?></p>
                                    </div>
                <?php endforeach; ?>
                </div>-->
            </div>

        </div>

    </div>
</div>