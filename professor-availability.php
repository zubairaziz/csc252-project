<?php

$title = "Availability";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
$proffesorID = $_SESSION['userID'];

if (!isset($_SESSION)) {
    session_start();
}

require_once 'includes/head.php';
?>
	<script>
		$(document).ready(function () {
			getAvailibity(<?php echo $_SESSION['userID']; ?>);
		});

		function processSchedule() {
			$('form').on('submit', function (e) {

				e.preventDefault();
				submitSchedule(<?php echo $_SESSION['userID']; ?>);
			});
		}
	</script>

	<body>

		<?php
require 'components/navbar.php';
?>

			<div class="container">

				<h3>Professor Availability</h3>
				<div class="schedule" id="schedule">
					<form name="schedule_form">
						<br>
						<table id="schedule_table">
							<tr id="pet_tr">
								<th id="pet_th"></th>
								<th id="pet_th">Mon</th>
								<th id="pet_th">Tue</th>
								<th id="pet_th">Wed</th>
								<th id="pet_th">Thur</th>
								<th id="pet_th">Fri</th>
							</tr>

						</table>
						<div>
							<span id="sub_button" class="sch_bt">
								<input type="submit" value="Submit" onclick="processSchedule()">
							</span>
							<span></span>
							<span class="sch_bt" onclick="addRow()" id="addmore">Add Row</span>
							<p>
								<span class="error" id="submitScheduleErr"></span>
							</p>
						</div>
					</form>
				</div>

			</div>

			<?php

require 'components/footer.php';

?>
	</body>

	</html>