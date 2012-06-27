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

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=421791307842403";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

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
                                <a href="./">
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
                                <?php if (!$this->session->userdata('uid') > 0) :?>
                                    <a href="#">Sign-in</a>
                                <?php else: ?>
                                    <a href="#" onclick="fbLogout();" >Sign-out</a>
                                <?php endif; ?>
                            </li>                            
                        </ul>

                    </div><!--/.nav-collapse -->	

                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->



        <div id="landing">

            <div class="inner">

                <div class="container">

                    <div class="row">


                        <div class="span6 landing-text">


                            <h1>The best way to hire <br/>developers in Brazil.</h1>
                            <h2>A software developer ranking system.</h2>

                            <p>If you are a recruiter, reach skilled developers in a categorized validated environment.</p>
                            <p>If you are a programmer, become a better coder and get a better job or even a promotion in your actual job.</p>

                            <p class="landing-actions">
                                <a href="http://www.myskills.com.br/index/recruiters" class="btn btn-small btn-primary">Recruiter - Sign-up here</a>
                                <a href="http://www.myskills.com.br/index/programmers" class="btn btn-warning">Developer - Sign-up here</a>
                            </p>		

                        </div> <!-- /landing-text -->							

<!-- <iframe width="560" height="315" src="http://www.youtube.com/embed/iqVidWPVBKA" frameborder="0" allowfullscreen></iframe> -->

                        <div class="span6 landing-screenshot">	
                            <iframe width="560" height="400" src="http://www.youtube.com/embed/iqVidWPVBKA" frameborder="0" allowfullscreen></iframe>
    <!-- <img src="./img/grab.png" class="screengrab" alt="Screenshot" /> -->
                        </div>

                    </div> <!-- .row -->

                </div> <!-- /container -->

            </div> <!-- /inner -->

        </div> <!-- /landing --> 




        <!-- SPAN4 subiu pra SPAN12 somente para apresentar o icone do Facebook-->
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

        <div class="span8">

            <div class="fb-like-box" data-href="http://www.facebook.com/MySkills.com.br" data-width="800" data-colorscheme="dark" data-show-faces="true" data-stream="false" data-header="false"></div>

            <!--
            <h3><span class="slash">//</span> Subscribe and get updates</h3>
            

            <p>Subscribe to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
            
            
            <form>
                    
                    <input type="text" name="subscribe_email" placeholder="Your Email" />
                    
                    <br />
                    
                    <button class="btn ">Subscribe</button>
            </form>
            -->

        </div> <!-- /span4 -->
        <!--				
                                </div> <!-- /row -->
        <!--			
                        </div> <!-- /container -->
        <!--		
                </div> <!-- /inner -->
        <!--	
        </div> <!-- /extra -->




        <div id="footer">

            <div class="inner">

                <div class="container">

                    <div class="row">
                        <div id="footer-copyright" class="span4">
                            &copy; 2012 RiSE.
                        </div> <!-- /span4 -->

                        <div id="footer-terms" class="span8">

                        </div> <!-- /span8 -->
                    </div> <!-- /row -->

                </div> <!-- /container -->

            </div> <!-- /inner -->

        </div> <!-- /footer -->

    </body>
</html>
