<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Apply for a Courses');
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
                    <form method="POST" name="frmJob" action="<?php echo base_url(); ?>index/applyCourse">
                        <?php foreach ($courses as $course) : ?>

                            <div class="span7">
                                <div class="span5">
                                    <h4><?php echo $course->title; ?></h4>
                                    <?php echo $course->description; ?>
                                </div>
	                                  <?php $disabled = ''; ?>
			                            <?php foreach ($applieds as $applied) : ?>
			                                <?php if ($course->id_course == $applied->id_course) : ?>
			                                    <?php $disabled = 'disabled="disabled"'; ?>
			                                <?php endif; ?>
			                            <?php endforeach; ?>
			
	                            <div class="span1">
	                                <input type="submit" <?php echo $disabled; ?> class="btn btn-primary btn-large" value="Apply" />
	                            </div>                        
                            </div>

                            <input type="hidden" name="ids" value="<?php echo $course->id_course; ?>" />
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>