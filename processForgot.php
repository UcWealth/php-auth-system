<?php session_start();

// collecting the data
$errorCount = 0;
// verifying the data, validation

$email = $_POST['email'] == "" ? $errorCount++ : $_POST['email'];

$_SESSION['email'] = $email;

if($errorCount > 0){
    //redirect back, and display error
    $_SESSION['error'] = "You have ".$errorCount." error".($errorCount>1 ? "s" : "") ." in your form submission!";
    header("Location: forgot.php");
} else {
        // count all users
        $allUsers = scandir("db/users/");
        $countAllUsers = count($allUsers);

        for($counter = 0; $counter < $countAllUsers; $counter++){
            $currentUser = $allUsers[$counter];
            if($currentUser == $email.".json"){
            // Send email, and redirect to the reset password page
            /**
             * Token Generation Starts
             * 
            */
            $token = "";
            $alphabets = ["a","c","b","d","C","A","D","B","Z","w","j","J","U","V","g","n","p","k","v","z","u"];
            for($i = 0; $i < 20; $i++){
                $index = mt_rand(0, count($alphabets) - 1);
                $token .= $alphabets[$index];
            }
            /**
             * Token Generation Ends
            */
            $subject = "Password Reset Link";
            $message = " A password reset has been initiated from your account! If you did not initiate this, please ignore this message. Otherwise, visit this link: http://localhost/StartNG/Rona-Stores/reset.php?token=".$token;
            $headers = "From: no-reply@rona.ng"."\r\n"."CC: info@rona.ng";

            file_put_contents("db/tokens/".$email.".json", json_encode(['token'=>$token]));
            $try = mail($email, $subject, $message, $headers);
    
            if($try){
                // display success message
                $_SESSION['message'] = "Password reset link has been sent to your email: ".$email;
                header("Location: login.php");
            } else {
                // display error message
                $_SESSION['error'] = "Something went wrong! Unable to send password reset link to ".$email;
                header("Location: forgot.php");
            }
            die();
            }

        }

        $_SESSION['error'] = "Email not registered with us ERR: ".$email;
        header("Location: forgot.php");

}
