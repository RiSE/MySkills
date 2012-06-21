<div class="row">

    <div class="span2">
        <img src="<?php echo base_url(); ?>assets/images/jrafael.jpg" width="100" style="border:thick groove green;"/> 
        
    </div>

    <div class="span6">
        <h3><span class="slash">Professional:</span>Jos&eacute; Rafael</h3>
        <hr>
        <h4><span class="slash">Role:</span>Systems Analyst</h4>
        <hr>
        <h4><span class="slash">Graduation:</span>Universidade Cat&oacute;lica de Pernambuco</h4>
        <hr>
        <h4><span class="slash">Badges:</span></h4>

        <div id="bhwidget">. . .</div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>    

        <script type="text/javascript">

            var url = "http://beta.openbadges.org/displayer/5353/group/2046.json";
            $.getJSON(url,
            function(data) {
                var i=0;
                //var widgetcode = "<table>";
                var widgetcode = "";
                while (i < data.badges.length < 4) {
                    //widgetcode = widgetcode + "<tr><td align='center'>";
                    badgeName = data.badges[i].assertion.badge.name;
                    imgUrl = data.badges[i].assertion.badge.image;
                    critUrl = data.badges[i].assertion.badge.criteria;
                    assertUrl = data.badges[i].hostedUrl;
                    //widgetcode = widgetcode + "<a href='#'><img src='"+imgUrl+"' width='100' height='100' border='0'/></a><br /><a href='" + critUrl + "'>" + "</a>";
                    //widgetcode = widgetcode + "<a href='#'><img src='"+imgUrl+"' width='100'/></a><a href='" + critUrl + "'>" + "</a>";
                    //widgetcode = widgetcode + "<img src='"+imgUrl+"' width='100'/><a href='" + critUrl + "'>" + "</a>";
                    widgetcode = widgetcode + "<img src='"+imgUrl+"' width='100'/>";
                    //widgetcode = widgetcode + "</td></tr>";
                    i = i+1;
                    if (i === data.badges.length || i === 3) {
                        //widgetcode = widgetcode + "</table>";
                        document.getElementById("bhwidget").innerHTML=widgetcode;
                        //return;
                    }
                    
                    var urlUnlock = '<?php echo base_url(); ?>assets/images/badges/unlock100.png';
                    
                    document.getElementById("bhwidget").innerHTML += "<img src='"+urlUnlock+"' widht='100' />";
                    document.getElementById("bhwidget").innerHTML += "<img src='"+urlUnlock+"' widht='100' />";
                    document.getElementById("bhwidget").innerHTML += "<img src='"+urlUnlock+"' widht='100' />";
                    document.getElementById("bhwidget").innerHTML += "<img src='"+urlUnlock+"' widht='100' />";
                }
            }
        );
        </script>

    </div>

    <div class="span4">
        <div class="sidebar">
            <h4><span class="slash">//</span>iOS Training Badge</h4>
            <img src="<?php echo base_url(); ?>assets/images/badges/iOSBadge100.png" width="50" align="left" />

            <p>
                The iOS badge is provided for students that participated on an 
                Apple technology trainning. This course provided content and 
                practice in iOS application development including: iPad, iPhone and iPod touch.
                Unlock Badge.
            </p>

            <h4><span class="slash">//</span>The Unlock Badge</h4>
            <img src="<?php echo base_url(); ?>assets/images/badges/unlock100.png" width="50" align="left"/>

            <p>
                The Unlock badge is used as a visual representation for programmers and 
                recruiters that the programmer can unlock other badges in the future to improve his profile page.
            </p>

        </div>
    </div>
</div>