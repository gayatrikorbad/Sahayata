<?php
session_start()    
?>

<!DOCTYPE html>
<html>
<title>ADMIN</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
<style>  
.slidemenu{
	position: fixed;
	top:0px;
	right: 0px;
	height: 100%;
	width: 0px;
	background-color: #222;
	z-index: 1;
	padding-top: 100px;
	overflow-x: hidden; 
	transition: all.6s;
}

#mainbox{
	color:black;
	margin-left:280px;
	font-size: 24px;
	cursor:pointer;
	transition: all.6s;
	display: inline block;
}
.slidemenu a{
	padding: 8px 8px 8px 64px;
	text-decoration: none;
	font size: 20px;
	color: #999;
	display: block;
}
.slidemenu a:hover{
	color:white;
}
.slidemenu .closebtn{
	position :absolute;
	top:0px;
	left: -15px;
	font-size: 36px;
	margin-right: 62px;
}

.one{
	margin-left: 450px;
}
.two{
	margin-left: 500px;
	width: 0px;

}
.three{
	margin-top: -320px;
	margin-left: 300px;
	width: 0px;
}
.four{
	margin-top:-30px;
	margin-left: -140px;
}

span.a {
  display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 35px;
  border: 1px solid blue;
  background-color:#0066ff;
  color:white;
}
span.d{
  display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 35px;
  border: 1px solid blue;
  background-color:#008B8B;
  color:white;
}

span.e {
  display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 35px;
  border: 1px solid blue;
  background-color:#FFA500;
  color:white;
}

span.b {
  display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 35px;
  border: 1px solid blue;
  background-color:#00cc00;
  color:white;
}

span.c {
   display: inline; /* the default for span */
  width: 100px;
  height: 100px;
  padding: 35px;
  border: 1px solid blue;
  background-color: #FF0000;
  color:white;
}
</style>
</head>

<body >

	<div class ="banner">
		    <div class="slider"> 
			     <img src="" id="slideImg">
		    </div>
		
		    <div class="navbar">
		    	 <div class="logo">
                        <img src="images/logo(1).png">
                 </div>
                    <div class= "menu-icons">
                        <div id="menu" class="slidemenu">
                        	<a href="admin.php">ADMIN PANEL</a>
                            <a href="add_event.php">ADD A EVENT</a>
                            <a href="app.php">Applications</a>
                            <a href="enquires.php">Enquires</a>
                            <a href="carth.php">CART DETAILS</a>
                           <a href="logout.php">Logout</a>
                            
                            <a href="#" class="closebtn" onclick="closefunction()">&times;</a>
                         </div>
                           <div id="mainbox" onclick="openfunction()">&#9776; </div>
                    </div> 
                    <div class="one">         
    					<div class="page-header">
	        				<center>
	        					<h1>Hi, <b>ADMIN</b>. Welcome to our site.</h1>
	        					<p><B>NUMBER OF USERS IN EACH TABLE.</B></p>
	        				</center>
   						</div>
   					</div>


   					<div class="two">
   						<?php
   						define('DB_SERVER', 'localhost');
						define('DB_USERNAME', 'root');
						define('DB_PASSWORD', '');
						define('DB_NAME', 'demo');
						 
						/* Attempt to connect to MySQL database */
						$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
						// Check connection
						if($conn === false){
						    die("ERROR: Could not connect. " . mysqli_connect_error());
						}

							foreach($conn->query('SELECT COUNT(*) FROM users') as $row) {
					
							echo'	<div class="row">
          							<div class="col-md-4">
             							 <div class="cause shadow-sm">   
							                <br><br>
							                  <span class="a" font-color="white">'; echo "<b>" . $row['COUNT(*)'] ."</b>"; echo'</span>';
							                  echo'<br><br><br>';
							                echo '<h6 class="mb-3"><b><center>Users</center><b></h6>';
							      
							echo "<tr>";
							
							echo "</tr>";
							}
						?>
						<?php


						        foreach($conn->query('SELECT COUNT(*) FROM application') as $row) {
					
							echo'	<div class="row">
          							<div class="col-md-4">
             							 <div class="cause shadow-sm">   
							                <br><br>
							                  <span class="b" font-color="white">'; echo "<b>" . $row['COUNT(*)'] ."</b>"; echo'</span>';
							                  echo'<br><br><br>';
							                echo '<h6 class="mb-3"><b><center>Application</center><b></h6>';
							      
							echo "<tr>";
							
							echo "</tr>";
							}
							?>
						</div>



						<div class="three">
							<?php


						        foreach($conn->query('SELECT COUNT(*) FROM contact_us') as $row) {
					
							echo'	<div class="row">
          							<div class="col-md-4">
             							 <div class="cause shadow-sm">   
							                <br><br>
							                  <span class="d" font-color="white">'; echo "<b>" . $row['COUNT(*)'] ."</b>"; echo'</span>';
							                  echo'<br><br><br>';
							                echo '<h6 class="mb-3"><b><center>MESSAGES</center><b></h6>';
							      
							echo "<tr>";
							
							echo "</tr>";
							}
							?>

							<?php


						        foreach($conn->query('SELECT COUNT(*) FROM donation') as $row) {
					
							echo'	<div class="row">
          							<div class="col-md-4">
             							 <div class="cause shadow-sm">   
							                <br><br>
							                  <span class="c" font-color="white">'; echo "<b>" . $row['COUNT(*)'] ."</b>"; echo'</span>';
							                  echo'<br><br><br>';
							                echo '<h6 class="mb-3"><b><center>DONATIONS</center><b></h6>';
							      
							echo "<tr>";
							
							echo "</tr>";
							}
							?>
						</div>
						<div class="four">
							<?php


						        foreach($conn->query('SELECT COUNT(*) FROM buyers') as $row) {
					
							echo'	<div class="row">
          							<div class="col-md-4">
             							 <div class="cause shadow-sm">   
							                <br><br>
							                  <span class="e" font-color="white">'; echo "<b>" . $row['COUNT(*)'] ."</b>"; echo'</span>';
							                  echo'<br><br><br>';
							                echo '<h6 class="mb-3"><b><center>CART</center><b></h6>';
							      
							echo "<tr>";
							
							echo "</tr>";
							}
							?>

							 <div class="five">
				    
   					</div>	
   					
</div>
   				
	</div>
		    	

<center>
</body>
</html>
<script>
        function openfunction(){
                document.getElementById("menu").style.width="300px";
                document.getElementById("mainbox").style.marginright="300px";
                document.getElementById("mainbox").innerHTML="";
            }
            function closefunction(){
                    document.getElementById("menu").style.width="0px";
                    document.getElementById("mainbox").style.marginright="0px";
                    document.getElementById("mainbox").innerHTML="&#9776";;
            }

</script>
