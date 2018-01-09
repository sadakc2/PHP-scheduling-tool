<!-- NAME: Christina Sadak-->
<!-- DUE DATE: December 4th, 2017-->
<!-- PURPOSE: Allows prof to add and delete appointment times into mysql tables-->
<!-- SOME CODE FROM: Dannelly's course page "dbtest3.php" -->

<html>
<body style = "background-color: #70566b ;">
<hr>
<table rules=all border=5>
<tr>
<td bgcolor=grey colspan=4 align=center><font color=black>Set/Delete Appointments
<tr>
<td bgcolor=grey>Appointment Number |
<td bgcolor=grey>Appointment Day |
<td bgcolor=grey>Appointment Time
<td bgcolor=grey>

<?php

// connect the database
$DBconn = new mysqli ("deltona.birdnest.org", "my.sadakc2", "CSalviS1", "my_sadakc2_advising");//connects to my database


//adds a new appointment if the professor added all required fields and didn't click a delete button
if((isset($_POST['appNum'])) && (isset($_POST['appDay'])) && (isset($_POST['appTime'])) && (!isset($_POST['delete'])))//if the user has filled in all fields and did not click delete, proceed
  {
   $appNum = $_POST['appNum'];
   $appDay = $_POST['appDay'];//gets value entered from user for day
   $appTime = $_POST['appTime'];//gets value entered from user for number of time

   //checks to make sure the prof isn't adding an apointment that's already there
   $checkDuplicates = "SELECT appNum from appointments where appDay = '$appDay' &&  appTime = '$appTime';";
   $foundDuplicates = mysqli_query($DBconn, $checkDuplicates);
   $foundDuplicates = mysqli_num_rows($foundDuplicates);

      if($foundDuplicates == 0)//only adds the appointment if a duplicate of it wasn't found
      {
        $query  = "INSERT INTO appointments VALUES ('$appNum', '$appDay', '$appTime')";//inserts those values into the database
        $result = mysqli_query ($DBconn, $query);
      }

  }


  if(isset($_POST['delete']))//if the user clicks a delete button, proceed...
  {
    $deleteAppointment = $_POST['delete'];//gets the value of the appointment number from the row that the delete button that was clicked was on
    $deleteStuff = "DELETE FROM appointments where appNum = '$deleteAppointment'";//deletes from appointments
    $result = mysqli_query($DBconn, $deleteStuff);
  }

// submit and process the query for existing appointments
$query = "select * from appointments";
//attempts to sort
//$query = "ORDER BY STR_TO_DATE(appDay,'%a %b %D %Y')";
//$query = "STR_TO_DATE(appTime,'%h:%i%p')";
$result = mysqli_query ($DBconn, $query);

//while loop creates a hidden form for each delete button
//in while loop, checks to see which row to delete by checking the associated appNum
while ($row = mysqli_fetch_object ($result))
{
   echo ("<tr> <td> $row->appNum <td> $row->appDay <td> $row->appTime");
   echo ("<td> <form action=HW09ONE.php method=post> <input type='hidden' name ='delete' value='$row->appNum'>");//passes the row of the delete button's warehouse number to know what to delete bc its unique
   echo ("<input type = 'submit' value = 'Delete'></form>");//outputs button
}

?>

</table>
<P>
<hr>
<P>

<form action=HW09ONE.php method=post>
<!-- Outputs textboxes so prof can enter new appointments info via html -->
<pre>
       <font color = "#F8E0E6">New Appointment Info:</font>
<font color = "#F8E0E6">Appointment Num:</font>                       <input type=text name="appNum">
<font color = "#F8E0E6">Appointment Day  (Ex: Mon Nov 3):</font>      <input type=text name="appDay">
<font color = "#F8E0E6">Appointment Time (Ex: 3:30PM):</font>         <input type=text name="appTime">

       <input type=submit value="Add Appointment">

</pre>
</form>

<P>
<hr>
</html>
