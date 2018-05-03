<?php

if (!isset($_SESSION)) {
    session_start();
}

$email = $_SESSION['email'];
$userID = $_SESSION['userID'];
$studentID = $userID;

require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';

require_once 'includes/head.php';

?>
	<script>
		function schedule() {
			$('form').on('submit', function (e) {

				e.preventDefault();
				var time = $(this).find('option:selected').val();
				var date = document.getElementById("date").value;
				var purpose = document.getElementById("purpose").value;
				//alert(purpose);
				processAppointment(date, time, purpose);
			});
		}

		function viewAvailability() {
			$('form').on('submit', function (e) {

				e.preventDefault();
				var profID = $(this).find('option:selected').val();
				var date = document.getElementById("date").value;
				//alert(date);
				viewHrs(profID, date);
				var x = document.getElementById("profHrs");
				x.style.display = "block";
			});
		}

		$(document).ready(function () {
			fetch_data();

			function fetch_data() {
				$.ajax({
					url: "db/select.php",
					method: "POST",
					success: function (data) {
						$('#prof').html(data);
					}
				});
			}
		});
	</script>

	<body>


		<?php
require 'components/navbar.php';
?>

			<div class="container">

				<h3>Schedule an Appointment</h3>

				<div id="selectProf">
					<h4>Select Professor: </h4>

					<form>
						<div id="prof">

						</div>
						<input type="submit" name="submit" value="View Availabilities" onclick="viewAvailability()">
					</form>
				</div>

				<br>

				<div class="profHrs" id="profHrs">
					<form>
						<h4>Select Appointment Time: </h4>
						<select id="select_hrs">
						</select>
						<br>
						<h4>Purpose of Appointment: </h4>
						<input type="text" name="purpose" id="purpose">
						<br>
						<br>
						<div>
							<input type="submit" name="submit" value="Schedule Appointment" onclick="schedule()">
						</div>

					</form>

				</div>

			</div>

	</body>

	</html>