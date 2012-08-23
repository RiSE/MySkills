<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dashboard/dashboard.js"></script>
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
                <strong>Oh snap! </strong><span id="msnerro"></span> 
            </div>            

            <?php if ($this->session->flashdata('setprofile')) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> You just set your profile
                </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('message_sent') == true) : ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> You just sent a message
                </div>            
            <?php endif; ?>
            
            <div class="span12">
                <div class="sidebar">
                    <?php if ($this->session->userdata('id_profile') == null) : ?>
                        <center>
                            <h3><span class="slash">//</span>Are you...</h3>
                            <p class="landing-actions">
                                <a href="#" id="btnRecruiter" class="btn btn-small btn-primary">Recruiter</a>
                                <a href="#" id="btnDeveloper" class="btn btn-warning">Developer</a>
                            </p>
                        </center>
                    <?php else: ?>
                        <form class="form-horizontal" method="POST" name="frmDBoard" id="frmDBoard">
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls" style="text-align:center">
                                        <textarea name="message" placeholder="Send a public message. (limited to 140 characters) Will appear after you refresh the page." class="input-xlarge" id="Message" style="width: 580px;" id="textarea" rows="3" ></textarea>
                                        <button type="button" id="PostMessage" class="btn-primary btn-large">Post Message</button>
                                        <br>
                                        <span id="limitecaracter">0</span>
                                    </div>

                                </div>

                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <h2 style="text-align:left">Activity Feed</h2>
                        </div>

                        <?php foreach ($userMessages as $userMessage) : ?>
                            <pre><img id="userpic" src="https://graph.facebook.com/<?php echo $userMessage['fbuid']; ?>/picture&type=small" /><?php echo"&nbsp;" . $userMessage['name'] . " said:&nbsp;" . $userMessage['message']; ?></pre>
                            <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

