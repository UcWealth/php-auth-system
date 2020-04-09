<?php include_once('lib/header.php');
      require_once('functions/alert.php');
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  //redirect to dashboard
  header("Location: dashboard.php");
}
?>
<h3>Login</h3>
<p>
<?php message(); ?>
</p>
<form action="processLogin.php" method="POST">
        <p>
          <?php error(); ?>
        </p>

		<p>
			<label for="email">Email</label><br />
			<input 
            <?php
              if(isset($_SESSION['email'])){
                echo "value=".$_SESSION['email'];
              }
            ?> 
            type="email" name="email" placeholder="Enter Your Email" />
		</p>

        <p>
			<label for="password">Password</label><br />
			<input type="password" name="password" placeholder="Enter Your password"     />
		</p>

        <p>
            <button type="submit">Login</button>
        </p>    

</form>
    

<?php
    include('lib/footer.php');
?>