<?php include('lib/header.php'); 
if(!isset($_SESSION['loggedIn'])){
    //redirect to login
    header("Location: login.php");
  }
?>
    <h3>Dashboard</h3>
    <p>Welcome, <strong><?php echo $_SESSION['fullname']?></strong><br>You are logged in as a <strong><?php echo $_SESSION['role'] ?></strong> with User ID: <strong><?php echo $_SESSION['loggedIn'] ?></strong>
    </p>

    <div>
      <p><strong>User Access Level:</strong> <?php echo $_SESSION['role']?></p>
      <p><strong>Department:</strong> <?php echo $_SESSION['department']?></p>
      <p><strong>Date of registration: </strong><?php echo $_SESSION['date_registered'] ?></p>
      <p><strong>Login time:</strong> <?php echo $_SESSION['login_time']?> </p>
    </div>
    
<?php include('lib/footer.php'); ?>