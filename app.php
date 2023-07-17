<?php
session_start()    
?>

<!DOCTYPE html>
<html>
<title>APPLICATIONS</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
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
table, th, td {
  border: 1px solid black;
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
                 <div class="box-92819">
                <center>
                  <h1 class="text-black mb-3"><font size="5"><i>Applications</i></font></h1>
                </center>
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
          </div>
                
                                    <div class="container">            
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    
                                    <th>USERNAME</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>CONTACT US</th>
                                    <th>EDUCATION</th>
                                    <th>CITY</th>
                                    <th>STATE</th>
                                     <th>EXPERIENCE</th>
                                     <th>SUBMITTED AT</th>
                                    
                                  </tr>
                                </thead>
                                <tbody> 

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
                 $sql = "SELECT * FROM application order by created_at ";

                                     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                        while($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                      <tr>
                                        
                                        <td><?php echo $row['username']; ?></td> 
                                        <td><?php echo $row['name']; ?></td> 
                                        <td><?php echo $row['email']; ?></td> 
                                        <td><?php echo $row['contact']; ?></td> 
                                        <td><?php echo $row['education']; ?></td> 
                                        <td><?php echo $row['city']; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                        <td><?php echo $row['experience']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>    
                                  
                                    </tr>

                                   <?php 
                            
                               
                            
                          }
                                          
                     ?>
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


     <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>