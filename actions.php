<?php
//wgew
include('connect.php');


$query = "INSERT INTO `userInfo` (`id`, `email`, `password`) VALUES (NULL, 'do@d', 'ds');";

function signUp($link)
{
	
	//	//	  userID userName email password sdfsd
		$error = '';
	
	if (!$_POST['userID']) {
            $error .= "A user ID is required<br>";
        } 
	
	if (!$_POST['userName']) {
            $error .= "A username is required<br>";
        } 
	
	 if (!$_POST['email']) {
            $error .= "An email address is required<br>";
        } 
        
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        }
	
		if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
		  		$error .= "Email is not a valid email<br>";
			}
	
		$query = "SELECT id FROM `userInfo` WHERE userName = '".mysqli_real_escape_string($link, $_POST['userName'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error .= "That username is taken<br>";

                }
        
		$query = "SELECT id FROM `userInfo` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error .= "That email address is taken<br>";

                }
	
			if ($error != "") {
				return $error;
				
        		}
		$query = "INSERT INTO `userInfo` (`userID`, `userName`,  `email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['userID'])."', '".mysqli_real_escape_string($link, $_POST['userName'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                    if (!mysqli_query($link, $query)) {

                        return "Could not sign you up - please try again later.<br>";

                    } else {
							   $tempId = mysqli_insert_id($link);
                        $query = "UPDATE `userInfo` SET password = '".password_hash($_POST['password'], PASSWORD_DEFAULT)."' WHERE id = ".$tempId." LIMIT 1";

                        if(mysqli_query($link, $query))
								{
									$_SESSION['id'] = $tempId;
									return 1;
								}
							  else
							  {
								  $query = "DELETE FROM userInfo WHERE id='".$tempId."' LIMIT 1";
								  mysqli_query($link, $query);
								  return "Could not sign you up - please try again later.<br>";;
							  }
}
}


function subLogin($row)
{
	$_SESSION['id'] = $row['id'];
	$_SESSION['userID'] = $row['userID'];
	$_SESSION['userName'] = $row['userName'];
	$_SESSION['email'] = $row['email'];
}

function logIn($link)
{
$query = "SELECT * FROM `userInfo` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
	  $result = mysqli_query($link, $query);
	  $row = mysqli_fetch_array($result);
	  if (isset($row)) {
		  	if (password_verify(''.$_POST['password'].'', $row['password'])) {
				unset($row['password']);
				subLogin($row);
                $_POST['login'] = '1';
    			return 1;
			}
	  }
else
{
		
$query = "SELECT * FROM `userInfo` WHERE userName = '".mysqli_real_escape_string($link, $_POST['email'])."'";
	  $result = mysqli_query($link, $query);
	  $row = mysqli_fetch_array($result);
	  if (isset($row)) {
		  	if (password_verify(''.$_POST['password'].'', $row['password'])) {
				unset($row['password']);
				subLogin($row);
    			return 1;
			}
	  }
		
}
	
	
	return 'Not able to find username/password combination';
}


if ($_GET['action'] == 'logOn') {
	echo logIn($link);
}


if ($_GET['action'] == 'signUp') {
    echo signUp($link);
	
}

if ($_GET['action'] == "logOut")
{
    $_SESSION['id'] = '';
    $_SESSION['password'] = '';
}

function sendVerificationEmail($email)
{
    global $link;
    $query = "SELECT `email` FROM `userInfo` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $result = uniqid();   
        $passwordRecoveryCode = substr($result, 0, 6);
        
        $query = "UPDATE `userInfo` SET emailVerification='".$passwordRecoveryCode."' WHERE email='".$email."' LIMIT 1";
        
        if(mysqli_query($link, $query))
        {
            $emailTo = "mattdaw7@gmail.com";
            $subject = "tete";
            $body = "wetwet";
            $headers = "FROM: me@website.com";
            return '1';
            if(mail($emailTo, $subject, $body, $headers))
            {
                return "1";
            }
            else
            {
                return "Email could not be sent";
            }
            
            //mail($email,"Password Recovery","Your password recovery code is: ".$passwordRecoveryCode.", BCC ");
        }
        else
        {
            return "Email could not be sent";
        }
        
        //mail($email,"Password Recovery",$message,[$headers],[$parameters]);
    }
    else
    {
        return "Email could not be found in database";
    }
    
}

function verifyChangePasswordCode($email, $changeCode)
{
    global $link;
    
    $query = "SELECT * FROM `userInfo` WHERE email='".mysqli_real_escape_string($link, $email)."' LIMIT 1";
    
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    if($row['emailVerification'] == $changeCode)
    {
        return '1';
    }
    else
    {
        return 'That code is incorrect';
    }
    
}

if($_GET['action'] == 'recoverPassword')
{
    echo sendVerificationEmail($_POST['email']);
    //echo $_POST['email'];
    //mail($to_email_address,$subject,$message,[$headers],[$parameters]);
}

if($_GET['action'] == 'verifyPasswordCode')
{
    print_r(verifyChangePasswordCode($_POST['email'], $_POST['password']));
}

function changePassword($email, $newPassword)
{
    global $link;
    if(($newPassword == '')||($newPassword == ' '))
    {
        return 'New password can not be empty';
    }
    $query = "UPDATE `userInfo` SET password = '".password_hash($newPassword, PASSWORD_DEFAULT)."' WHERE email = ".$email." LIMIT 1";
    $passwordRecoveryCode = $newPassword;
    $query = "UPDATE `userInfo` SET password='".password_hash($_POST['password'], PASSWORD_DEFAULT)."' WHERE email='".$email."' LIMIT 1";
    
    //return $query;
    if(mysqli_query($link, $query))
    {
        return 1;
    }
    else
    {
        return "Unable to chnage password";
    }
    
}

if($_GET['action'] == 'changePassword')
   {
    echo changePassword($_POST['email'], $_POST['password']);
   }

if($_GET['action'] == 'getSession')
{
	$php_array = array('abc','def','ghi');
    $js_array = json_encode($php_array);
    echo "var javascript_array = ". $js_array . ";\n";
}


?>