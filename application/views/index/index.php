<?php
$fbuid = $this->session->userdata('uid');
$arrBlockedIds = array('100000634528702', '578648267', '1781396621');

if (!in_array($fbuid, $arrBlockedIds) && $_SERVER['HTTP_HOST'] != 'localhost') :
    ?>
    <script type="text/javascript">
        mixpanel.track('Home');
    </script>
<?php endif; ?>

<div id="landing">

    <div class="inner">

        <div class="container">

            <div class="row">

                <div class="span6 landing-screenshot">
                    <iframe width="560" height="400" src="http://www.youtube.com/embed/BCH9lpp1XZg" frameborder="0" allowfullscreen></iframe>
<!-- <img src="./img/grab.png" class="screengrab" alt="Screenshot" /> -->
                </div>                

                <div class="span6 landing-text">

                    <h1>We help you recruit software developers.</h1>
                    <h2>MySkills.com.br - A developer ranking system.</h2>

                    <center>
                        <p class="landing-actions">
                            <?php if ($this->session->userdata('uid') > 0) : ?>
                                <a href="<?php echo base_url(); ?>index/logged" class="btn btn-small btn-primary">Recruiter - Sign-up here</a>
                                <a href="<?php echo base_url(); ?>index/logged" class="btn btn-warning">Developer - Sign-up here</a>
                            <?php else: ?>
                                <a href="#" onclick="fbLogin();"><img src="<?php echo base_url() ?>assets/images/fb/login.png"></img></a>
                            <?php endif; ?>
                        </p>
                    </center>                    

                    <p>If you are a recruiter, reach skilled developers in a categorized validated environment.</p>
                    <p>If you are a developer, become a better coder and get a better job or even a promotion in your actual job.</p>

                </div> <!-- /landing-text -->							

<!-- <iframe width="560" height="315" src="http://www.youtube.com/embed/iqVidWPVBKA" frameborder="0" allowfullscreen></iframe> -->

            </div> <!-- .row -->

        </div> <!-- /container -->

    </div> <!-- /inner -->

</div> <!-- /landing -->

<div id="content"> 
				
	<div class="inner">		
		
		<div class="container">
			
			<div class="row">
			
				<div class="span8">
				
						<h3><span class="slash"></span>Features</h3>
						
						
						<ul class="features-list">
							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-list-alt"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Recruiter - Add jobs by skills</h3>
									<p>If you are a recruiter you can define which skills you want for a given job opportunity. No more resumes from developers not related to your opportunity.</p>									
								</div> <!-- /feature-content -->
							</li>

							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-flag"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Developer - Apply for a Job</h3>
									<p>On MySkills developers can apply for a list of jobs on tech companies based on your skills. You will also receive by e-mail job oportunities related to your skills in your area.</p>
							</div> <!-- /feature-content -->
							</li>
							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-resize-small"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Recruiter - Search the Leaderboard</h3>
									<p>The Leaderboard is our ranking system. Based on developer skills and what we call "skill points", we emphasize those software developers who stand out.</p>
							</div> <!-- /feature-content -->
							</li>

							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-trophy"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Developer - Claim a badge</h3>
									<p>Badges are our way of providing recognition for software development skills. As a developer you can claim badges related to: courses, certification, online tests, events or Apps developed.</p>
							</div> <!-- /feature-content -->
							</li>
							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-trophy"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Recruiter - Schedule an interview</h3>
									<p>As a recruiter you can schedule an interview with a developer. Filter the skills you want for your job opportunity, rank the developers you chose and schedule an interview.</p>
							</div> <!-- /feature-content -->
							</li>
							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-file"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Developer - Apply for a Course</h3>
									<p>You want to improve your software development skills? Join other users in your area and apply for a course in one of our software development trainning center partners.</p>
							</div> <!-- /feature-content -->
							</li>
						</ul> <!-- /features-list -->
						 <!-- /features-list -->
					
				</div> <!-- /span8 -->
			
				
				<div class="span4">
				
						<h3><span class="slash"></span> Testimonials</h3>
						
						
						<ul class="testimonials-list">
							
							<li>
								<div class="testimonial-avatar">
									<div class="img">
										<img src="../assets/images/Testemonial-MichaelDaugherty.png" alt="Thumbnail">									
									</div>
								</div> <!-- /testimonial-avatar -->
								
								<div class="testimonial-text">
									<p>
										<span class="testimonial-author">Michael Daugherty</span>
										 "I checked out your site, BTW. I really like the idea of authenticated badges to reliably indicate skills and experiences. I've done some hiring myself, and it can be tough to figure out who has really done great work and who hasn't". - HackerBeers.com - Beijing - China.
										
									</p>								
								</div> <!-- /testimonial-text -->
							</li>
							
							<li>
								<div class="testimonial-avatar">
									<div class="img">
										<img src="../assets/images/Testemonial-DavidJohnston.png" alt="Thumbnail">										</div>
								</div> <!-- /testimonial-avatar -->
								
								<div class="testimonial-text">
									<p>
										<span class="testimonial-author">David A Johnston</span>
										"I'll be interested to try out your website. Our team will be looking for a good Front End Developer toward the end of our Alpha period and certainly for the Beta". - LDEngine.com  - USA
										
									</p>								
								</div> <!-- /testimonial-text -->
							</li>
								
							
						</ul>	
					
				</div> <!-- /span4 -->
				
			</div> <!-- /row -->			
			
		</div> <!-- /container -->	
		
	</div> <!-- /inner -->
	

</div><!-- Content -->

<!-- SPAN4 subiu pra SPAN12 somente para apresentar o icone do Facebook-->
<!-- <div class="span4">

    <h3><span class="slash">//</span> Stay In Touch</h3>


    <p>There are real people behind MySkills.com.br, so if you have a question or suggestion (no matter how small) please get in touch with us:</p>

    <ul class="social-icons-container">
        
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
       
        <li>							
            <a href="http://www.facebook.com/MySkills.com.br" class="social-icon social-icon-facebook">
                Facebook
            </a>
        </li>

    </ul>--> <!-- /extra-social --> 

<!--  </div>  --><!-- /span4 -->

<div class="span4">

    <div class="fb-like-box" data-href="http://www.facebook.com/MySkills.com.br" data-width="350" data-colorscheme="dark" data-show-faces="true" data-stream="false" data-header="false"></div>

    <!--
    <h3><span class="slash">//</span> Subscribe and get updates</h3>
        <p>Subscribe to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
        
        
        <form>
                
                <input type="text" name="subscribe_email" placeholder="Your Email" />
                
                <br />
                
                <button class="btn ">Subscribe</button>
        </form>-->


</div><!-- /span4 -->
