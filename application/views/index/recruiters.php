<script type="text/javascript">
    mixpanel.track("Recruiters");
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

            <div class="span12">

                <h3><span class="slash">//</span> Recruiting</h3>

                <p>Are you a head hunter? Login below and signup to find your dream team.</p>

                <?php if (!$this->session->userdata('uid') > 0) : ?>

                    <!--<div id="fbLogin" class="fb-login-button" size="xlarge" scope="email">Login with Facebook</div>-->
                    <a href="#" onclick="fbLogin();"><img src="<?php echo base_url() ?>assets/images/fb/login.png"></img></a>

                <?php else: ?>
                    <form method="POST" name="frmRecruiter">

                        <label>Company</label>
                        <input type="text" id="company" name="company" />
                        <span><?php echo form_error('company'); ?></span>

                        <label>E-mail</label>
                        <input type="text" id="email" name="email" />
                        <span><?php echo form_error('email'); ?></span>            

                        <label>State:</label>
                        <select name="selectUf">
                            <option value="">--SELECIONE--</option>
                            <?php foreach ($ufs as $uf) : ?>
                                <option value="<?php echo $uf->id_uf; ?>"><?php if ($uf->sigla != 'OC') : echo $uf->sigla; else: echo $uf->nome; endif; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span><?php echo form_error('selectUf'); ?></span>

                        <br />
                        <input type="submit" value="Sigup" name="signup" />
                    </form>

                <?php endif; ?>

            </div> <!-- /span12 -->
        </div>

    </div>
</div>