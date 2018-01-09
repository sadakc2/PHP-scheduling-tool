
<!-- NAME: Christina Sadak-->
<!-- DUE DATE: December 4th, 2017-->
<!-- PURPOSE: Allows prof to see the appointments selected by students -->
<!-- SOME CODE FROM: Dannelly's course page "dbtest3.php" -->

<html>
<body style = "background-color: #70566b ;">
<hr>
<table rules=all border=5>
<tr>
<td bgcolor=grey colspan=6 align=center><font color=black>Scheduled Appointments
<tr>
<td bgcolor=grey>Student ID |
<td bgcolor=grey>Student First Name |
<td bgcolor=grey>Student Last Name |
<td bgcolor=grey>Appointment Day |
<td bgcolor=grey>Appointment Time
<?php

// connect the database
$DBconn = new mysqli ("deltona.birdnest.org", "my.sadakc2", "CSalviS1", "my_sadakc2_advising");//connects to my database

$query = "select * from chosenApps2";//puts the table into query
$result = mysqli_query($DBconn,$query);


//outputs table
while ($row = mysqli_fetch_object ($result))
{
   echo ("<tr> <td> $row->studentNum <td> $row->firstName <td> $row->lastName <td> $row->appDay <td> $row->appTime");
}



?>

</table>
<P>
<hr>
<P>
