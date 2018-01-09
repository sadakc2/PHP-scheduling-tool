<!-- NAME: Christina Sadak-->
<!-- DUE DATE: December 4th, 2017-->
<!-- PURPOSE: Adds student's chosen appointment to a new table and removes it from the appointments table -->
<!-- SOME CODE FROM: Dannelly's course page "dbtest3.php" -->

<html>
<body style = "background-color: #70566b ;">


  <?php

$DBconn = new mysqli ("deltona.birdnest.org", "my.sadakc2", "CSalviS1", "my_sadakc2_advising");//connects to my database

if((isset($_POST['studentNum'])) && (isset($_POST['firstName'])) && (isset($_POST['lastName'])) && (isset($_POST['pickApp'])))
{
$studentNum = $_POST['studentNum'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];//gets

$getAPPInfo = $_POST['pickApp'];

$query = "SELECT * FROM appointments WHERE appNum = $getAPPInfo";
$result = mysqli_query($DBconn, $query);

$stuff = mysqli_fetch_object($result);
$appointmentDay = $stuff->appDay;

$appointmentTime = $stuff->appTime;

//outputs a message to the student that shows them the appointment that they made
echo "Hi " . $firstName . " " . $lastName . ". You have an appoinment on " . $appointmentDay . " at " . $appointmentTime . ".";

//inserts this appointment into a new table
$query  = "INSERT INTO chosenApps2 VALUES ('$studentNum', '$firstName', '$lastName', '$appointmentDay', '$appointmentTime')";
$result = mysqli_query($DBconn, $query);

//deletes this appointment from the appointments table so it cannot be chosen again
$query = "DELETE FROM appointments WHERE appNum = $getAPPInfo";
$deleteThing = mysqli_query($DBconn, $query);

}

else
{
  echo "You did not enter all required fields.";
}


?>
