<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Mailing Archive');
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
<style type="text/css">

<!--

.display_archive {font-family: arial,verdana; font-size: 12px;}

.campaign {line-height: 125%; margin: 5px;}

//-->

</style>

<script language="javascript" src="http://us5.campaign-archive2.com/generate-js/?u=c22dec5cbd87c068118755814&fid=1497&show=10" type="text/javascript"></script>
		

	</div> <!-- /container -->	

	

</div> <!-- /subpage -->