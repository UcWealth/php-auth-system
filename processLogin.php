<?php session_start();

$errorCount = 0;

$email = $_POST['email'] == "" ? $errorCount++ : $_POST['email'];
$password = $_POST['password'] == "" ? $errorCount++ : $_POST['password'];

$_SESSION['email'] = $email;

if($errorCount > 0){
    $_SESSION['error'] = "You have ".$errorCount." error".($errorCount>1 ? "s" : "") ." in your form submission!";
    header("Location: login.php");
} else {
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];
        if($currentUser == $email.".json"){
            //check password
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
            $passwordFromDB = $userObject->password;
            $passwordFromUser = password_verify($password, $passwordFromDB);
            $login_time = date('r', time());
            

            if($passwordFromDB == $passwordFromUser){
                //redirect to dashboard
                $_SESSION['loggedIn'] = $userObject->id;
                $_SESSION['email'] = $userObject->email;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['fullname'] = $userObject->first_name." ".$userObject->last_name;
                $_SESSION['login_time'] = $login_time;
                $_SESSION['department'] = $userObject->department;
                $_SESSION['date_registered'] = $userObject->date_registered;
                
                if($_SESSION['role'] == 'Seller'){
                    header("Location: seller.php");

                } else if($_SESSION['role'] == 'Buyer'){
                    header("Location: buyer.php");
                }
                else {
                    header("Location: admin/index.php");
                }
                
                die();
            }
            
        }
    } 
    
    $_SESSION['error'] = "Invalid Password or Email!";
    header("Location: login.php");  
    die();  
}
