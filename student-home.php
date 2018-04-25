<?php

$date = date('Y-m-d');
$email = $_SESSION['email'];
$studentID = $_SESSION['userID'];

// Check for appointments
$query = "SELECT * FROM Appointment WHERE studentID = '$studentID' ";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

// Check for today's appointments
$query2 = "SELECT * FROM Appointment WHERE studentID = '$studentID' AND date = '$date' ";
$result2 = mysqli_query($connect, $query2);
$rows2 = mysqli_num_rows($result2);

?>

	<h3>Your Dashboard</h3>
	<a href="?view=student-appointment">Schedule an appointment</a>
	<div class="dashboard">
		<div id=#item1>
			<h4>Curent Appointments: </h4>

			<?php

if ($rows > 0) {
    echo "
		<table>
			<tr>
				<th>Professor</th>
				<th>Date</th>
				<th>Time</th>
				<th>Purpose</th>
				<th>Status</th>
			</tr>
			";
    while ($data = mysqli_fetch_assoc($result)) {
        echo "
				<tr>
				<td>" . $data['professorID'] . "</td>
				<td>" . $data['date'] . "</td>
				<td>" . $data['starts'] . " - " . $data['ends'] . "</td>
				<td>" . $data['purpose'] . "</td>
				<td>" . $data['status'] . "</td>
			</tr>
				";
    }
    echo "
		</table>
		";
} else {
    echo "
		<p>No appointments scheduled yet</p>
		";
}

?>

		</div>
		<div id=#item2>
			<h4>Today: </h4>
			<?php
if ($rows2 > 0) {
    while ($data2 = mysqli_fetch_array($result2)) {
        echo "
			<ul>
				<li>Professor: " . $data2['professorID'] . "</li>
				<li>Time: " . $data2['starts'] . " - " . $data2['ends'] . "</li>
				<li>Purpose:  " . $data2['purpose'] . "</li>
				<li>Status:  " . $data2['status'] . "</li>
			</ul>
			";
    }
} else {
    echo "
				<p>Nothing scheduled for today</p>
				";
}
?>
		</div>
	</div>

	<?php

mysqli_free_result($result);

?>