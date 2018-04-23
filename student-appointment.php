<?php

require_once "includes/functions.php";

$email = $_SESSION['email'];
$date = date('Y/m/d');
$professor = $_POST['professor'];

// List all profs
$query = "SELECT * FROM Users WHERE status = 1 ORDER BY firstName";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

switch ($dayIndex) {
    case "1":
        $day = "Monday";
        break;
    case "2":
        $day = "Tuesday";
        break;
    case "3":
        $day = "Wednesday";
        break;
    case "4":
        $day = "Thursday";
        break;
    case "5":
        $day = "Friday";
        break;
}

?>

	<h3>Schedule an Appointment</h3>
	<div>
		<div>
			<h4>Select: </h4>
			<form action="<?php $_PHP_SELF?>" method="POST">
				<label for="professor">Professor: </label>
				<select name="professor">
					<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['userID'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
}
?>
				</select>

				<input type="submit" value="See Availabilities">
			</form>
		</div>

		<div>
			<?php if (isset($_POST)) {
    $getAvail = "SELECT * FROM Availability WHERE profID = 1 ORDER BY day";
    echo "
			<h4>Professor's Availabilities: </h4>
			<div class='calendar'>
				<table>
					<tr>
						<th>Week/Day</th>
						<th>Monday</th>
						<th>Tuesday</th>
						<th>Wednesday</th>
						<th>Thursday</th>
						<th>Friday</th>
					</tr>
					<tr>
						<th>1</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th>2</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th>3</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<th>4</th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			";
} else {
    echo "
	<p>Select a professor to see their availabilities.</p>
	";
}
?>
		</div>