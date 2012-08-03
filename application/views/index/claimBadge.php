<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Claim Badges');
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
        <div class="row-fluid">
		  <dir class="span8">
            <?php if (isset($badge_error) && !empty($badge_error)) : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> <?php echo $badge_error; ?>
                </div>                
            <?php endif; ?>

            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#lA" data-toggle="tab">Badges</a></li>
                    <!--  <li class=""><a href="#lB" data-toggle="tab">Mobile Development</a></li>-->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="lA">
                        <?php
                        foreach ($badges as $badge) :
                            
                                ?>
                                <div class="row">
                                    <form method="POST" name="frmClaim">
                                        <input type="hidden" name="badges" value="<?php echo $badge->id_badge; ?>" />

                                        <?php
                                        switch ($badge->id_badge) {
                                            case 1 :
                                                echo '<div class="span8">
						            					<div class="span2">
						            						<img src="' . base_url() . 'assets/images/badges/iOSBadge100.png" width="100"></img>
						            					</div>';

                                                echo '<div class="span5">
						                                    The iOS badge is provided for students that participated on an 
						                                    Apple technology trainning. This course provided content and 
						                                    practice in iOS application development including: iPad, iPhone and iPod touch.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" name="claim" class="btn btn-warning" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                               </div>
						                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                            case 3:
                                                echo '<div class="span8">
							            					<div class="span2">
							            						<img src="' . base_url() . 'assets/images/badges/androidbadges.png" width="100"></img>
							            					</div>';
                                                echo '<div class="span5">
							                                    The Android badge is provided for students that participated on an 
							                                    Google technology trainning. This course provided content and 
							                                    practice in Android application development including: Tablet, Phones and iPod touch.
							                                    Unlock Badge.
							                                    <br />
							                                    <input type="submit" value="Claim Right now!" class="btn btn-warning" name="claim" />
							                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
							                              </div>
							                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                        	
                                        	
                                        	case 2 :
                                                echo '<div class="span8">
					            					<div class="span2">
					            						<img src="' . base_url() . 'assets/images/badges/php.png" width="100"></img>
					            					</div>';

                                                echo '<div class="span5">
					                                    The PHP badge is provided for students that participated on an 
					                                    Zend technology trainning. This course provided content and 
					                                    practice in web application development.
					                                    Unlock Badge.
					                                    <br />
					                                    <input type="submit" value="Claim Right now!" name="claim" class="btn btn-warning" />
					                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
					                               </div>
					                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                            case 4:
                                                echo '<div class="span8">
						            					<div class="span2">
						            						<img src="' . base_url() . 'assets/images/badges/php.png" width="100"></img>
						            					</div>';
                                                echo '<div class="span5">
						                                    The Zend badge is provided for students that participated on an 
						                                    Zend technology trainning. This course provided content and 
						                                    practice in Web application development.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" class="btn btn-warning" name="claim" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                              </div>
						                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                            case 5:
                                                echo '<div class="span8">
						            					<div class="span2">
						            						<img src="' . base_url() . 'assets/images/badges/campus-badge.png" width="100"></img>
						            					</div>';
                                                echo '<div class="span5">
						                                    The Campus party badge is provided for developes that participated on an 
						                                    Campus party.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" class="btn btn-warning" name="claim" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                              </div>
						                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                            case 6:
                                                echo '<div class="span8">
						            					<div class="span2">
						            						<img src="' . base_url() . 'assets/images/badges/java-badge.jpg" width="100"></img>
						            					</div>';
                                                echo '<div class="span5">
						                                    The Java badge is provided for students that participated on an 
						                                    Java technology trainning. This course provided content and 
						                                    practice in application development.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" class="btn btn-warning" name="claim" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                              </div>
						                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                        }
                                        ?>
                                    </form>
                                </div>
                                <br />
    <?php 
endforeach;
?>
                    </div>
                    <!--  <div class="tab-pane active" id="lB">
<?php
/*foreach ($badges as $badge) :
    if ($badge->id_badge == 1 || $badge->id_badge == 3) {
        ?>
                                <div class="row">
                                    <form method="POST" name="frmClaim">
                                        <input type="hidden" name="badges" value="<?php echo $badge->id_badge; ?>" />

                                        <?php
                                        switch ($badge->id_badge) {
                                            case 1 :
                                                echo '<div class="span8">
						            					<div class="span2">
						            						<img src="' . base_url() . 'assets/images/badges/iOSBadge100.png" width="100"></img>
						            					</div>';

                                                echo '<div class="span5">
						                                    The iOS badge is provided for students that participated on an 
						                                    Apple technology trainning. This course provided content and 
						                                    practice in iOS application development including: iPad, iPhone and iPod touch.
						                                    Unlock Badge.
						                                    <br />
						                                    <input type="submit" value="Claim Right now!" name="claim" class="btn btn-warning" />
						                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
						                               </div>
						                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                            case 3:
                                                echo '<div class="span8">
							            					<div class="span2">
							            						<img src="' . base_url() . 'assets/images/badges/androidbadges.png" width="100"></img>
							            					</div>';
                                                echo '<div class="span5">
							                                    The Android badge is provided for students that participated on an 
							                                    Google technology trainning. This course provided content and 
							                                    practice in Android application development including: Tablet, Phones and iPod touch.
							                                    Unlock Badge.
							                                    <br />
							                                    <input type="submit" value="Claim Right now!" disabled="disabled" class="btn btn-warning" name="claim" />
							                                    <input type="text" id="code" name="code" placeholder="Type Your Code Certificate" />
							                              </div>
							                               </div>';
                                                echo form_error('code');
                                                echo form_error('badge_error');
                                                break;
                                        }
                                        ?>
                                    </form>
                                </div>
                                <br/>
        <?php
    }
endforeach;*/
?>
                    </div>-->
                </div>
            </div>
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
        </div>
    </div>
</div>