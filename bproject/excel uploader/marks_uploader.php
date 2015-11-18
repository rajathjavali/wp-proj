<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="excel_uploader_sublist.js"></script>
</head>
</head>
<body>
<h1>Retrieve Attendance</h1>
	<form method="post" action="excel_marks_uploader.php">
		<div>
			Semester:
			<select id="sem" required name="sem">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
			</select> 
			
		</div>
		<br/><br/>
		<div>
			Department:
			<select id="dept" required name="dept">
				<option>ECE</option>
				<option>CSE</option>
				<option>ISE</option>
				<option>IT</option>
				<option>BT</option>
				<option>ME</option>
			</select>
		</div>
		<br/><br/>
		<div>
			Course Type:
			<select id="course" required name="course">
				<option>CORE</option>
				<option>LOCAL ELECTIVE</option>
				<option>GLOBAL ELECTIVE</option>
			</select>
		</div>
		<br/><br/>
		<div>
			Academic Year:
			<input type="number" name="acy" id="acy" min="2013" max="2025" value="2014">
		</div>
		<br/><br/>
		<div id="b">

		</div>
		<input id="submit" onclick="retrieveSub()" type="button" value="Submit">
	</form>
	
</body>
</html>