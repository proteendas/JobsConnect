<style>

.sgn {
  color: white;
  text-align:right;
  padding-right:30px;
  cursor: context-menu;
}

.lk {
  color: #e9c46a;
  text-decoration:none;
}

.lk:hover {
  color: #e9c46a;
  text-decoration:none;
  cursor: pointer;
}
.ba {
  color:#e9c46a;
}

  </style>

<!-- Modal -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="modal fade" id="myEmployerModal" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel" 
     style="background-image:url('img/siginBack.jpg'); background-size: cover; background-repeat: no-repeat;">
    
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-image: url(img/1bck.jpg);">
       
            <div class="modal-header">
              <button id="empSignInCloseBtn" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myEmployerModalLabel" style="color:white;">Sign In</h4>
            </div>
           
          <div class="modal-body"> 
              
            <!-- log in form -->
	    <div id="cd-login"> 
              <form class="cd-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p class="fieldset">
			<label class="image-replace cd-email" for="eemail">E-mail</label>
                        <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="Enter Your E-mail">
                        <span class="cd-error-message" style="color:white;">Error message here!</span>
		</p>

                <p class="fieldset">
			<label class="image-replace cd-password" for="epass">Password</label>
                        <input class="full-width has-padding has-border" id="password" name="password" type="password"  placeholder="Enter Your Password">
			<a href="#0" class="hide-password">Show</a>
			<div id="loginresult" style="display:none;color:white;">Error message here!</div>
                </p>

                        <input type="hidden" id="currentPage" name="currentPage" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p class="fieldset">
                        <input id="loginsubmit" class="full-width" type="submit" name="loginsubmit" id="login" value="Login">
                </p>
	      </form>
		
                <p class="cd-form-bottom-message">
                  <p id="regNowBtn"  class="sgn" data-toggle="modal" data-target="#empsignup"> Don't have an account? <a class="lk">Register Now!</a> </p>
                </p>                
	    </div>
          </div>
          <div class="modal-footer"></div>           
      </div>
    </div>
</div>
<!--------------------------------------------------------------------------------------------------------->  
 

<div class="modal fade" id="empsignup" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-image: url(img/1bck.jpg);">
      <div class="modal-header">
          <button id="signUpCloseBtn" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
              <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myEmployerModalLabel">New Account</h4>
      </div>
        
      <div class="modal-body">
          
          <!-- sign up form -->
          <div id="cd-empsignup"> 
            <div id="result" style="display:none;"></div>
            
            <div class="container" style="">

                <ul class="nav nav-tabs" style="width: 535px;">
                    <li class="active " style="padding-left: 30px;"><a data-toggle="tab" href="#home" class="ba">Employer Register</a></li>
                    <li><a data-toggle="tab" class="ba" href="#menu1">Jobseeker Register</a></li>
                </ul>

                <div class="tab-content">
      <div id="home" class="tab-pane fadein active" style="width: 50%;">
          <h3 style="color: white; padding-left: 30px;">Register as Employer</h3>
      <form class="cd-form" method="post" action="registerEmployer.php" enctype="multipart/form-data">
                                        <p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-username" for="empsignup-username">Username</label>
                                                <input class="full-width has-padding has-border" id="name" name="name" type="text" placeholder="Enter Username">
						
					</p>

					<p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-email" for="empsignup-email">E-mail</label>
                                                <input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="Enter E-mail">
						
					</p>

					<p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-password" for="empsignup-password">Password</label>
                                                <input class="full-width has-padding has-border" id="password" name="password" type="password"  placeholder="Enter Password">
                                                <a href="#0" class="hide-password" style="color: grey; padding-right: 70px;">Show</a>
						
					</p>
                                 
                                        
					<p class="form-group">
                                            <button id="regsubmit" class="full-width has-padding btn-success"  style="padding:10px; background-color: #e9c46a;color:#1d3557;">Create account</button>
					</p>
                                       
				</form>

    </div>
    <div id="menu1" class="tab-pane fade"  style="width: 50%;">
      <h3 style="color: white; padding-left: 30px;">Register as Job Seeker</h3>
      <form class="cd-form" method="post" action="registerJobseeker.php" enctype="multipart/form-data">
					<p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-username" for="empsignup-username">Username</label>
                                                <input class="full-width has-padding has-border" id="name" name="name" type="text" placeholder="Enter Username">
						
					</p>

					<p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-email" for="empsignup-email">E-mail</label>
						<input class="full-width has-padding has-border" id="email" name="email" type="email" placeholder="Enter E-mail">
						
					</p>

					<p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-password" for="empsignup-password">Password</label>
                                                <input class="full-width has-padding has-border" id="password" name="password" type="password"  placeholder="Enter Password">
                                                <a href="#0" class="hide-password" style="padding-right: 70px;">Show</a>
					
					</p>
                                        <p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-username" for="empsignup-username">Qualification</label>
						<input class="full-width has-padding has-border" id="qlf" name="qlf" type="text" placeholder="Qualification">
						
					</p>
                                        <p class="fieldset" style="padding-right: 30px;">
                                            <label class=" image-replace cd-username" for="empsignup-username">Date of Birth</label>
                                            <input class="full-width has-padding has-border" id="dob" name="dob" type="date" placeholder="date of birth">
						
					</p>
                                         <p class="fieldset" style="padding-right: 30px;">
						<label class="image-replace cd-username" for="empsignup-username">skills</label>
                                                <input class="full-width has-padding has-border" id="skills" name="skills" type="text" placeholder="skills">
						
					</p>
                                        
                                       
					<p class="form-group">
                                            <button id="regsubmit" class="full-width has-padding btn-success" style="padding:10px; background-color: #e9c46a;color:#1d3557;">Create account</button>
					</p>
                                       
				</form>

    </div>
    
    
  </div>
</div>
            
	</div> <!-- cd-empsignup -->

		
     
    </div>
  </div>
</div></div>


<div><button id="regEmpSuccessSubmit" data-toggle="modal" data-target="#regEmpSuccess" style="display: none">Success Message</button></div>



  <!-- Success Modal -->
  <div class="modal fade" id="regEmpSuccess" tabindex="-1" role="dialog" aria-labelledby="myEmployerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button id="empSignInCloseBtn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myEmployerModalLabel"> Registration Successful! </h4>
      </div>
      <div class="modal-body">
        <div id="cd-login">
                    
                       
                        <br><span>Login to continue</span>
                            <div class="center-block">
                              <button id="cancelEmpregModal" type="button" class="btn btn-default" data-dismiss="modal"  style="width: 150px;">Done</button>   
                              </div>             
			 
		</div>
        </div>
    </div>
</div>
  </div> 
  <script src="js/registerUser.js"></script>	
