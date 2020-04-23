<?php  include('lib/header.php'); require_once('functions/alert.php'); require_once('functions/user.php'); 
// if(!isAdmin()){
//     //redirect to dashboard
//     header("Location: login.php");
//   }

/**
 * Admin Login Is:
 * email: admin@rona.ng
 * psw: 123456789
*/
?>
<div class="hero_area">
<h3>Admin Dashboard</h3>
</div>
<br>
<div style="width:50%; text-align: center; margin:auto;">
<button class="btn success"><a href="add_user.php">Add User</a></button>
<button class="btn success"><a href="view_appointments.php">View Appointments</a></button>
<button class="btn success"><a href="#">View Buyers</a></button>
<button class="btn success"><a href="#">View Sellers</a></button>

</div>