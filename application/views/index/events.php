<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Events');
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
        <div class="alert alert-info">
            <button class="close" data-dismiss="alert">x</button>
            <strong>Events - </strong> Here you will find information about events.
        </div>
        <div class="row-fluid">

            <dir class="span8">

                <div class="tabbable tabs-left">

                    <ul class="nav nav-tabs ">
                        <?php
                        $i = 1;
                        foreach ($groups as $group):
                            ?>
                            <li <?php if ($i == 1) { ?>class="active"<?php } ?>><a href="#<?php echo $i; ?>A" data-toggle="tab"><?php echo $group->name ?></a></li>
                            <!--  <li class=""><a href="#lB" data-toggle="tab">Mobile Development</a></li>-->
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </ul>
                    <div class="tab-content">
                        <?php
                        $k = 1;
                        foreach ($groups as $ind => $group):
                            ?>
                            <div class="tab-pane <?php
                        if ($k == 1) {
                            echo "active";
                        }
                            ?>" id="<?php echo $k; ?>A">
                                <div class="row">
                                    <div class="span6">

                                        <table class="table  table-striped table-condensed">

                                            <colgroup>
                                                <col class="span2">
                                                 <!-- <col class="span4"> -->
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>Event</th>
                                                    <th>Starts</th>
                                                    <th>Ends</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($groups[$ind]->events as $eventgroup) : ?>
                                                    <tr>
                                                        <td width=40%>
                                                            <?php echo $eventgroup->name; ?>
                                                        </td>
                                                        <td><?php echo $eventgroup->starts;?></td>
                                                        <td><?php echo $eventgroup->ends;?></td>
                                                        <td><button btn btn-primary disabled btn-small>
                                                                Add to Wishlist
                                                            </button>
                                                        </td>						
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <?php
                            $k++;
                        endforeach;
                        ?>
                    </div>                
                </div>
            </dir>
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
    </div>
</div>