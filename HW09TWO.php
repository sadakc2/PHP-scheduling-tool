<!-- NAME: Christina Sadak-->
<!-- DUE DATE: December 4th, 2017-->
<!-- PURPOSE: Allows student to choose an appointment or be reminded of their appointment-->
<!-- SOME CODE FROM: Dannelly's course page "dbtest3.php" -->

<html>
<body style = "background-color: #70566b ;">
<hr>
<b><font color = "2E2E2E">To create an Appointment: Enter all fields and select an apointment. Then click Choose Appointment.</font></b>


<form action=HW09FOUR.php method=post>


<?php

// connect the database
$DBconn = new mysqli ("deltona.birdnest.org", "my.sadakc2", "CSalviS1", "my_sadakc2_advising");//connects to my database

// submit and process the query for existing warehouses
$query = "select * from appointments";//shows the appointments database
$result = mysqli_query ($DBconn, $query);

//while loop creates a hidden form for each delete button
//in while loop, checks to see which row to delete by checking the associates WhNumb
while ($row = mysqli_fetch_object ($result))
{
    echo "<br><input type = 'radio' name = 'pickApp' value = '$row->appNum'> $row->appDay at $row->appTime<br>";
}


?>

</table>
<P>

<P>

<!--<form action=HW09FOUR.php method=post>-->
<!-- Outputs textboxes so user can enter new warehoues info via html -->
<pre>
<!-- Prints out labels for text boxes -->
<b><font color = "2E2E2E">Student info:</font></b>

<b><font color = "#F8E0E6">Student ID:</font></b>               <input type=text name="studentNum">
<b><font color = "#F8E0E6">First Name:</font></b>               <input type=text name="firstName">
<b><font color = "#F8E0E6">Last Name:</font></b>                <input type=text name="lastName">
<!-- Outputs button -->
                          <input type = 'submit' name = 'selectAppointment' value = 'Choose Appointment'>


</pre>
</form>

<form action=HW09FIVE.php method=post>
<pre>
<b><font color = "2E2E2E">When is my appoinment?</font></b>

<b><font color = "#F8E0E6">Student ID:</font></b>            <input type=text name="studentNum">

                       <input type = 'submit' name = 'findAppointment' value = 'Find Appointment'>



</pre>
</form>

<P>
<hr>
</html>
