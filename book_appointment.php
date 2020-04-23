<?php include_once('lib/header.php'); require_once('functions/alert.php'); require_once('functions/user.php');
?>
<p style="text-align:center;"><?php print_alert(); ?></p>
  <div class="hero_area">
    <h3>Book Your Appointment Here</h3>
  </div>

<form action="processAppointment.php" method="POST">

		<p class="input-group">
			<label>Date Of Appointment</label><br />
			<input 
            <?php
              if(isset($_SESSION['first_name'])){
                echo "value=".$_SESSION['first_name'];
              }
            ?> 
            type="date" name="date_of_a"  placeholder="Enter desired date" />
		</p>

        <p class="input-group">
			<label>Time Of Appointment<</label><br />
			<input 
            <?php
              if(isset($_SESSION['last_name'])){
                echo "value=".$_SESSION['last_name'];
              }
            ?> 
            type="time" name="time_of_a"  placeholder="Enter desired time" />
		</p>
    
    	<p class="input-group">
			<label>Nature of Appointment</label><br />
			<input 
            <?php
              if(isset($_SESSION['email'])){
                echo "value=".$_SESSION['email'];
              }
            ?> 
            type="text" name="nature_of_a" placeholder="Nature of appointment?" />
		</p>



        <p class="input-group">
			<label>Department/Type of Product</label><br />
			<input 
            <?php
              if(isset($_SESSION['email'])){
                echo "value=".$_SESSION['email'];
              }
            ?> 
            type="text" name="dept" placeholder="Depart/Type of Product" />
		</p>

        <p class="input-group">
			<label>Full Details Of Appointment</label><br />
            <textarea name="full_details"></textarea>
		</p>

        <p class="input-group">
            <button type="submit" name="submit" class="btn">Book Appointment</button>
        </p> 