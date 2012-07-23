<script type="text/javascript" src="<?php echo base_url();?>assets/js/professional.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        Professional.onReady();
    })
</script>

<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Apply for a Job');
    </script>
<?php endif; ?>

<div id="subheader">
    <div class="inner">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</div>

<!--<a class="btn" id="myModal" data-toggle="modal" href="#myModal" >Launch Modal</a>-->

<div id="subpage">	
    <div class="container">

        <!--<div class="row-fluid">

            <div class="tabbable tabs-left">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#lA" data-toggle="tab">Web Development</a></li>
                    <li class=""><a href="#lB" data-toggle="tab">Mobile Development</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="lA">
                        1A
                    </div>
                    <div class="tab-pane" id="lB">
                        1B
                    </div>
                </div>
            </div>
        </div>-->

        <div class="row">

            <?php if ($this->session->flashdata('hasapplied') == true) : ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong> You already applied for this job
                </div>
            <?php endif; ?>


            <div class="span2">
                <ul class="nav nav-tabs nav-stacked">
                    <!--<li class="">
                        <a href="<?php echo base_url(); ?>professional/applyforajob?type=web">Web Development</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>professional/applyforajob?type=mobile">Mobile Development</a>
                    </li>-->
                </ul>

            </div>

            <div class="span10">
                <div class="span8 sidebar ">
                    <form method="POST" id="frmJob" name="frmJob">
                        <?php foreach ($jobs as $job) : ?>

                            <div class="span6">
                                <p>
                                    <?php echo $job->title; ?>
                                </p>
                            </div>

                            <?php $disabled = ''; ?>
                            <?php foreach ($applieds as $applied) : ?>
                                <?php if ($job->id_job == $applied->id_job) : ?>
                                    <?php $disabled = 'disabled="disabled"'; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <div class="span1">
                                <input type="submit" id="<?php echo $job->id_job; ?>" <?php echo $disabled; ?> class="btn btn-primary btn-large" value="Apply" />
                            </div>                        

                            <input type="hidden" name="ids[]" value="<?php echo $job->id_job; ?>" />
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>