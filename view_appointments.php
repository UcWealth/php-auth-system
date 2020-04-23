<?php include('lib/header.php');  require_once('functions/alert.php'); require_once('functions/user.php');
if(!is_user_loggedIn() || !isAdmin()){
    //redirect to dashboard
    header("Location: login.php");
  }
  ?>
?>

<p style="text-align:center;"><?php print_alert(); ?></p>

<div class="hero_area">
    <h3>View Appointments</h3>
</div>

<div class="content-area">
    <?php
        $allAppointments = scandir("db/appointments/");
        $countAllAppointments = count($allAppointments);

        if ($countAllAppointments > 0) {
            $view_table  = "<table>";
            $view_table .= "<tr>
                                <th>ID</th>
                                <th>Date Of Appointment</th>
                                <th>Time Of Appointment</th>
                                <th>Nature Of Appointment</th>
                                <th>Full Details</th>
                                <th>Product Department</th>
                                <th>Date Submitted</th>
                            </tr>";

                

            for($counter = 0; $counter < $countAllAppointments; $counter++){
                $currentAppointment = $allAppointments[$counter];
                $appointmentString = file_get_contents("db/appointments/".$currentAppointment);
                $appointmentObject =  json_decode($appointmentString);

                if($counter == 0 || $counter == 1){
                    echo "skipped";
                }
                // Output a row
                $view_table .= "<tr>";
                $view_table .= "<td>" . $appointmentObject->id . "</td>";
                $view_table .= "<td>" . $appointmentObject->date_of_a . "</td>";
                $view_table .= "<td>" . $appointmentObject->time_of_a . "</td>";
                $view_table .= "<td>" . $appointmentObject->nature_of_a . "</td>";
                $view_table .= "<td>" . $appointmentObject->full_details . "</td>";
                $view_table .= "<td>" . $appointmentObject->dept . "</td>";
                $view_table .= "<td>" . $appointmentObject->date_submitted . "</td>";
                $view_table .= "<tr>";
            }
            $view_table .= "</table>";

            echo $view_table;

        } else {
            echo "You have no Pending Appointments";
        }
    ?>
</div>