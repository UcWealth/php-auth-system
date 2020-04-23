<?php session_start(); require_once('functions/user.php');

// collecting the data
$errorCount = 0;
// verifying the data, validation
if($_POST['first_name'] == "" || preg_match('#[0-9]#',$_POST['first_name']) || strlen($_POST['first_name']) < 2){ 
    $errorCount++;
}else{
    $first_name = $_POST['first_name'];
} 
$last_name = $_POST['last_name'] == "" || strlen($_POST['last_name']) < 2 || preg_match('#[0-9]#',$_POST['last_name']) ? $errorCount++ : $_POST['last_name'];
$email = $_POST['email'] == "" || strlen($_POST['email']) < 5 || strpos($_POST['email'], '@') == false || strpos($_POST['email'], '.') == false ? $errorCount++ : $_POST['email'];
$password = $_POST['password'] == "" ? $errorCount++ : $_POST['password'];
$gender = $_POST['gender'] == "" ? $errorCount++ : $_POST['gender'];
$designation = $_POST['designation'] == "" ? $errorCount++ : $_POST['designation'];
$department = $_POST['department'] == "" ? $errorCount++ : $_POST['department'];

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;

if($errorCount > 0){
    //redirect back, and display error
    $_SESSION['error'] = "You have ".$errorCount." error".($errorCount>1 ? "s" : "") ." in your form submission!";
    header("Location: register.php");
} else {
    
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers-1);
    
    if(isset($_POST['submit'])){
    $date_registered = date('r', time());
    $_SESSION['date_registered'] = $date_registered;
    }
    
    $userObject = [
        'id' => $newUserId,
        'first_name'=>$first_name,
        'last_name'=> $last_name,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'email'=> $email,
        'gender'=> $gender,
        'designation'=> $designation,
        'department'=> $department,
        'date_registered'=> $date_registered
        
    ];
    // Check if the user already exists
    $userExists = find_user($email);
        if($userExists){
            $_SESSION['error'] = "Registration failed! User already exists!";
            header("Location: register.php");  
            die();         
        }
 
    // Save to database
    save_user($userObject);
    $_SESSION['message'] = "Registration successful. You can now login, ".$first_name;
    header("Location: login.php");
}
// return back to the page, with a status message