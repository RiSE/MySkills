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
				
						<h3><span class="slash">//</span> What You'll Get</h3>
						
						
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
									<h3>Feature #1</h3>
									<p>Nunc metus ligula, fringilla quis porta ut, tellus arcu  mi eget adipiscing dictum ut turpis. Aliquam eget odio.</p>									
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
									<h3>Feature #2</h3>
									<p>Vestibulum ante ipsum primis tellus arcu  mi eget adipiscing in faucibus orci luctus et ultrices posuere cubilia curae.</p>
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
									<h3>Feature #3</h3>
									<p>Aliquam justo massa, rhoncus quis tellus arcu  mi eget adipiscing suscipit eget, malesuada vel nulla. Sed ac nunc.</p>
							</div> <!-- /feature-content -->
							</li>
							<li class="feature">
								<div class="feature-thumbnail">
									<div class="circle-icon">
										<div>
											<i class="icon-tint"></i>
										</div>
									</div> <!-- /circle-icon -->
								</div> <!-- /feature-thumbnail -->
								
								<div class="feature-content">
									<h3>Feature #4</h3>
									<p>Phasellus mollis, tortor vitae ornare commodo, augue tellus arcu  mi eget adipiscing risus varius quam, sit amet.</p>
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
									<h3>Feature #5</h3>
									<p>Sed feugiat pellentesque tellus arcu  mi eget adipiscing dui, laoreet aliquet enim condimentum quis commodo.</p>
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
									<h3>Feature #6</h3>
									<p>Phasellus varius sapien id ante ultrices eu malesuada mauris molestie. Cras erat tellus arcu  mi eget adipiscing quam.</p>
							</div> <!-- /feature-content -->
							</li>
						</ul> <!-- /features-list -->
						 <!-- /features-list -->
					
				</div> <!-- /span8 -->
			
				
				<div class="span4">
				
						<h3><span class="slash">//</span> Testimonials</h3>
						
						
						<ul class="testimonials-list">
							
							<li>
								<div class="testimonial-avatar">
									<div class="img">
										<img alt="Thumbnail" src="http://wbpreview.com/previews/WB000C138/img/avatar.png">									
									</div>
								</div> <!-- /testimonial-avatar -->
								
								<div class="testimonial-text">
									<p>
										<span class="testimonial-author">John Doe</span>
										Morbi a tellus tellus. Integer et ipsum ipsum, blandit pharetra nisl. In vitae lorem a magna.
										
									</p>								
								</div> <!-- /testimonial-text -->
							</li>
							
							<li>
								<div class="testimonial-avatar">
									<div class="img">
										<img alt="Thumbnail" src="http://wbpreview.com/previews/WB000C138/img/avatar2.png">									
									</div>
								</div> <!-- /testimonial-avatar -->
								
								<div class="testimonial-text">
									<p>
										<span class="testimonial-author">John Doe</span>
										Morbi a tellus tellus. Integer et ipsum ipsum, blandit pharetra nisl. In vitae lorem a magna.
										
									</p>								
								</div> <!-- /testimonial-text -->
							</li>
								
								
							<li>
								<div class="testimonial-avatar">
									<div class="img">
										<img alt="Thumbnail" src="http://wbpreview.com/previews/WB000C138/img/avatar3.png">									
									</div>
								</div> <!-- /testimonial-avatar -->
								
								<div class="testimonial-text">
									<p>
										<span class="testimonial-author">John Doe</span>
										Morbi a tellus tellus. Integer et ipsum ipsum, blandit pharetra nisl. In vitae lorem a magna.
										
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