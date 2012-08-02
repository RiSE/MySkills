<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Companies');
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

           <div class="tabbable tabs-left">
                <ul class="nav nav-tabs ">
                   <?php 
                   		$i= 1;
                   		foreach ($groups as $group):?>
                    	<li class="active"><a href="#<?php echo $i;?>A" data-toggle="tab"><?php echo $group->group?></a></li>
                    <!--  <li class=""><a href="#lB" data-toggle="tab">Mobile Development</a></li>-->
                    <?php $i++; endforeach;?>
                </ul>
                <div class="tab-content">
                 <?php 
                   	$i= 1;
                   	foreach ($groups as $group):?>
                    <div class="tab-pane active" id=<?php echo $i;?>"A">
                    		<div class="row">
                                    <div class="span8">
                                        
                                        <table class="table-striped">
									        <colgroup>
									          <col class="span8">
									           <!-- <col class="span4"> -->
									        </colgroup>
									        <thead>
									          <tr>
									            <th>Company</th>
									           <!--  <th>Description</th> -->
									          </tr>
									        </thead>
									        <tbody>
				                        <?php
				                        $companies = $this->company_model->listCompanyInGroup($group->id_group);
				                        foreach ($companies as $dadoscompany) :
				                              
				                                ?>
                                
											        
											          <tr>
											            <td>
											             	<h4> <?php $company = $this->company_model->loadCompany($dadoscompany->id_company); 
										                     	   echo $company[0]->company;
										                     	?>
										                  </h4>
											            </td>
											           <!--  <td>
											             	<h4> <?php $company = $this->company_model->loadCompany($dadoscompany->id_company); 
										                     	   echo $company[0]->company;
										                     	?>
										                  </h4>
											            </td> -->
											          </tr>
    <?php 
endforeach;
?>
										</tbody>
										</table>
  										 </div>
                                </div>
                    </div>
<?php 
endforeach;
?>
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
        </div>
    </div>
</div>