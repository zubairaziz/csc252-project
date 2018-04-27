<?php
require "dbaccess.php";
date_default_timezone_set("America/New_York");


$obj = json_decode(file_get_contents('php://input'), true);
$type = $obj["what"];

if ($type == "get") {
  getAppointments();
}

if ($type == "cancel") {
  cancelAppointments();
}


function getAppointments(){
    global $conn;

    $response = array();
		$response["Appointment"] = array();
		$response["Found"] = false;

    $obj = json_decode(file_get_contents('php://input'), true);
    $profID = $obj["id"];

    $query = "SELECT a.firstName, a.lastName, b.date, b.starts, b.ends, b.apptID, b.purpose, b.status "
              . "FROM appointment b INNER JOIN users a on b.studentID = a.userID  WHERE b.professorID = ?";
		$stmt = $conn->prepare($query);
    $stmt->bind_param("s", $profID);
    $stmt->execute();
		$result = $stmt->get_result();
    $stmt->close();

    while ($temp = $result->fetch_assoc()) {

			  $response["Found"] = true;
				$appointment = array();
        $appointment["appointmentID"] = $temp["apptID"];
        $appointment["stdName"] = $temp["firstName"] ." " .$temp["lastName"];
        $appointment["appointment_date"] = $temp["date"];
        $appointment["appointment_start_time"] = $temp["starts"];
        $appointment["appointment_end_time"] = $temp["ends"];
        $appointment["purpose_of_appointment"] = $temp["purpose"];
        $appointment["status"] = $temp["status"];

				array_push($response["Appointment"], $appointment);

      }

    echo json_encode($response);

}

function cancelAppointments(){
    global $conn;
    $response = array();

    $obj = json_decode(file_get_contents('php://input'), true);
    $apptID = $obj["appointment_id"];

    $query = "DELETE FROM appointment WHERE apptID = ?";
		$stmt = $conn->prepare($query);
    $stmt->bind_param("s", $apptID);
    $stmt->execute();
    $num_affected_rows = $stmt->affected_rows;
    $stmt->close();
    if($num_affected_rows > 0){
			$response["error"] = false;
			echo json_encode($response);
		}

		else{
      $response["error"] = true;
			echo json_encode($response);
    }

}

?>
