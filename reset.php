<?php include('lib/header.php');  require_once('functions/alert.php'); require_once('functions/user.php');

//Check if token is set
if( !is_user_loggedIn() && !is_token_set() ){
    $_SESSION['error'] = "You are not authorized to view that page!";
    header("Location: login.php");
}
?>
<p style="text-align:center;"><?php print_alert(); ?></p>

<div class="hero_area">
    <h3>Reset Password</h3>
    <p>Reset Your Password Here: </p>
</div>


    <form action="processReset.php" method="POST">
        <p><?php print_alert(); ?></p>

        <?php if(!is_user_loggedIn()) { ?>
            <input 
                <?php 
                if(is_token_set_in_session()){
                    echo "value='".$_SESSION['token']."'";
                } else {
                    echo "value='".$_GET['token']."'";
                }
                ?>
            type="hidden" name="token">
        <?php } ?>

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
			<label for="password">Enter New Password</label><br />
			<input type="password" name="password" placeholder="Enter Your password"     />
		</p>
    
        <p>
            <button type="submit" name="submit">Reset Password</button>
        </p>   
    </form>
    
<?php include('lib/footer.php'); ?>