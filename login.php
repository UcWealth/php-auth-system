<?php include_once('lib/header.php'); require_once('functions/alert.php'); require_once('functions/user.php');

if(is_user_loggedIn()){
  //redirect to dashboard
  header("Location: dashboard.php");
}
?>
  <p style="text-align:center;"><?php print_alert(); ?></p>
  <div class="hero_area">
    <h3>Login</h3>
  </div>
 
  <form action="processLogin.php" method="POST">
		<p class="input-group">
			<label>Email</label><br />
			<input 
            <?php
              if(isset($_SESSION['email'])){
                echo "value=".$_SESSION['email'];
              }
            ?> 
            type="email" name="email" placeholder="Enter Your Email"  />
		</p>

        <p class="input-group">
			<label>Password</label><br />
			<input type="password" name="password" placeholder="Enter Your password" />
		</p>

        <p class="input-group">
            <button type="submit" class="btn">Login</button>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>  
</form>
    

<?php
    include('lib/footer.php');
?>