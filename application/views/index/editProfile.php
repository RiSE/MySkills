<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Edit Profile');
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

        <form method="POST" name="frmEditProfile">

            <?php if ($this->session->flashdata('error_message') != '') : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> <?php echo $this->session->flashdata('error_message'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success_message') != '') : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> <?php echo $this->session->flashdata('success_message'); ?>
                </div>
            <?php endif; ?>

            <div class="row-fluid">

                <div class="span9">

                    <!--<img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=normal"  style="border:thick groove green;" />-->

                    <!--<div class="row">
                        <div class="span6">
                            <span class="label label-info">Name</span>
                            <input type="text" >
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">Name</span>
                            <input type="text" class="span4" name="name" value="<?php echo $user->name; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">Surname</span>
                            <input type="text" class="span4" name="surname" value="<?php echo $user->surname; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">E-mail</span>
                            <input type="text" class="span4" name="email" value="<?php echo $user->email; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">I want a position as:</span>
                            <label class="checkbox">
							  <input type="checkbox" name="trainee" <?php if($user->trainee == "1"){ echo "checked = 'checked'";}?> value="1">
							 Trainee
							</label>
                            <label class="checkbox">
							  <input type="checkbox" name="employee" <?php if($user->employee == "1"){ echo "checked = 'checked'";}?> value="1">
							  Employee
							</label>
                            <label class="checkbox">
							  <input type="checkbox" name="freelancer" <?php if($user->freelancer == "1"){ echo "checked = 'checked'";}?> value="1">
							  Freelancer
							</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">Availability of working::</span>
                            <label class="checkbox">
							  <input name="anotherCity" type="checkbox" <?php if($user->another_city == "1"){ echo "checked = 'checked'";}?> value="1">
							 I want to work in Another City
							</label>
							<label class="checkbox">
							  <input type="checkbox" name="anotherCountry" <?php if($user->another_country == "1"){ echo "checked = 'checked'";}?> value="1">
							 I want to work in Another Country
							</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                          <span class="label label-info">State</span>
                           <select name="state">
							  <option value="">select your state</option>
							  <option value="AC" <?php if($user->state == "AC"){ echo "selected = 'selected'";}?> >AC</option>
							  <option value="AL" <?php if($user->state == "AL"){ echo "selected = 'selected'";}?>>AL</option>
							  <option value="AM" <?php if($user->state == "AM"){ echo "selected = 'selected'";}?>>AM</option>
							  <option value="BA" <?php if($user->state == "BA"){ echo "selected = 'selected'";}?>>BA</option>
							  <option value="CE" <?php if($user->state == "CE"){ echo "selected = 'selected'";}?>>CE</option>
							  <option value="DF" <?php if($user->state == "DF"){ echo "selected = 'selected'";}?>>DF</option>
							  <option value="ES" <?php if($user->state == "ES"){ echo "selected = 'selected'";}?>>ES</option>
							  <option value="GO" <?php if($user->state == "GO"){ echo "selected = 'selected'";}?>>GO</option>
							  <option value="MA" <?php if($user->state == "MA"){ echo "selected = 'selected'";}?>>MA</option>
							  <option value="MT" <?php if($user->state == "MT"){ echo "selected = 'selected'";}?>>MT</option>
							  <option value="MS" <?php if($user->state == "MS"){ echo "selected = 'selected'";}?>>MS</option>
							  <option value="MG" <?php if($user->state == "MG"){ echo "selected = 'selected'";}?>>MG</option>
							  <option value="PA" <?php if($user->state == "PA"){ echo "selected = 'selected'";}?>>PA</option>
							  <option value="PB" <?php if($user->state == "PB"){ echo "selected = 'selected'";}?>>PB</option>
							  <option value="PR" <?php if($user->state == "PR"){ echo "selected = 'selected'";}?>>PR</option>
							  <option value="PE" <?php if($user->state == "PE"){ echo "selected = 'selected'";}?>>PE</option>
							  <option value="PI" <?php if($user->state == "PI"){ echo "selected = 'selected'";}?>>PI</option>
							  <option value="RJ" <?php if($user->state == "RJ"){ echo "selected = 'selected'";}?>>RJ</option>
							  <option value="RN" <?php if($user->state == "RN"){ echo "selected = 'selected'";}?>>RN</option>
							  <option value="RS" <?php if($user->state == "RS"){ echo "selected = 'selected'";}?>>RS</option>
							  <option value="RO" <?php if($user->state == "RO"){ echo "selected = 'selected'";}?>>RO</option>
							  <option value="RR" <?php if($user->state == "RR"){ echo "selected = 'selected'";}?>>RR</option>
							  <option value="SC" <?php if($user->state == "SC"){ echo "selected = 'selected'";}?>>SC</option>
							  <option value="SP" <?php if($user->state == "SP"){ echo "selected = 'selected'";}?>>SP</option>
							  <option value="SE" <?php if($user->state == "SE"){ echo "selected = 'selected'";}?>>SE</option>
							  <option value="TO" <?php if($user->state == "TO"){ echo "selected = 'selected'";}?>>TO</option>
							</select>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <span class="label label-info">Video-url</span>
                            <input type="text" class="span4" name="video_url" value="<?php echo $user->video_url; ?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="span1">
                            <input type="submit" class="btn btn-primary btn-large" value="Save" />
                        </div>                        
                    </div>

                </div>

                <div class="span3">
                    <div class="sidebar">
                        <h4><span class="slash">Applicants (Coming Soon)</span></h4>
                        <p>Are you the only one who wants to work in this company? Find out here.</p>

                        <h4><span class="slash">Skill Points (Coming Soon)</span></h4>
                        <p>The developers in this company are skilled? Here you find how many skill points this company has.</p>
                        <h4><span class="slash">Wishlist (Coming Soon)</span></h4>
                        <p>Do you wish to work in a specific company? Add it to your Wishlist and we might help you.</p>

                    </div>
                </div>

            </div>

        </form>
    </div>
</div>