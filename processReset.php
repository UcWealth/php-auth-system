<?php session_start();

// collecting the data
$errorCount = 0;
// verifying the data, validation

if(!$_SESSION['loggedIn']) {

    $token = $_POST['token'] == "" ? $errorCount++ : $_POST['token'];
    $_SESSION['token'] = $token;

}
 

$email = $_POST['email'] == "" ? $errorCount++ : $_POST['email'];
$password = $_POST['password'] == "" ? $errorCount++ : $_POST['password'];


$_SESSION['email'] = $email;

if($errorCount > 0){
    //redirect back, and display error
    $_SESSION['error'] = "You have ".$errorCount." error".($errorCount>1 ? "s" : "") ." in your form submission!";
    header("Location: reset.php");
} else {
    //do reset stuff here
    //Check that the email is registered in tokens folder
    //Check if th content of the registered token is the same as $token

    // count all users
    $allUserTokens = scandir("db/tokens/");
    $countAllUserTokens = count($allUserTokens);

    for($counter = 0; $counter < $countAllUserTokens; $counter++){
        $currentTokenFile = $allUserTokens[$counter];
        if($currentTokenFile == $email.".json"){
            //now check if token is the same as $token
            $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;

            //Check if user is logged in
            ($_SESSION['loggedIn']) ? $checkToken = true : $checkToken = $tokenFromDB == $token;

            if($checkToken){
                
                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);

                for($counter = 0; $counter < $countAllUsers; $counter++){
                    $currentUser = $allUsers[$counter];
                    if($currentUser == $email.".json"){
                        //check password
                        $userString = file_get_contents("db/users/".$currentUser);
                        $userObject = json_decode($userString);
                        $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                        unlink("db/users/".$currentUser);
                        file_put_contents("db/users/".$email.".json", json_encode($userObject));
                        $_SESSION['message'] = "Password Reset Successful. You can now login";

                        /**
                         * inform user  of password reset
                        */
                        $subject = "Password Reset Successful";
                        $message = "Your account on Rona Stores has just been updated, your password changed. If you did not initiate this password change, please visit www.rona.ng and reset your password immediately!";
                        $headers = "From: no-reply@rona.ng"."\r\n"."CC: info@rona.ng";
                        $try = mail($email, $subject, $message, $headers);
                        
                        /**
                         * Inform user of password reset ends.
                        */
                        header("Location: login.php");
                        die();
                    }
                        
                }

            }
                     
        }
    }
    $_SESSION['error'] = "Password Reset Failed, token/email invalid or expired!";
    header("Location: login.php");
}