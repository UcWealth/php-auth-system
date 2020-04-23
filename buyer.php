<?php include('lib/header.php'); require_once('functions/alert.php'); require_once('functions/user.php');

if(!is_user_loggedIn()){
    //redirect to login
    header("Location: login.php");
  }
?>
    <h3>Buyer's Dashboard</h3>
    <p>Welcome, <?php echo $_SESSION['fullname']?><br>You are logged in as a (<?php echo $_SESSION['role'] ?>) with User ID: <?php echo $_SESSION['loggedIn']?>
    </p>
    <p>Login time: <?php echo $_SESSION['login_time']?> </p>

    <div>
    <p>You're welcome to the buyers section</p>
    <p>You can only see this menu because you have registered as a buyer</p>
    </div>

    <div class="">
      <button><a href="pay_bill.php">Pay Bills</a></button>
      <button><a href="book_appointment.php">Book Appointment</a></button>
    </div>

    <?php include('lib/footer.php'); ?>
    