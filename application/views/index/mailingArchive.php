<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Mailing Archive');
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
			<dir class="span8">
				<style type="text/css">
				
						<!--
						
						.display_archive {font-family: arial,verdana; font-size: 12px;}
						
						.campaign {line-height: 125%; margin: 5px;}
						
						//-->
				
				</style>
				
				<script language="javascript" src="http://us5.campaign-archive2.com/generate-js/?u=c22dec5cbd87c068118755814&fid=1497&show=10" type="text/javascript"></script>
			</dir>		
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
	</div> <!-- /container -->	

	

</div> <!-- /subpage -->