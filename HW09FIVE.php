<!-- NAME: Christina Sadak-->
<!-- DUE DATE: December 4th, 2017-->
<!-- PURPOSE: Reminds student of their appointment -->
<!-- SOME CODE FROM: Dannelly's course page "dbtest3.php" -->

<html>
<body style = "background-color: #70566b ;">

<?php

$DBconn = new mysqli ("deltona.birdnest.org", "my.sadakc2", "CSalviS1", "my_sadakc2_advising");//connects to my database
if((isset($_POST['studentNum'])) && (isset($_POST['findAppointment'])))
{
  $findAppointment = $_POST['studentNum'];

//finds the appointment in the table with chosen appointments that matches the student ID number entered
  $query = "SELECT * FROM chosenApps2 WHERE studentNum = $findAppointment";
  $result = mysqli_query($DBconn, $query);

  $output = mysqli_fetch_object($result);
  echo "Hi " . $output->firstName . " " . $output->lastName . ". You have an appoinment on " . $output->appDay . " at " . $output->appTime . ".";
}

else if((!isset($_POST['studentNum'])) && (isset($_POST['findAppointment'])))
{
  echo "Either you did not enter your Student ID number, or you have not made an appointment yet.";
}

 ?>
</html>
