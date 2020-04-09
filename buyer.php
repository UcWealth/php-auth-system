<?php include('lib/header.php'); 
if(!isset($_SESSION['loggedIn'])){
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
    