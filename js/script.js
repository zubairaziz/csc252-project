function addRow() {
	var table = document.getElementById("schedule_table");
	var row = table.insertRow(-1);
	row.id = "schedule_tr";
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	var cell6 = row.insertCell(5);
	cell1.id = "schedule_td";
	cell2.id = "schedule_td";
	cell3.id = "schedule_td";
	cell4.id = "schedule_td";
	cell5.id = "schedule_td";
	cell6.id = "schedule_td";
	cell1.innerHTML = "Start Time:" + "<br>" + "End Time:";
	cell2.innerHTML =
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">" +
		"<br>" +
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">";
	cell3.innerHTML =
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">" +
		"<br>" +
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">";
	cell4.innerHTML =
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">" +
		"<br>" +
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">";
	cell5.innerHTML =
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">" +
		"<br>" +
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">";
	cell6.innerHTML =
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">" +
		"<br>" +
		"<input type=" +
		"time" +
		" name=" +
		"schedule_time" +
		">";
}

function getAvailibity(id) {
	var form = {};
	form["what"] = "getAvailaibity";
	form["id"] = id;
	var form_data = JSON.stringify(form);

	$.ajax({
		type: "POST",
		contentType: "application/json; charset=utf-8",
		url: "db/dbmanager.php",
		dataType: "json",
		data: form_data,
		success: function(res, textStatus, jqXHR) {
			var error = res.error;
			if (error == true) addRow();
			//alert("Availability NOT Found");
			else {
				showAvailability(res.office_hrs);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert(errorThrown);
		}
	});
}

function showAvailability(office_hrs) {
	var table = document.getElementById("schedule_table");
	//Retrieve monday office hrs
	if (office_hrs.hasOwnProperty("2")) var monday = office_hrs["2"];
	else var monday = [];
	//Retrieve tuesday office hrs
	if (office_hrs.hasOwnProperty("3")) var tuesday = office_hrs["3"];
	else var tuesday = [];
	//Retrieve wednesday office hrs
	if (office_hrs.hasOwnProperty("4")) var wednesday = office_hrs["4"];
	else var wednesday = [];
	//Retrieve thursday office hrs
	if (office_hrs.hasOwnProperty("5")) var thursday = office_hrs["5"];
	else var thursday = [];
	//Retrieve friday office hrs
	if (office_hrs.hasOwnProperty("6")) var friday = office_hrs["6"];
	else var friday = [];

	//Due to poor design choose I made at initial stage, I now have to do this in order to loop through office_hrs
	var ar = [
		monday.length,
		tuesday.length,
		wednesday.length,
		thursday.length,
		monday.length
	];
	ar.sort(function(a, b) {
		return b - a;
	});
	var max = ar[0];

	for (var i = 0; i < max; i++) {
		//var table = document.getElementById("schedule_table");
		var row = table.insertRow(-1);
		row.id = "schedule_tr";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		cell1.id = "schedule_td";
		cell2.id = "schedule_td";
		cell3.id = "schedule_td";
		cell4.id = "schedule_td";
		cell5.id = "schedule_td";
		cell6.id = "schedule_td";
		cell1.innerHTML = "Start Time:" + "<br>" + "End Time:";

		//Display monday office hrs
		if (monday.length > i) {
			var time = monday[i].split(" - ");
			var startTime = moment(time[0], ["h:mm A"]).format("HH:mm");
			var endTime = moment(time[1], ["h:mm A"]).format("HH:mm");
			cell2.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				startTime +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				endTime +
				">";
			//alert(momentObj);
		} else
			cell2.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">";

		//Display tuesday office hrs
		if (tuesday.length > i) {
			var time = tuesday[i].split(" - ");
			var startTime = moment(time[0], ["h:mm A"]).format("HH:mm");
			var endTime = moment(time[1], ["h:mm A"]).format("HH:mm");
			cell3.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				startTime +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				endTime +
				">";
			//alert(momentObj);
		} else
			cell3.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">";

		//Display wednesday office hrs
		if (wednesday.length > i) {
			var time = wednesday[i].split(" - ");
			var startTime = moment(time[0], ["h:mm A"]).format("HH:mm");
			var endTime = moment(time[1], ["h:mm A"]).format("HH:mm");
			cell4.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				startTime +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				endTime +
				">";
			//alert(momentObj);
		} else
			cell4.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">";

		//Display thursday office hrs
		if (thursday.length > i) {
			var time = thursday[i].split(" - ");
			var startTime = moment(time[0], ["h:mm A"]).format("HH:mm");
			var endTime = moment(time[1], ["h:mm A"]).format("HH:mm");
			cell5.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				startTime +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				endTime +
				">";
			//alert(momentObj);
		} else
			cell5.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">";

		//Display friday office hrs
		if (friday.length > i) {
			var time = friday[i].split(" - ");
			var startTime = moment(time[0], ["h:mm A"]).format("HH:mm");
			var endTime = moment(time[1], ["h:mm A"]).format("HH:mm");
			cell6.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				startTime +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				" value=" +
				endTime +
				">";
			//alert(momentObj);
		} else
			cell6.innerHTML =
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">" +
				"<br>" +
				"<input type=" +
				"time" +
				" name=" +
				"schedule_time" +
				">";
	}
}

function getAppointments(id) {
	//alert(id);
	var form = {};
	form["what"] = "get";
	form["id"] = id;
	var form_data = JSON.stringify(form);
	//alert(form_data);
	$.ajax({
		type: "POST",
		contentType: "application/json",
		url: "db/dbmanager.php",
		data: form_data,
		dataType: "json",
		success: function(res, textStatus, jqXHR) {
			var found = res.Found;
			if (found == false) {
				alert("No Appointments Found.");
			} else {
				var appointments = res.Appointment;
				for (var i = 0; i < appointments.length; i++) {
					var appointment = appointments[i];
					var appointID = appointment["appointmentID"];
					var stdName = appointment["stdName"];
					var appoinDate = appointment["appointment_date"];
					var appStartTime = appointment["appointment_start_time"];
					var appEndTime = appointment["appointment_end_time"];
					var purpose_app = appointment["purpose_of_appointment"];
					var status = appointment["status"];

					showAppointments(
						i,
						stdName,
						appoinDate,
						appStartTime,
						appEndTime,
						purpose_app,
						status,
						purpose_app,
						appointID
					);
				}
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert("An error occured. Please try again.");
			alert(errorThrown);
		}
	});
}

function showAppointments(
	i,
	stdName,
	appoinDate,
	appStartTime,
	appEndTime,
	purpose_app,
	status,
	purpose_app,
	appointID
) {
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
	if (status == 1) {
		//cell6.innerHTML = "<span class="+"error"+">Cancelled</span>" +"<br>"  ;
		cell6.innerHTML =
			"<span class=" + "error" + ">Completed</span>" + "<br>";
		var id = "view_cancelled" + i;
		//alert(id);
		var cd = document.getElementById(id);
		$("#cancelled").show(); //show "cancelled" div
		$("#not_cancelled").hide(); //hide "not_cancelled" div
	}
	//If appointment is not completed, display cancel button
	else {
		cell6.innerHTML = "<span class=" + "open" + ">Open</span>" + "<br>";
		cell7.innerHTML =
			"<span class=" +
			"view_cn" +
			" id=" +
			"view_cancelled" +
			i +
			">Cancel</span>";
		var id = "view_cancelled" + i;
		var x = document.getElementById(id);
		x.addEventListener("click", function() {
			cancelAppointment(appointID, cell7, id);
		});
	}
}

function cancelAppointment(appoinID, cell, cellID) {
	var form_data = {};
	form_data["appointment_id"] = appoinID;
	form_data["what"] = "cancel";
	var form_data = JSON.stringify(form_data);

	$.ajax({
		type: "POST",
		contentType: "application/json; charset=utf-8",
		url: "db/dbmanager.php",
		dataType: "json",
		data: form_data,
		success: function(res, textStatus, jqXHR) {
			var error = res.error;
			if (error == true)
				alert("Appointment was NOT cancelled, please try again!");
			else {
				alert("Appointment was successfully cancelled!");
				location.reload();
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			$("#signupErr").html(errorThrown);
		}
	});
}

function submitSchedule(id) {
	var form_name = document.schedule_form;
	var form = {};
	form["id"] = id;
	var check1 = false;
	var check2 = false;

	var schedule = {};

	var table = document.getElementById("schedule_table");
	//Retrieve all table rows
	var rows = table.rows;
	var row_length = rows.length;

	if (row_length > 1) {
		$("#submitScheduleErr").html("");
		//Iterate over table rows to retrieve table data (ie schedule times)

		for (var i = 1; i < row_length; i++) {
			//Retrieve all cells in row[i]
			var cells = rows[i].cells;
			var cell = cells[1];
			var children = cell.children;
			var start_time = children[0].value;
			var end_time = children[2].value;
			if (start_time != "" && end_time != "") {
				check1 = true;
				//Convert 24hr to 12hr time
				var start_time = moment(start_time, ["HH:mm"]).format("h:mm A");
				var end_time = moment(end_time, ["HH:mm"]).format("h:mm A");
				var time = start_time + " - " + end_time;
				if (schedule.hasOwnProperty("2")) schedule["2"].push(time);
				else {
					schedule["2"] = [];
					schedule["2"].push(time);
				}
			}else{
				var time = "";
				schedule["2"] = [];
				schedule["2"].push(time);
			}

			var cell = cells[2];
			var children = cell.children;
			var start_time = children[0].value;
			var end_time = children[2].value;
			if (start_time != "" && end_time != "") {
				check1 = true;
				//Convert 24hr to 12hr time
				var start_time = moment(start_time, ["HH:mm"]).format("h:mm A");
				var end_time = moment(end_time, ["HH:mm"]).format("h:mm A");
				var time = start_time + " - " + end_time;
				if (schedule.hasOwnProperty("3")) schedule["3"].push(time);
				else {
					schedule["3"] = [];
					schedule["3"].push(time);
				}
			}
			else{
				var time = "";
				schedule["3"] = [];
				schedule["3"].push(time);
			}

			var cell = cells[3];
			var children = cell.children;
			var start_time = children[0].value;
			var end_time = children[2].value;
			if (start_time != "" && end_time != "") {
				check1 = true;
				//Convert 24hr to 12hr time
				var start_time = moment(start_time, ["HH:mm"]).format("h:mm A");
				var end_time = moment(end_time, ["HH:mm"]).format("h:mm A");
				var time = start_time + " - " + end_time;
				if (schedule.hasOwnProperty("4")) schedule["4"].push(time);
				else {
					schedule["4"] = [];
					schedule["4"].push(time);
				}
			}else{
				var time = "";
				schedule["4"] = [];
				schedule["4"].push(time);
			}

			var cell = cells[4];
			var children = cell.children;
			var start_time = children[0].value;
			var end_time = children[2].value;
			if (start_time != "" && end_time != "") {
				check1 = true;
				//Convert 24hr to 12hr time
				var start_time = moment(start_time, ["HH:mm"]).format("h:mm A");
				var end_time = moment(end_time, ["HH:mm"]).format("h:mm A");
				var time = start_time + " - " + end_time;
				if (schedule.hasOwnProperty("5")) schedule["5"].push(time);
				else {
					schedule["5"] = [];
					schedule["5"].push(time);
				}
			}else{
				var time = "";
				schedule["5"] = [];
				schedule["5"].push(time);
			}

			var cell = cells[5];
			var children = cell.children;
			var start_time = children[0].value;
			var end_time = children[2].value;
			if (start_time != "" && end_time != "") {
				check1 = true;
				//Convert 24hr to 12hr time
				var start_time = moment(start_time, ["HH:mm"]).format("h:mm A");
				var end_time = moment(end_time, ["HH:mm"]).format("h:mm A");
				var time = start_time + " - " + end_time;
				if (schedule.hasOwnProperty("6")) schedule["6"].push(time);
				else {
					schedule["6"] = [];
					schedule["6"].push(time);
				}
			}else{
				var time = "";
				schedule["6"] = [];
				schedule["6"].push(time);
			}
		}

		if (check1 == true) {
			form["schedule"] = schedule;
			form["what"] = "insertAvailaibity";
			form["profID"] = id;
			var form_data = JSON.stringify(form);
			//alert(form_data);

			$.ajax({
				type: "POST",
				contentType: "application/json; charset=utf-8",
				url: "db/dbmanager.php",
				dataType: "json",
				data: form_data,
				success: function(res, textStatus, jqXHR) {
					var error = res.error;
					if (error == true)
						alert("Availability NOT saved. Please try again.");
					else {
						alert("Availability was successfully saved!");
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#signupErr").html(errorThrown);
					alert(errorThrown);
				}
			});
		} else
			$("#submitScheduleErr").html(
				"Please enter at least one office hour."
			);
	} else
		$("#submitScheduleErr").html("Please enter at least one office hour.");
}
