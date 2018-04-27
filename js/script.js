

function getAppointments(id){
        //alert(id);
        var form = {};
        form["what"] = "get";
        form["id"] = id;
        var form_data = JSON.stringify(form);
        //alert(form_data);
          $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'db/dbmanager.php',
            data: form_data,
            dataType: 'json',
            success: function(res, textStatus, jqXHR){
              var found = res.Found;
              if(found == false){
                  alert("Appointment Not Found");
              }
              else{
                var appointments = res.Appointment;
                for(var i = 0; i<appointments.length; i++){
                  var appointment = appointments[i];
                  var appointID = appointment["appointmentID"];
                  var stdName = appointment["stdName"];
                  var appoinDate = appointment["appointment_date"];
                  var appStartTime = appointment["appointment_start_time"];
                  var appEndTime = appointment["appointment_end_time"];
                  var purpose_app = appointment["purpose_of_appointment"];
                  var status = appointment["status"];

                  showAppointments(i, stdName, appoinDate, appStartTime, appEndTime, purpose_app, status, purpose_app, appointID);
                }
              }

            },
            error: function(jqXHR, textStatus, errorThrown){
              alert("An error occured please try again");
              alert(errorThrown);
            }
          });

}



function showAppointments(i, stdName, appoinDate, appStartTime, appEndTime, purpose_app, status, purpose_app, appointID){
		var table = document.getElementById("appointment_table");
		var row = table.insertRow(-1);
		row.id = "schedule_tr";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
		cell1.id = "schedule_td";
		cell2.id = "schedule_td";
		cell3.id = "schedule_td";
		cell4.id = "schedule_td";
		cell5.id = "schedule_td";
    cell6.id = "schedule_td";
    cell7.id = "schedule_td";
		//Display student's name
		cell1.innerHTML = stdName;
		//Display appointment date
		cell2.innerHTML = appoinDate;
		//Display appointment time
		cell3.innerHTML = appStartTime;
    cell4.innerHTML = appEndTime;
		//Display reson for appointment
		cell5.innerHTML = purpose_app;
    cell6.innerHTML = status;


		//check if appointment has been completed. If completed display "completed"
		if(status == 1){
			//cell6.innerHTML = "<span class="+"error"+">Cancelled</span>" +"<br>"  ;
      cell6.innerHTML = "<span class="+"error"+">Completed</span>" +"<br>" ;
			var id = "view_cancelled"+i;
			//alert(id);
			var cd = document.getElementById(id);
      $("#cancelled").show(); //show "cancelled" div
      $("#not_cancelled").hide(); //hide "not_cancelled" div

		}
		//If appointment is not completed, display cancel button
		else{
      cell6.innerHTML = "<span class="+"open"+">Open</span>" +"<br>" ;
			cell7.innerHTML = "<span class=" +"view_cn"+ " id="+"view_cancelled"+i+">Cancel</span>";
			var id = "view_cancelled"+i;
			var x = document.getElementById(id);
			x.addEventListener("click", function() {

				cancelAppointment(appointID, cell7, id);

			});
		}

}



function cancelAppointment(appoinID, cell, cellID){

		var form_data = {};
		form_data["appointment_id"] = appoinID;
    form_data["what"] = "cancel";
		var form_data = JSON.stringify(form_data);

		$.ajax({
			type: 'POST',
			contentType: 'application/json; charset=utf-8',
			url: 'db/dbmanager.php',
			dataType: "json",
			data: form_data,
			success: function(res, textStatus, jqXHR){
				var error = res.error;
				if(error == true)
					alert("Appointment was NOT cancelled, please try again!");
				else{
					alert("Appointment was successfully cancelled!");
          location.reload();

				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				$("#signupErr").html(errorThrown);
			}
		});


}
