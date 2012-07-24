<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Form Sign Up');
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

            <div class="span6">

                <h3><span class="slash">//</span> Recruiter</h3>

                <p>Are you a head hunter? Login below and signup to find your dream team.</p>

                <form method="POST" name="frmRecruiter" action="<?php echo base_url(); ?>index/addRecruiter">

                    <label>Company</label>
                    <input type="text" id="company" name="company" />

                    <?php
                    $company = form_error('company');
                    if (isset($company) && !empty($company)) :
                        ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Oh snap!</strong> <?php echo $company; ?>
                        </div>
                    <?php endif; ?>

                    <label>E-mail</label>
                    <input type="text" id="emailr" name="emailr" />
                    
                    <?php
                    $emailr = form_error('emailr');
                    if (isset($emailr) && !empty($emailr)) :
                        ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Oh snap!</strong> <?php echo $emailr; ?>
                        </div>
                    <?php endif; ?>                    

                    <label>State:</label>
                    <select name="selectUfr">
                        <option value="">--SELECT--</option>
                        <?php foreach ($ufs as $uf) : ?>
                            <option value="<?php echo $uf->id_uf; ?>"><?php echo $uf->sigla; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span><?php echo form_error('selectUf'); ?></span>

                    <br />
                    <input type="submit" value="Sigup" name="signup" />
                </form>        


            </div>

            <div class="span6">

                <h3><span class="slash">//</span> Developer</h3>

                <p>
                    If you are a programmer, just sign-in and put you code and e-mail so that we can know you.
                </p>

                <form method="POST" name="frmProfessional" action="<?php echo base_url(); ?>index/addProfessional">

                    <label>E-mail</label>
                    <input type="text" id="emailp" name="emailp" />

                    <?php
                    $emailp = form_error('emailp');
                    if (isset($emailp) && !empty($emailp)) :
                        ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Oh snap!</strong> <?php echo $emailp; ?>
                        </div>
<?php endif; ?>

                    <label>State:</label>
                    <select name="selectUfp">
                        <option value="">--SELECT--</option>
<?php foreach ($ufs as $uf) : ?>
                            <option value="<?php echo $uf->id_uf; ?>"><?php echo $uf->sigla; ?></option>
<?php endforeach; ?>
                    </select>
                    <span><?php echo form_error('selectUfp'); ?></span>

                    <br />
                    <input type="submit" value="Sigup" name="signup" />
                </form>

            </div>
        </div>

    </div>
</div>