<!doctype html>

<?php
session_start();
if(!isset($_SESSION['userName']))
{
   $_SESSION['userName'] = '';
    $_POST['changeCode'] = '';
}
?>

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
          
         /*drop menu css*/ 
        #dropbtn {
        }
        .dropdown1 {
          position: relative;
          display: inline-block;
        }

        .dropdown-content1 {
          display: none;
          position: absolute;

        }
        .dropdown-contentStyle
        {
            background-color: #f1f1f1;
            width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropHide
        {
            display:none;
        }
        .dropdown-contentStyle a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
           height: 70px;
        }
        .dropdown-content2
            {
                position:absolute;
                left: 160px;
                top: 0px;
                z-index:2;
            }
        #innerBox
            {
                width: 160px;
            }
        .dropdown-content1 a:hover {background-color: #ddd;}
        .dropdown1:hover .dropdown-content1 {display: block;}
        /*.dropdown1:hover #dropbtn {background-color: #3e8e41;}*/
        .dropdown-content2 a:hover {background-color: #ddd;}
        .dropdown2:hover .dropdown-content2 {display: block;}
          
        th
            {
                text-align:center;  
            }
        .th1
            {
                 height: 30px;
                 font-size:20px;
                 text-decoration:underline;
            }

        .th2
            {
                font-size: 14px;
            }          
        .th3
          {
              text-decoration: none;
              text-align:center;  
          }
          
	  </style>
      
      <input type='hidden' id='signInData' value="<?php echo $_SESSION['id'] ?>">
	  
  </head>
  <body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=home">Home</a>
      </li>
        
        
        
        
        
        
        
<li class="nav-item dropdown">
    <div class="dropdown1">
        
        <a id="dropbtn" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop By Category</a>
  
  <div class="dropdown-content1 dropdown-contentStyle">
<?php
    
    $linkKeys = array();
    
    if(($_SESSION['userName']) == 'ADMIN' || (!file_exists("neededTabs.txt"))|| (!file_exists("navTabs.txt"))|| (!file_exists("linkKeys.txt")))
    {
    
    $navTabs = '';
        
    $rawPageInput = file_get_contents("http://www.balsamachining.com/"); 
    
    $exploded = explode ('<a class="qmparent">', $rawPageInput);
    $count = 0;
    for($i = 1; $i < sizeof($exploded)-1; $i++)
    {
        $tempVar2 = array();   
        $tempVar3 = array();
        $tempVar4 = array();
        $tempVar2 = explode('href="#">', $exploded[$i]);
        for($j = 0; $j < (sizeof($tempVar2)); $j++)
        {
            $tempVar3 = explode("</a>", $tempVar2[$j]);
            $tempVar4[$j] = $tempVar3[0];
        }
        
        if(sizeof($tempVar4) == 2)
        {
            $navTabs .= '<a href="?page='.$tempVar4[0].'">'.$tempVar4[0].'</a>';
            $count++; 
            $linkKeys[(sizeof($linkKeys))] = $tempVar4[0];
        }
        else
        {
            $navTabs .= '<div class="dropdown2"><a href="#" id="innerBox" class="">'.$tempVar4[0].'</a><div style="top:'.($count*70).'px;" class="dropHide dropdown-content2 dropdown-contentStyle">';
            
            for($k = 1; $k < sizeof($tempVar4); $k++)
            {
                $navTabs .= '<a href="?page='.$tempVar4[$k].'">'.$tempVar4[$k].'</a>';
                $linkKeys[(sizeof($linkKeys))] = $tempVar4[$k];
            }
            
            $navTabs .= "</div></div>";
            $count++;
        }
        
        $_SESSION['neededTabs'][($i-1)] = $tempVar4;
        
        $myFile = fopen("navTabs.txt", 'w');
        fclose($myFile);
        $stringData = serialize($navTabs);
        file_put_contents("navTabs.txt", $stringData);
        
        $myFile = fopen("neededTabs.txt", 'w');
        fclose($myFile);
        $stringData = serialize($_SESSION['neededTabs']);
        file_put_contents("neededTabs.txt", $stringData);
        
        $myFile = fopen("linkKeys.txt", 'w');
        fclose($myFile);
        $stringData = serialize($linkKeys);
        file_put_contents("linkKeys.txt", $stringData);
    }
    }
    
$string_data = file_get_contents("neededTabs.txt");
$_SESSION['neededTabs'] = unserialize($string_data);
             
$string_data = file_get_contents("linkKeys.txt");
$linkKeys = unserialize($string_data);
             
$string_data = file_get_contents("navTabs.txt");
echo unserialize($string_data);
        
?>
</div></div>  
</li>
    </ul>
    
      <button id='logInBtn' class="btn btn-outline-success my-2 my-sm-0" type="submit">Login or SignUp</button>
    
  </div>
</nav>
      
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
      