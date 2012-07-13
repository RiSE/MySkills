<script type="text/javascript">
    mixpanel.track("Apply for a Job");
    
    $(document).ready(function() {
        //$('#myModal').modal('toggle');
    });
</script>

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

        <div class="row">

            <div class="span2">
                <ul class="nav nav-tabs nav-stacked">
                    <!--<li class="">
                        <a href="<?php echo base_url(); ?>professional/applyforajob?type=web">Web Development</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>professional/applyforajob?type=mobile">Mobile Development</a>
                    </li>-->
                </ul>

                <!--<div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                      <li class="active">
                          <a href="#lA" data-toggle="tab">Section 1</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      
                    </div>
                </div>-->
            </div>

            <div class="span10">
                <div class="span8 sidebar ">
                    <form method="POST" name="frmJob" action="<?php echo base_url(); ?>index/apply">
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
                                <input type="submit" <?php echo $disabled; ?> class="btn btn-primary btn-large" value="Apply" />
                            </div>                        

                            <input type="hidden" name="ids" value="<?php echo $job->id_job; ?>" />
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>