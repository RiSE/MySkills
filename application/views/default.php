<!DOCTYPE html>
<html lang="en">
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-32586156-1']);
        _gaq.push(['_setDomainName', 'myskills.com.br']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <!-- start Mixpanel -->
    <script type="text/javascript">
        (function(c,a){var b,d,h,e;b=c.createElement("script");b.type="text/javascript";b.async=!0;b.src=("https:"===c.location.protocol?"https:":"http:")+'//api.mixpanel.com/site_media/js/api/mixpanel.2.js';d=c.getElementsByTagName("script")[0];d.parentNode.insertBefore(b,d);a._i=[];a.init=function(b,c,f){function d(a,b){var c=b.split(".");2==c.length&&(a=a[c[0]],b=c[1]);a[b]=function(){a.push([b].concat(Array.prototype.slice.call(arguments,0)))}}var g=a;"undefined"!==typeof f?g=
                    a[f]=[]:f="mixpanel";g.people=g.people||[];h="disable track track_pageview track_links track_forms register register_once unregister identify name_tag set_config people.set people.increment".split(" ");for(e=0;e<h.length;e++)d(g,h[e]);a._i.push([b,c,f])};a.__SV=1.1;window.mixpanel=a})(document,window.mixpanel||[]);
        mixpanel.init("7f870774942301f4f0b1e8a1dd1f3e68");
        
<?php
//578648267 eduardo 
//1781396621 eliakim
//100000634528702 tiago
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');
?>

<?php
if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost'):

    if (isset($fbuid) && !empty($fbuid)) {
        $professionalexist = $this->professional_model->loadProfessional($fbuid);

        if ($professionalexist):
            $email = $professionalexist[0]->email;
            $datacadastro = $professionalexist[0]->created;
        else:
            $recruiterexist = $this->recruiter_model->loadRecruiter($fbuid);
            $email = $recruiterexist[0]->email;
            $datacadastro = $recruiterexist[0]->created;
        endif;
        ?>
                  mixpanel.identify("<?php echo $fbuid; ?>");
                  mixpanel.people.set({
                      "name": "<?php echo $this->session->userdata('name'); ?>",
                      "$email": "<?php echo $email; ?>",
                      "$created": "<?php echo $datacadastro; ?>"
                  });
                  mixpanel.name_tag("<?php echo $this->session->userdata('name'); ?>");        
        <?php
    }
    ?>
            
<?php endif; ?>
    </script><!-- end Mixpanel -->        
    <head>

        <meta charset="utf-8">
        <title><?php echo $title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-tab.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/reboot-landing.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/reboot-landing-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/themes/green/theme.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/pages/homepage.css" rel="stylesheet">

        <!--<link href="<?php echo base_url(); ?>assets/js/lightbox/themes/default/jquery.lightbox.css" rel="stylesheet">-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/facebook.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap_tab.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap_alert.js"></script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="fb-root"></div>
        <script type="text/javascript">
                       
            var appId = '<?php echo $this->facebook_model->getAppId(); ?>';
            var base_url = '<?php echo base_url(); ?>';

            window.fbAsyncInit = function() {

                FB.init({
                    appId      : appId,
                    status     : true, 
                    cookie     : true,
                    xfbml      : true,
                    oauth      : true
                });

                FB.getLoginStatus(function(response) {
                    if (response.status == 'connected') {
                        FB.api(
                        {
                            method : 'fql.query',
                            query : 'SELECT uid, name, pic, pic_square, work FROM user WHERE uid = me()'
                        }
                        , me);
                    }
                });
            };

            function me(response) {
                var hname = document.getElementById('hname');
                hname.innerHTML += response[0].name;
                //var hwork = document.getElementById('hwork');
                //hwork.innerHTML += response[0].work[0].position.name + ' at ' + response[0].work[0].employer.name;
            }

            function fbLogin() {

                FB.login(function(data) {
                    FB.api('/me', function(response) {

                        var data = {
                            uid   : response.id,
                            email : response.email,
                            name  : response.name
                        };

                        $.ajax({
                            type : 'POST',
                            dataType : 'json',
                            data : data,
                            url : base_url + 'index/login',
                            success : function(rs) {
                                if (rs.professional == true) {
                                    window.location = base_url + 'index/profile';
                                } else if (rs.recruiter == true) {
                                    window.location = base_url + 'index/profileRecruiter';
                                } else {
                                    document.location.reload();
                                }
                            }
                        });
                    }, {scope: 'user_photos,email'});

                });
            };

            function fbLogout() {
                $.ajax({
                    type : 'POST',
                    dataType : 'json',
                    url : base_url + 'index/logout',
                    success : function() {
                        FB.logout();
                        //document.location.reload();
                        window.location = base_url + 'index/index';
                    }
                });
                //FB.logout(function(response) {
                //window.location = base_url + 'index/logout';
                //window.location = base_url;
                //});
            };
    
            window.onload = function() {
                //isAppUser();
            }
    
            function isAppUser() {
                FB.getLoginStatus(function(response) {
                    if (response.status == 'connected') {
                        var FQL = 'SELECT uid FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1'
                        FB.api({
                            method : 'fql.query',
                            query : FQL
                        }, function(rs) {
                            console.log(rs);
                        });                
                    }
                });
            }

            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
                        
        </script>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="nav-collapse">

                        <ul class="nav pull-right">

                            <li class="active">						
                                <a href="<?php echo base_url(); ?>">
                                    Home
                                </a>						
                            </li>
                            <?php if ($this->session->userdata('uid') > 0 && $this->session->userdata('existdb') == true) : ?>
                                <li>						
                                    <a href="<?php echo base_url(); ?>index/jobs">
                                        Apply for a job
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($this->session->userdata('uid') > 0 && $this->session->userdata('existdb') == true) : ?>
                                <li>						
                                    <a href="<?php echo base_url(); ?>index/claimBadges">
                                        Claim Badge
                                    </a>						
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo base_url(); ?>index/features">
                                    Features
                                </a>
                            </li>
                            <li>						
                                <a href="<?php echo base_url(); ?>index/contact">
                                    Contact Us
                                </a>						
                            </li>
                            <?php if ($this->session->userdata('uid') > 0) : ?>
                                <!--<li>
                                    <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=square" width="25" height="25" />
                                    <a><?php echo $this->session->userdata('name'); ?></a>
                                </li>-->

                                <li>
                                    <a href="#" onclick="fbLogout();" >Sign-out</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <?php if ($this->session->userdata('uid') > 0) : ?>
                        <ul>
                            <li>
                                <img id="userpic" src="https://graph.facebook.com/<?php echo $this->session->userdata('uid'); ?>/picture&type=square" width="25" height="25" />
                                <?php if ($this->session->userdata('pro') == true) {
                                    $link = 'index/profile';
                                } else if ($this->session->userdata('rec') == true) {
                                    $link = 'index/recruiterProfile';
                                }
                                ?>
                                <a href="<?php echo base_url() . $link; ?>"><?php echo $this->session->userdata('name'); ?></a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
        </div>

        <?php echo $content_for_layout; ?> 

        <div id="footer">
            <div id="extra">
                <div class="inner">

                    <div class="container">

                        <div class="row">
                            <!-- SPAN4 subiu pra SPAN12 somente para apresentar o icone do Facebook-->
                            <div class="span4">

                                <h3><span class="slash">//</span> Quick Links</h3>


                                <ul class="footer-links clearfix">
                                    <li><a href="./">Home</a></li>
                                    <!-- <li><a href="./pricing.html">Plans</a></li>
                                     <li><a href="../features.html">Features</a></li>
                                     <li><a href="./about.html">About</a></li>
                                     <li><a href="./faq.html">FAQ</a></li>-->
                                </ul>

                                <ul class="footer-links clearfix">  	
                                    <!--   <li><a href="javascript:;">Support</a></li>
                                     <li><a href="javascript:;">License</a></li>
                                     <li><a href="javascript:;">Terms of Use</a></li>-->
                                    <li><a href="<?php echo base_url(); ?>index/privacyPolicy">Privacy Policy</a></li>
                                    <!-- <li><a href="javascript:;">Something Else</a></li> -->
                                </ul>

                            </div>
                            <div class="span4">

                                <h3><span class="slash">//</span> Stay In Touch</h3>


                                <p>There are real people behind MySkills.com.br, so if you have a question or suggestion (no matter how small) please get in touch with us:</p>

                                <ul class="social-icons-container">
                                    <!--
                                    <li>
                                            <a href="javascript:;" class="social-icon social-icon-twitter">
                                                    Twitter
                                            </a>
                                    </li>
                                            
                                    <li>
                                            <a href="javascript:;" class="social-icon social-icon-googleplus">
                                                    Google +
                                            </a>
                                    </li>
                                    -->
                                    <li>							
                                        <a href="http://www.facebook.com/MySkills.com.br" class="social-icon social-icon-facebook">
                                            Facebook
                                        </a>
                                    </li>

                                </ul> <!-- /extra-social -->

                            </div> <!-- /span4 -->


                            <div id="footer-terms" class="span8"></div> 
                        </div> 

                    </div>

                </div> 
            </div>

        </div>

        <!-- begin olark code --><script data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
            window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
            /* custom configuration goes here (www.olark.com/documentation) */
            olark.identify('8338-468-10-6680');/*]]>{/literal}*/</script><noscript><a href="https://www.olark.com/site/8338-468-10-6680/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript><!-- end olark code -->        
    </body>
</html>