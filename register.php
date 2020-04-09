<?php include('lib/header.php'); 
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
  //redirect to dashboard
  header("Location: dashboard.php");
}
?>

<h3>Register Here</h3>
<p>All Fields are required</p>

        <form action="processRegister.php" method="POST">
        <p>
          <?php
              if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red;'>".$_SESSION['error'] ."</span>";

                // session_unset();
                session_destroy();
            }
          ?>
        </p>
		<p>
			<label>First Name</label><br />
			<input 
            <?php
              if(isset($_SESSION['first_name'])){
                echo "value=".$_SESSION['first_name'];
              }
            ?> 
            type="text" name="first_name"  placeholder="Enter Your First Name" />
		</p>

        <p>
			<label>Last Name</label><br />
			<input 
            <?php
              if(isset($_SESSION['last_name'])){
                echo "value=".$_SESSION['last_name'];
              }
            ?> 
            type="text" name="last_name"  placeholder="Enter Your Last Name" />
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
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select One</option>
                <option
                <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                    echo "selected";
                }
                ?> 
                >Female</option>
                <option
                <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                    echo "selected";
                }
                ?> 
                >Male</option>
            </select>
        </p>
    
        <p>
            <label>Designation</label><br />
            

             <select name="designation" required>
                <option value="">Select Your Designation</option>
                <option
                <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Buyer'){
                    echo "selected";
                }
                ?> 
                >Buyer</option>
                <option
                <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Seller'){
                    echo "selected";
                }
                ?> 
                >Seller</option>
              </select>
        </p>

        <p>
			<label for="department">Department</label><br />
			<input 
            <?php
              if(isset($_SESSION['department'])){
                echo "value=".$_SESSION['department'];
              }
            ?> 
            type="text" name="department" required placeholder="Department" />
		</p>

        <p>
            <button type="submit" name="submit">Register</button>
        </p>    

</form>
    
<?php
    include('lib/footer.php');
?>