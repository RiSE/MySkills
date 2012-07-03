<script type="text/javascript">
    mixpanel.track("Recruiter Profile");
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

        <div class="row-fluid">
            <div class="span2">
                <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal"  style="border:thick groove green;" />                
            </div>
            <div class="span6">
                <hr>
                <h3 id="hname"><span class="slash">Recruiter:</span></h3>
                <hr>
                <h3 id="hwork"><span class="slash">Work:</span></h3>
                <hr>
                <?php foreach ($professionals as $pro) : ?>
                    <img id="userpic" src="https://graph.facebook.com/<?php echo $pro->fbuid ?>/picture&type=square" width="50" height="50"  style="border:thick groove green;" />
                <?php endforeach; ?>
                
            </div>
            <div class="span4">
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
