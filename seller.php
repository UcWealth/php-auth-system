<?php include('lib/header.php'); 
if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
  }
?>
    <h2>Seller's Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['fullname']?><br><br>You are logged in as a (<?php echo $_SESSION['role'] ?>) with User ID: <?php echo $_SESSION['loggedIn']?>
    </p>
    <h4>Login time: <?php echo $_SESSION['login_time']?> </h4>
    
    <div>
    <p>You're doing well</p>
    <p>You can only see this dashboard because you have registered as a seller</p>
    </div>