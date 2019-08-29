<!doctype html>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <script src="https://kit.fontawesome.com/dfdbf3ed97.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	  <style>
		.modal-body
		  {
			  text-align:center;
		  }
		  
		#forgotPassword
          {
              font-size: 12px;
              padding-top: 10px;
              width: 95%;
              text-align:right;
          }
	  	.moduleAlert
		  {
			  margin-top:1em;
			  width: 80%;
			  text-align:center;
		  }
        .finLogSignClass
          {
              width:90%;
              height: 2.8em;
              margin-top: .6em;
          }
        #jumboTron
          {
              height: 700px;
          }
        #navBar
          {
              height: 70px;
          }
	  </style>
      
      <input type='hidden' id='signInData' value="<?php echo $_SESSION['id'] ?>">
	  
  </head>
    
  <body>
    

      
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id='modalContent'>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log In/Sign Up</h5>
        <button type="button" id="moduleClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		 
		 	<div  class="alert alert-danger alert-dismissible fade show container moduleAlert" id="moduleError">
				<strong><u>Error</u></strong><br>
				<span id='modErrorDump'>hi</span>
				<button type="button" class="close alertButtonClose" id="alertButtonClose" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		 	</div>
		 
		 	<div  class="alert alert-success alert-dismissible fade show container moduleAlert" id="moduleSuccess">
				<strong><u>Success</u></strong><br>
				<span id='modSuccessDump'>hi</span>
				<button type="button" class="close alertButtonClose" id="alertButtonClose" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		 	</div>
		 
      <div id="loginModal1" class="modal-body" align='center'>
						
                        <div  class="">
                        	<div class="form-top">
                        		<div class="form">
                        			<h3>Login to our site</h3>
                        		</div>
                        		<div class="form">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <br>
			                    <form role="form" action="" method="post" class="login-form">
                                        <span>Username or Email</span>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username or Email</label>
			                        	<input type="email" name="form-username" placeholder="Username or Email" class="form-username form-control" id="form-username1">
			                        </div>
                                        <span>Password</span>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password1">
			                        </div>
			                        <button id="finLogIn" type="button" class="finLogSignClass btn btn-primary">Log In</button>
                                    <div id='forgotPassword'><a data-target="#2exampleModal" id='forgotPasswordAct' href="#">Forgot Password?</a></div>
			                    </form>
		                    </div>
                        </div>
      		        </div>
		 
		 <div id="loginModal2" class="modal-body" align='center'>
                        <div  class="">
                        	<div class="form-top">
                        		<div class="form">
                        			<h3>Sign up to our site</h3>
                        		</div>
                        		<div class="form">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <br>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
										<span >User ID</span>
								    <div class="form-group">
			                    		<label class="sr-only" for="form-username">What others will see</label>
			                        	<input type="text" name="form-username" placeholder="User ID (what other users will see)" class="form-username form-control" id="form-userIdSignUp">
			                        </div>
                                        <span>Username</span>
								    <div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="form-username" placeholder="Username" class="form-username form-control" id="form-usernameSignUp">
			                        </div>
										<span>Email</span>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="email" name="form-username" placeholder="Email" class="form-username form-control" id="form-userEmailSignUp">
			                        </div>
                                        <span>Password</span>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password"  name="form-password2" placeholder="Password" class="form-password form-control" id="form-password2">
			                        </div>
                                    <button id="finSignUp" type="button" class="finLogSignClass btn btn-primary">Sign Up</button>
			                    </form>
		                    </div>
                        </div>
      			</div>
		 
      		<div class="modal-footer">
					<button type="button" id="modLogSign" class="btn btn-light">Sign Up</button>
      		</div>
		 </div>
	  </div>
	</div>

      
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id='modalContent'>
      <div class="modal-header">
        <h5 class="modal-title" id="2exampleModalLabel">Pasword Recovery</h5>
        <button type="button" id="2moduleClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		 
		 	<div  class="alert alert-danger alert-dismissible fade show container moduleAlert" id="2moduleError">
				<strong><u>Error</u></strong><br>
				<span id='2modErrorDump'></span>
				<button type="button" class="close alertButtonClose" id="2alertButtonClose" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		 	</div>
		 
		 	<div  class="alert alert-success alert-dismissible fade show container moduleAlert" id="2moduleSuccess">
				<strong><u>Success</u></strong><br>
				<span id='2modSuccessDump'></span>
				<button type="button" class="close alertButtonClose" id="2alertButtonClose" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		 	</div>
		 
      <div id="2loginModal1" class="modal-body" align='center'>
						
                        <div  class="">
                        	<div class="form-top">
                        		<div class="form">
                        			<h3>Enter The Email You Signed Up With And We Will Send a Verification Code</h3>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <br>
			                    <form role="form" action="" method="post" class="login-form">
                                        <span>Email</span>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="email" name="form-username" placeholder="Email" class="form-username form-control" id="2form-username1">
			                        </div>
			                        <button id="2passRecovSubmit" type="button" class="finLogSignClass btn btn-primary">Send Verification Code</button>
			                    </form>
		                    </div>
                        </div>
          
          </div>
          <div id="2loginModal2" class="modal-body" align='center'>
						
                        <div  class="">
                        	<div class="form-top">
                        		<div class="form">
                        			<h3>Enter the Verification Code We Sent to </h3><h3 id='emailVerifyUserEmailDump'></h3>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <br>
			                    <form role="form" action="" method="post" class="login-form">
                                        <span>Verification Code</span>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Verification Code</label>
			                        	<input type="text" name="form-username" placeholder="Verification Code" class="form-username form-control" id="emailVerificationCodeInput">
			                        </div>
			                        <button id="emailVerificationCodeSubmit" type="button" class="finLogSignClass btn btn-primary">Submit Verification Code</button>
			                    </form>
		                    </div>
                        </div>
          </div>
        
          <div id="2loginModal3" class="modal-body" align='center'>
						
                        <div  class="">
                        	<div class="form-top">
                        		<div class="form">
                        			<h3>Enter New Password</h3>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <br>
			                    <form role="form" action="" method="post" class="login-form">
                                        <span>New Password</span>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">New Password</label>
			                        	<input type="text" name="form-username" placeholder="New Password" class="form-username form-control" id="newPasswordInput">
			                        </div>
			                        <button id="submitNewPassword" type="button" class="finLogSignClass btn btn-primary">Change Password</button>
			                    </form>
		                    </div>
                        </div>
          </div>
        
          <div class="modal-footer">
					<button type="button" id="2returnToLogin" class="btn btn-light">Return to Login/Sign Up</button>
      		
        </div>
		 </div>
	  </div>
	</div>
