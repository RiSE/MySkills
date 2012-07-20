<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

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

            <div class="row-fluid">

                <div class="span12">

                    <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal"  style="border:thick groove green;" />

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
                            <?php echo form_error('selectBadges');?>
                            <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
                            <?php echo form_error('code');?>
                            
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
            </div>

            <!--<div class="row">
    
                <div class="span2">
                    <!--<img src="<?php echo base_url(); ?>assets/images/jrafael.jpg" width="100" style="border:thick groove green;"/>
                </div>
    
                <div class="span7">
                    <form method="POST" name="frmClaim">
                        <h3 id="hname"><span class="slash">Professional:</span></h3>
                        <hr>
    
                        <span class="slash">Badges:</span>
                        <select name="selectBadges">
                            <option value="">--SELECT--</option>
            <?php foreach ($badges as $badge) : ?>
                                            <option value="<?php echo $badge->id_badge; ?>"><?php echo $badge->name; ?></option>
            <?php endforeach; ?>
    
                        </select>
                        <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
    
                        <input type="submit" value="Claim Right now!" name="claim" />
                        <hr>
                        <h4><span class="slash">Unlock:</span></h4>            
                        <div id="badges">
                            <img src="<?php base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                            <img src="<?php base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                            <img src="<?php base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                            <img src="<?php base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                            <img src="<?php base_url(); ?>assets/images/badges/unlock100.png" width="100"></img>
                        </div>
                    </form>
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
    
            </div>-->
        </form>
    </div>
</div>