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
    <head>

        <meta charset="utf-8">
        <title>MySkills.com.br</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/reboot-landing.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/reboot-landing-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/themes/green/theme.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/pages/homepage.css" rel="stylesheet">

        <!--<link href="<?php echo base_url(); ?>assets/js/lightbox/themes/default/jquery.lightbox.css" rel="stylesheet">-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery/jquery.js"></script>

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
                                    
                /*FB.Event.subscribe('auth.login', function(response) {
                    if (response.status == 'connected') {
                            
                        FB.api('/me', function(response) {
                                
                            var data = {
                                uid : response.id,
                                email : response.email
                            };
                                
                            $.ajax({
                                type : 'POST',
                                dataType : 'json',
                                data : data,
                                url : base_url + 'index/login',
                                success : function() {
                                    document.location.reload();
                                }
                            });
                        });
                    }                        
                });*/
                                    
                /*FB.Event.subscribe('auth.logout', function(response) {
                    
                    console.log(response);
                    
                    if (response.status != 'connected') {
                        $.ajax({
                            type : 'POST',
                            dataType : 'json',
                            url : base_url + 'index/logout',
                            success : function() {
                                //document.location.reload();
                                window.location = base_url + 'index/signout';
                            }
                        });
                    }
                });*/
            };
            
            function fbLogin() {
                
                //FB.getLoginStatus(function(response) {
                  //  if (response.session) {
                    //    console.log(response);
                    //} else {
                        
                        FB.login(function(data) {
                            //if (response.session) {
                                FB.api('/me', function(response) {
                                
                                    var data = {
                                        uid : response.id,
                                        email : response.email
                                    };
                                
                                    $.ajax({
                                        type : 'POST',
                                        dataType : 'json',
                                        data : data,
                                        url : base_url + 'index/login',
                                        success : function() {
                                            document.location.reload();
                                        }
                                    });
                                });
                            //}
                        });
                 //   }
                //});
            }
            
            function fbLogout() {
                $.ajax({
                    type : 'POST',
                    dataType : 'json',
                    url : base_url + 'index/logout'
                });
                FB.logout(function(response) {
                    window.location = base_url + 'index/signout';
                });
            };
                        
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
                            <li>						
                                <a href="<?php echo base_url(); ?>index/programmer">
                                    Programmer of the Week
                                </a>						
                            </li>
                            <li>						
                                <a href="<?php echo base_url(); ?>index/about">
                                    How It Works
                                </a>						
                            </li>
                            <li>						
                                <a href="<?php echo base_url(); ?>index/contact">
                                    Contact Us
                                </a>						
                            </li>
                            <li>
                                <?php if (!$this->session->userdata('uid') > 0) : ?>
                                    <a href="#">Sign-in</a>
                                <?php else: ?>
                                    <a href="#" onclick="fbLogout();" >Sign-out</a>
                                <?php endif; ?>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>

        <div id="subheader">

            <div class="inner">

                <div class="container">

                    <h1><?php echo $title; ?></h1>

                </div>

            </div>

        </div>

        <div id="subpage">	
            <div class="container">
                <?php echo $content_for_layout; ?> 
            </div>
        </div>

        <div id="footer">

            <div class="inner">

                <div class="container">

                    <div class="row">
                        <div id="footer-copyright" class="span4">
                            &copy; 2012 RiSE.
                        </div>

                        <div id="footer-terms" class="span8"></div> 
                    </div> 

                </div>

            </div> 

        </div> 

    </body>
</html>