<script type="text/javascript" src="<?php echo base_url(); ?>js/dashboard.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Dashboard.onReady();
    });
</script>

<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Dashboard');
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

            <div id="divError" class="alert alert-error" style="display: none">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> 
            </div>

            <?php if ($this->session->flashdata('setprofile')) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> You just set your profile
                </div>
            <?php endif; ?>

            <div class="span12">
                <div class="sidebar">
                    <?php if ($this->session->userdata('developer') == false && $this->session->userdata('recruiter') == false) : ?>
                        <center>
                            <h3><span class="slash">//</span>Are you...</h3>
                            <p class="landing-actions">
                                <a href="#" id="btnRecruiter" class="btn btn-small btn-primary">Recruiter</a>
                                <a href="#" id="btnDeveloper" class="btn btn-warning">Developer</a>
                            </p>
                        </center>
                    <?php else: ?>
                        <h3><span class="slash">//</span>Comming soon... :)</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

