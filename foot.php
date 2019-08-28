	  
	  
<div id="testDump"></div>

   <!--Button trigger modal-->
<button type="hidden" style="visibility:hidden;" id="modalActivate" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></button>

<button type="hidden" style="visibility:hidden;" id="2modalActivate" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"></button>
	  
<input id="userEmailVar" style="visibility:hidden;">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	  
	  <script> 
         //test 
		  if(($("#signInData").val()) != '')
              {
                  $("#logInBtn").html("Logout");
              }
		  
		  //begginning work
		  $("#loginModal2").hide();
          $("#2loginModal2").hide();
          $("#2loginModal3").hide();
		  
		  //clear module
		  $("#modalActivate").click(function(){
			  $(".moduleAlert").hide();
			  $("#form-username1").val('');
			  $("#form-password1").val('');
			  $("#form-userIdSignUp").val('');
			  $("#form-usernameSignUp").val('');
			  $("#form-userEmailSignUp").val('');
			  $("#form-password2").val('');
		  })
		  
		  //alert close
		  $("#alertButtonClose").click(function(){
			  $(".moduleAlert").hide();
		  })
          $(".alertButtonClose").click(function(){
			  $(".moduleAlert").hide();
		  })
		  
          //pssword recovery
          $("#forgotPasswordAct").click(function(){
              $(".moduleAlert").hide();
              $("#modalActivate").trigger('click');
              $("#2modalActivate").trigger('click');
          })
          
          $("#2returnToLogin").click(function(){
              $("#2modalActivate").trigger('click');
              $("#modalActivate").trigger('click');
          })
          
		  function logIn(){
				$("#logInBtn").html("Logout");
				$("#modSuccessDump").html("Sign Up Successful");
				$("#moduleError").hide();
				$("#moduleSuccess").show();
			   //gege
			  	function closeModal(){
					$("#moduleClose").click();
				};
				window.setTimeout( closeModal, 800 );
		  }
          
		  function logOut(){
			  $("#logInBtn").html("Login or SignUp");
			  $.ajax({
						type: "POST",
						url: "actions.php?action=logOut",
						success: function(result) {
						}  
				  })
		  }
		  
		  $("#logInBtn").click(function(){
			  //alert('hi');
			  if($("#logInBtn").html() == 'Login or SignUp')
				  {
                      if($("#modLogSign").html() == 'Log In')
				        {
                               $("#modLogSign").trigger('click');
                        }
					  $("#modalActivate").trigger('click');
					  
				  }
			  else{
				  		logOut();
				  		
			  		}
		  })
		  
		  $("#modLogSign").click(function(){
			  $(".moduleAlert").hide();
			  if($("#modLogSign").html() == 'Sign Up')
				  {
					  $("#loginModal1").hide();
					  $("#loginModal2").show();
					  $("#modLogSign").html("Log In");
				  }
			  else{
				  		$("#loginModal1").show();
				  		$("#loginModal2").hide();
				  		$("#modLogSign").html("Sign Up");
			  		}
		  })
          
          $("#finSignUp").click(function() {
              $.ajax({
						type: "POST",
						url: "actions.php?action=signUp",
						data: { userID: $("#form-userIdSignUp").val(), userName: $("#form-usernameSignUp").val(),  email: $("#form-userEmailSignUp").val(), password: $("#form-password2").val()},
						success: function(result) {
							if(result == 1)
								{
									logIn();
								}
								else{
									//alert(result);
									$("#modErrorDump").html(result);
									$("moduleSuccess").hide();
									$("#moduleError").show();
								}
						}  
				  })
          })
          
          
          $("#finLogIn").click(function (){
              $.ajax({
						type: "POST",
						url: "actions.php?action=logOn",
						data: {email: $("#form-username1").val(), password: $("#form-password1").val()},
						success: function(result) {
							 if(result == 1)
								{
									logIn();
								}
								else{
									$("#modErrorDump").html(result);
									$("#moduleSuccess").hide();
									$("#moduleError").show();
								}
						}  
			  		})
          })
          
          
		  $("#2passRecovSubmit").click(function(){
              $.ajax({
						type: "POST",
						url: "actions.php?action=recoverPassword",
						data: {email: $("#2form-username1").val()},
						success: function(result) {
                            if(result == 1)
								{
                                    $("#userEmailVar").val($("#2form-username1").val());
                                    $("#2modalActivate").trigger('click');
                                    function closeModal(){
                                        $(".moduleAlert").hide();
                                        $("#2modalActivate").trigger('click');
                                       $("#2moduleSuccess").hide();
                                        $("#emailVerifyUserEmailDump").html($("#userEmailVar").val());
                                        $("#2loginModal1").hide();
                                        $("#2loginModal2").show();
                                    };
                                    window.setTimeout( closeModal, 350 );
								}
								else{
									$("#2modErrorDump").html(result);
									$("#2moduleSuccess").hide();
									$("#2moduleError").show();
								}
                        }
              })
          })
          
          $("#emailVerificationCodeSubmit").click(function(){
              $.ajax({
						type: "POST",
						url: "actions.php?action=verifyPasswordCode",
						data: {email: $("#userEmailVar").val(), password: $("#emailVerificationCodeInput").val()},
						success: function(result) {
                        if(result == 1)
								{
                                    $("#2modalActivate").trigger('click');
                                    function closeModal(){
                                        $(".moduleAlert").hide();
                                        $("#2modalActivate").trigger('click');
                                        $("#emailVerificationChangePassEmailDump").html($("#userEmailVar").val());
                                        $("#2loginModal2").hide();
                                        $("#2loginModal3").show();
                                    };
                                    window.setTimeout( closeModal, 350 );
								}
								else{
									$("#2modErrorDump").html(result);
									$("#2moduleSuccess").hide();
									$("#2moduleError").show();
								}
                        }

              })
          })
          //
           $("#submitNewPassword").click(function(){
              $.ajax({
						type: "POST",
						url: "actions.php?action=changePassword",
						data: {email: $("#userEmailVar").val(), password: $("#newPasswordInput").val()},
						success: function(result) {
                        if(result == 1)
								{
                                $("#2modSuccessDump").html("Password has been changed");
									$("#2moduleError").hide();
									$("#2moduleSuccess").show();
                                    function closeModal(){
                                        $("#2moduleClose").click();
                                        $("#2loginModal2").hide();
                                        $("#modalActivate").trigger('click');
                                    };
                                    window.setTimeout( closeModal, 900 );
								}
								else{
									$("#2modErrorDump").html(result);
									$("#2moduleSuccess").hide();
									$("#2moduleError").show();
								}
                        }
              })
           })
          
          
		  //testWork
		  $("#actBtn2").click(function(){
			  
			  $("#modalActivate").trigger('click');
			  
			  if($("#actBtn2").html() == 'button')
				  {
					  $("#actBtn2").html("2");
				  }
			  else{
				  		$("#actBtn2").html("button");
			  		}
		  })
		  
	  		$("#actBtn").click(function(){
		  
		  var myString = "abc";
		  
		  $.ajax({
            type: "POST",
            url: "actions.php?action=postTweet",
            data: "tweetContent=" + myString,
            success: function(result) {
                $("#testDump").html(result);
            }  
        })
	  })
	  
	  </script>
	  
	  
  </body>
</html>