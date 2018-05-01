<?php
include "dbaccess.php";
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 $output = '';
 $sql = "SELECT * FROM users WHERE status = 1 ORDER BY firstName";
 $result = mysqli_query($connect, $sql);
 $output .= '
      <select id="profs">
      ';
 $rows = mysqli_num_rows($result);
 if($rows > 0)
 {

      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <option value="' . $row['userID'] . '" id="profID">' . $row['firstName'] . " " . $row['lastName'] . '</option>
           ';
      }
      $output .= '</select>';
      $output .= '<h4>Select Appointment Date:</h4>
      <div>
      <input type="date" id="date" />
      </div>';
 }
 else
 {
      $output .= '
				<option>

        </option>';
 }

 echo $output;
 ?>
