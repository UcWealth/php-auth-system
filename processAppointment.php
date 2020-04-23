<?php session_start(); require_once('functions/user.php');

// collecting the data
$errorCount = 0;
// verifying the data, validation
$date_of_a = $_POST['date_of_a'] == "" ? $errorCount++ : $_POST['date_of_a'];
$time_of_a = $_POST['time_of_a'] == "" ? $errorCount++ : $_POST['time_of_a'];
$nature_of_a = $_POST['nature_of_a'] == "" ? $errorCount++ : $_POST['nature_of_a'];
$full_details = $_POST['full_details'] == "" ? $errorCount++ : $_POST['full_details'];
$dept = $_POST['dept'] == "" ? $errorCount++ : $_POST['dept'];

$_SESSION['date_of_a'] = $date_of_a;
$_SESSION['time_of_a'] = $time_of_a;
$_SESSION['nature_of_a'] =$nature_of_a;
$_SESSION['full_details'] = $full_details;
$_SESSION['dept'] = $dept;

if($errorCount > 0){
    //redirect back, and display error
    $_SESSION['error'] = "You have ".$errorCount." error".($errorCount>1 ? "s" : "") ." in your form submission!";
    header("Location: book_appointment.php");
} else {
    
    $allAppointments = scandir("db/appointments/");
    $countAllAppointments = count($allAppointments);
    $newAppointmentId = ($countAllAppointments-1);
    
    if(isset($_POST['submit'])){
    $date_submitted = date('r', time());
    $_SESSION['date_submitted'] = $date_submitted;
    }
    
    $appointmentObject = [
        'id'             =>  $newAppointmentId,
        'date_of_a'      =>  $date_of_a,
        'time_of_a'      =>  $time_of_a,
        'nature_of_a'    => $nature_of_a,
        'full_details'   => $full_details,
        'dept'           => $dept,
        'date_submitted' => $date_submitted
        
    ];

    // Check if the user already exists
    // $userExists = find_user($email);
    //     if($userExists){
    //         $_SESSION['error'] = "Registration failed! User already exists!";
    //         header("Location: register.php");  
    //         die();         
    //     }
 
    // Save to database
    file_put_contents("db/appointments/".$userObject['email'].".json", json_encode($appointmentObject));
    $_SESSION['message'] = "Your Appointment was successfully booked!";
    header("Location: buyer.php");
}