 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?> 

<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<html>
 <head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
      <style>
        #topbar
        {
          background-color: #686868;
          padding-top: 70px;
          padding-bottom: 20px;
          position: relative;

        }
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 600px;
          margin: auto;
          padding-top: 20px;
          padding-bottom: 20px;
          padding-right: 20px;
          padding-left: 20px;
        }  
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }
 </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
          <div style="position:relative;">
          <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
          </div>
          <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
          <p><h4><b>R V College of Engineering</b></h4></p>
          <p><h6>Mysore Road, RV Vidyaniketan Post, Bagalore - 560 059</h6></p>
          </center>
        </div>
        <hr>
        <div class="box"><center>
        	<h4>Edit in the form below</h4>
			<form action="submit" id="Edit_form" title="Edit">
			<?php
			if($_SERVER["REQUEST_METHOD"] == "POST")	
			{
				$usn = $_POST['usn'];
				if(!empty($usn))
				{
					require_once __DIR__ . '/db_connect.php';
				 
				    // connecting to db
				    $db = new DB_CONNECT();
				 	if($db)
				 	{
				 		$sql="SELECT * FROM student Where USN = '".$usn."'" ;
				    	$res = mysql_query($sql);
					    // check if row inserted or not
				    	while($row=mysql_fetch_array($res))
				    	{
				 		?>
				 		<text style="padding-right:82px"><strong>Name</strong></text><input type="text" id="name" size="50" value="<?php echo $row['Name']; ?>"><br>
				 		<text style="padding-right:20px"><strong>Phone number</strong></text><input type="text" id="phone" size="50" value="<?php echo $row['Phone_No'];?>"><br>
				    	<text style="padding-right:65px"><strong>Email Id</strong></text><input type="text" id="email" size="50" value="<?php echo $row['Email_ID'];?>"><br>
				    	<?php
				    	}
					}
				}
			}

			?>
			</form>
			<br>
			<button id="submit" class="btn btn-primary">Submit</button>
		</center>
		</div>
		<ul class="breadcrumb" id="footer" style="background-color:#202020">
		  <li><a href="admin_management.php">Home</a></li>
		  <li><a href="asretrieve.php">View Student Details</a></li>
		  <li class="active">Edit</li>
		</ul>
		</div>
		</div>

		<script>
		$(document).ready(function(){
			$("#submit").click(function(){
			var usn="<?php echo $usn ?>";
			var name = $("#name").val();
			var email = $("#email").val();
			var phone = $("#phone").val();
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = '&usn=' + usn+ '&name1='+ name + '&email1='+ email + '&phone1='+ phone;
			if(name==''||email==''||phone=='')
			{
			alert("Please Fill All Fields");
			}
			else
			{
			// AJAX Code To Submit Form.
			$.ajax({
			type: "POST",
			url: "ajaxsubmit.php",
			data: dataString,
			cache: false,
			success: function(result){
			alert(result);
			}
			});
			}
			return false;
			});
			});
		</script>
	</body>
</html>
