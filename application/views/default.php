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
        <link href="./css/font-awesome.css" rel="stylesheet">

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
                       
            var base_url = '<?php echo base_url(); ?>';
            function FBinit() {
                window.fbAsyncInit = function() {
                    FB.init({
                        appId      : '380703318658533',
                        status     : true, 
                        cookie     : true,
                        xfbml      : true,
                        oauth      : true
                    });
                
                    /*FB.getLoginStatus(function(response) {
                        
                        if (response.status === 'connected') {
                            //window.location = 'programmerlogged';
                            //console.log(response.status);
                        }
                    });*/
                
                    //FB.getLoginStatus(updateButton);
                    //FB.Event.subscribe('auth.statusChange', updateButton);
                    
                    FB.Event.subscribe('auth.login', function(response) {
                        window.location = 'programmerlogged';
                    });
                    
                    /*FB.Event.subscribe('auth.statusChange', function(response) {
                        
                        console.log(response.status);
                        
                        var button = document.getElementById('aimg');
                        
                        var srcLogout = button.src = base_url + 'assets/images/fb/logout.png'; 
                        var srcLogin = button.src = base_url + 'assets/images/fb/login.png'; 
                        
                        if (response.status == 'connected') {
                            button.src = srcLogout;
                        } else {
                            button.src = srcLogin;
                        }
                        
                    });*/
                };                
            }
            
            FBinit();
           
            
            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
            
            
            function fbStatus() {
                
                FB.getLoginStatus(function(response) {
                    if (response.status === 'connected') {
                        window.location = 'programmerlogged';
                    } 
                });
            }
            
            /*function fbLogout(url) {
                //FB.logout();
                //window.location = 'index';
                var redirect = '/logout';
                
                if (url != undefined || url != null) {
                    redirect = url;    
                }
                
                FB.Connect.logoutAndRedirect(redirect); 
                return false;
            }*/
            
            function updateButton(response) {
                
                var button = document.getElementById('aimg');
                var suplink = document.getElementById('suplink');
                
                if (button != null) {
                
                    if (response.status === 'connected') {
                        //button.innerHTML = '<div class="fb-login-button">Logout</div>';
                        //button.innerHTML = 'Logout';
                        button.src = base_url + 'assets/images/fb/logout.png';
                        suplink.style.display = 'block';
                        button.onclick = function() {
                            FB.logout(function(response) {
                                                        
                                //Log.info('FB.logout callback', response);
                                window.location = 'index';
                            });
                        };
                    } else {
                
                        //button.innerHTML = '<div class="fb-login-button">Login</div>';
                        //button.innerHTML = 'Login';
                        button.src = base_url+ 'assets/images/fb/login.png';
                        suplink.style.display = 'none';
                        button.onclick = function() {
                        
                            FB.login(function(response) {
                                //Log.info('FB.login callback', response);
                                //if (response.status === 'connected') {
                                
                                //Log.info('User is logged in');
                                //} else {
                                //Log.info('User is logged out');
                                //}
                            });
                        }
  
                    }
                }
            }
            
            function fbLogin() {
                
                FB.login(function(response) {
                    if (response.authResponse) {
                        
                        //FB.api('/me', function(response) {  
                        //});
                        
                        //window.location = 'programmerlogged'
                        
                    }
                },{scope: 'email'});
            };
            
            function fbLogout() {
                FB.logout(function() {
                    window.location = 'index';
                });
            }
                        
            window.onload = function() {
                
                var fbLogount = document.getElementById('abtnlogin');
                var fbLogin = document.getElementById('fbLogin');
                
                FB.getLoginStatus(function(response) {
                    
                    if (response.status === 'connected') {
                        fbLogin.style.display = 'none';
                        fbLogount.style.display = 'block';
                    } else {
                        fbLogin.style.display = 'block';
                        fbLogount.style.display = 'none';
                    }
                    
                });
            };
            
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

                            <!--<li>
                                <a id="abtnlogins" >
                            <!--<div class="fb-login-button">Login with Facebook</div>
                            <fb:login-button id="abtnlogin">Login with Facebook</fb:login-button>
                        </a>
                    </li> -->

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