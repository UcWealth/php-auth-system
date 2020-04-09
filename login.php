<?php include('lib/header.php'); 
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  //redirect to dashboard
  header("Location: dashboard.php");
}
?>
<h3>Login</h3>
<p>
<?php
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
    echo "<span style='color:green;'>".$_SESSION['message'] ."</span>";
    session_destroy();
    }
?>
</p>
<form action="processLogin.php" method="POST">
        <p>
          <?php
              if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red;'>".$_SESSION['error'] ."</span>";

                session_destroy();
            }
          ?>
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