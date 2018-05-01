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

if ($type == "getAvailaibity") {
    getAvailability();
}

if ($type == "insertAvailaibity") {
    insertAvailability();
}

if($type == "getHrs"){
  getHrs();
}

if($type == "insertAppointment"){
  insertAppointment();
}


function insertAppointment(){
    global $connect;

    $response = array();
    $response["error"] = true;
    $obj = json_decode(file_get_contents('php://input'), true);
    session_start();
    $stdID = $_SESSION['userID'];
    $profID = $_SESSION["profID"];
    $date = $obj["date"];
    $time = $obj["time"];
    $end = date('H:i A',strtotime('+15 minutes',strtotime($time )));
    $time = date("H:i:s", strtotime($time));
    $end = date("H:i:s", strtotime($end));
    $purpose = $obj["purpose"];
    $status = 0;

    $query = "INSERT INTO appointment (professorID, studentID, date, starts, ends, purpose, status) values (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("iissssi", $profID, $stdID, $date, $time, $end, $purpose, $status);
    $result = $stmt->execute();

    if($result){
        $response["error"] = false;
        echo json_encode($response);
    }
    else{
      $response["error"] = true;
      echo json_encode($response);
    }


}

function getHrs(){
    global $connect;

    $response = array();
    $response["error"] = true;
    $obj = json_decode(file_get_contents('php://input'), true);
    $profID = $obj["profID"];
    session_start();
    if (!isset($_SESSION['profID'])){
        $_SESSION["profID"] = $profID;
    }

    $day = $obj["date"];

    $dy = date('w', strtotime($day))+1;

    $query = "SELECT starts, ends FROM availability WHERE professorID = ? AND day = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $profID, $dy);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $temp = $result->fetch_assoc();
    $time = $temp["starts"] ."-" .$temp["ends"];

    $response["hrs"] = computeTimeIntervals($time, $day, $profID);

    //$response["hrs"] = "10AM";
    echo json_encode($response);
}

function computeTimeIntervals($time, $date, $profID){
		$computed = array();
		//convert interval to milli
		$interval = 15 * 60;

		//foreach($time as $value) {

			list($start, $end) = explode("-", $time);
			//convert time to milli (ie epoch time)
			$start = strtotime($start);
			$end = strtotime($end);

			array_push($computed, $start);

			while($start != $end){

				if(($end-$start) > $interval){
					$start = $start + $interval;
					array_push($computed, $start);
				}
				else{
					$start = $end;
				}

			}

		//}
		//sort array
		sort($computed);

		//convert time to 12hrs format and return
		return convertTime($computed, $date, $profID);
	}


  function convertTime($time, $date, $profID){
    global $connect;
    $query = "SELECT starts FROM appointment  WHERE professorID = ? AND date = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $profID, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $found = false;
    $booked = array();
    while ($temp = $result->fetch_assoc()) {
        $found = true;
        $tt = date('h:i:s a', strtotime($temp["starts"]));
        array_push($booked, $temp["starts"]);
    }



		$comp = array();
		foreach($time as $value) {
			//convert to 12hrs format
      $rs = date('h:i A', $value);
      if($found){
          if (in_array($rs, $booked)) {

          }else{
            array_push($comp, $rs);
          }
      }else{
        array_push($comp, $rs);
      }

      //}



		}
		return $comp;
	}

function insertAvailability()
{
    global $connect;

    $response = array();
    $response["error"] = true;

    $obj = json_decode(file_get_contents('php://input'), true);
    $availaibility = $obj["schedule"];
    $profID = $obj["profID"];
    $length = count($availaibility);
    $keys = array_keys($availaibility);
    $num_affected_rows = 0;

    $connect->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    for ($i = 0; $i < $length; $i++) {
        $day = $availaibility[$keys[$i]];

        foreach ($day as $value) {
          if($value == ""){
            $day = $keys[$i];
            $query = "UPDATE availability SET starts = NULL, ends = NULL WHERE professorID = ? AND day = ?";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("ss", $profID, $day);
            $stmt->execute();
            $num_affected_rows += $stmt->affected_rows;
          }
          else{
            list($start, $end) = explode("-", $value);
            $start = date('H:i', strtotime($start));
            $end = date('H:i', strtotime($end));

            $day = $keys[$i];
            $query = "UPDATE availability SET starts = ?, ends = ? WHERE professorID = ? AND day = ?";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("ssss", $start, $end, $profID, $day);
            $stmt->execute();
            $num_affected_rows += $stmt->affected_rows;
          }

        }

    }

    $stmt->close();
    $connect->commit();
    if ($num_affected_rows > 0) {
        $response["error"] = false;
        echo json_encode($response);
    } else {
        $response["error"] = true;
        echo json_encode($response);
    }

}

function getAvailability()
{
    global $connect;

    $response = array();
    $response["error"] = true;

    $obj = json_decode(file_get_contents('php://input'), true);
    $profID = $obj["id"];

    $query = "SELECT * FROM availability WHERE professorID = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $profID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $office_hrs = array();
    $office_hrs["2"] = array();
    $office_hrs["3"] = array();
    $office_hrs["4"] = array();
    $office_hrs["5"] = array();
    $office_hrs["6"] = array();

    while ($temp = $result->fetch_assoc()) {

        $response["error"] = false;
        $day = $temp["day"];
        $startTime = $temp["starts"];
        $endTime = $temp["ends"];
        $time = $startTime . " - " . $endTime;
        array_push($office_hrs[$day], $time);

    }

    $response["office_hrs"] = $office_hrs;
    echo json_encode($response);

}

function getAppointments()
{
    global $connect;
    $todaydate= date('Y-m-d');
    $response = array();
    $response["Appointment"] = array();
    $response["Found"] = false;

    $obj = json_decode(file_get_contents('php://input'), true);
    $profID = $obj["id"];

    $query = "SELECT a.firstName, a.lastName, b.date, b.starts, b.ends, b.apptID, b.purpose, b.status "
        . "FROM appointment b INNER JOIN users a on b.studentID = a.userID  WHERE b.professorID = ? AND b.date >= ?" ;
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $profID,$todaydate);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    while ($temp = $result->fetch_assoc()) {
        $response["Found"] = true;
        $appointment = array();
        $appointment["appointmentID"] = $temp["apptID"];
        $appointment["stdName"] = $temp["firstName"] . " " . $temp["lastName"];
        $appointment["appointment_date"] = $temp["date"];
        $appointment["appointment_start_time"] = $temp["starts"];
        $appointment["appointment_end_time"] = $temp["ends"];
        $appointment["purpose_of_appointment"] = $temp["purpose"];
        $appointment["status"] = $temp["status"];
        array_push($response["Appointment"], $appointment);
    }
    echo json_encode($response);
}

function cancelAppointments()
{
    global $connect;
    $response = array();

    $obj = json_decode(file_get_contents('php://input'), true);
    $apptID = $obj["appointment_id"];

    $query = "DELETE FROM appointment WHERE apptID = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $apptID);
    $stmt->execute();
    $num_affected_rows = $stmt->affected_rows;
    $stmt->close();
    if ($num_affected_rows > 0) {
        $response["error"] = false;
        echo json_encode($response);
    } else {
        $response["error"] = true;
        echo json_encode($response);
    }
}
