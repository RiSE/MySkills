<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');
$professional = $this->professional_model->loadProfessional($fbuid);
$ThisBadge = $this->badge_model->listBadgesProfessionalByProfessional($professional[0]->id_professional);

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Professional Profile');
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

        <form method="POST" name="frmClaim">

            <!--            <div class="container">-->

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

                <div class="span2" name="divProfile">
                    <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal" style="border:thick groove green;" />
                    <br /><br />

                    <?php
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
                    ?>

                </div>

                <div class="span10" name="divContainer">

                    <h3 id="hname"><span class="slash">Professional:</span></h3>

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <!--<div class="span2"><a href="#" class="btn btn-large btn disabled">Skill Points</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Offers</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Job Applications</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Course Savings</a></div>-->

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <!--<div class="span2"><a href="#" class="btn btn-large btn disabled">Badges</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Courses</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Profile Views</a></div>
                    <div class="span2"><a href="#" class="btn btn-large btn disabled">Expected Salary</a></div>-->

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <div class="span3">
                        <a href="<?php echo base_url(); ?>index/jobs" class="btn btn-success btn-large">Apply for a Job</a>
                    </div>

                    <div class="span3">
                        <a href="<?php echo base_url(); ?>index/claimbadges" class="btn btn-warning btn-large">Claim your Badges</a>
                    </div>

                    <div class="span3">
                        &nbsp;<a href="<?php echo base_url(); ?>index/courses" class="btn btn-success btn-large" >Apply for a Course</a>
                    </div>

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>

                    <!--<div class="span8 sidebar">
                        <p></p>
                    </div>-->

                    <div class="row">
                        <div class="span8">
                            &nbsp;
                        </div>
                    </div>


                    <div class="span8  sidebar">
                        <h2>News</h2>
                        <p></p>
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

        </form>
    </div>
</div>