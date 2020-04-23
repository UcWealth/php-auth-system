<?php include('lib/header.php'); require_once('functions/alert.php'); require_once('functions/user.php'); ?>
<p style="text-align:center;"><?php print_alert(); ?></p>  
<div class="hero_area">    
    <h3>Forgot Password</h3>
    <p>Please provide the email address you used to register</p>
  </div>
    
    <form action="processForgot.php" method="POST">
      <p class="input-group">
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
            <button type="submit" class="btn" name="submit">Send Reset Code</button>
        </p>   
    </form>
    
<?php include('lib/footer.php'); ?>