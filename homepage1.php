<?php
$conn = mysqli_connect('localhost', 'root', '','demo');

if(!$conn){
  echo 'Connection error:'  . mysqli_connect_error();
}

$sql= 'SELECT * FROM event  ';
$result = mysqli_query($conn,$sql);

$event=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<title>SAHAYATTA</title>
<head>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
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
	color:white;
	margin-left:80px;
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
</style>
</head>

<body onload="slider()">

	<div class ="banner">
		    <div class="slider"> 
			     <img src="images/3.jpg" id="slideImg">
		    </div>
		
		    <div class="overlay">
		    	<div class="navbar">
		    		<div class="logo">
		    			<img src="images/logo.png">
		    		</div>
		    		<div class= "menu-icons">
		    			<a href="profile.php"><img src="images/signin.png"></a>
		    			<a href="cart.php"><img src="images/cart.png"></a>
		    			<div id="menu" class="slidemenu">
							<a href="homepage1.php">Home</a>
							<a href="aboutus.html">About us</a>
							<a href="events.php">Events</a>
							<a href="impact.html">Impact</a>
							<a href="covid.html">Covid-19</a>
			  				<a href="contact.php">Contact Us</a>
							<a href="volunteer.php">To Be Volunteer</a>
							<a href="logout.php">Logout</a> 
							<a href="#" class="closebtn" onclick="closefunction()">&times;</a>
						</div>
							<div id="mainbox" onclick="openfunction()">&#9776; </div>
		    		</div>
		    	</div>
		    	<div class="content">

		    				<h1>SAHAYATTA</h1>
							<h2>Be the part of change</h2>
							<div class="form_code">
								<button type="button "><a href="aboutus.html"><font color="white">Learn More</button></font></a>
								<button type="button" class="btn-2"><a href="donate.php"><font color="white">Donate Now</button></font></a>
							</div>
				</div>			
		    </div>	
	</div>
	<div class="style">
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <h6 class="heading">SAHAYATTA</h6>
      <p>BE THE PART CHANGE</p>
      <p><font size="5">UPCOMING EVENTS</font></p>
      <div class="vaibhav">
     <div class="card mb-3" style="max-width: 1200px; margin-left: 200px;left: -120px;top: 23px;">
              <?php foreach ($event as $event){ ?>
  <div class="row no-gutters">
    <div class="col-md-4">
      <div class="card"><img src="<?php echo htmlspecialchars($event['image']);?>" class="card-img" alt="..."></div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title"><?php echo htmlspecialchars($event['name'] );?></h3>
        <p class="card-text">DATE FOR EVENT : <?php echo htmlspecialchars($event['ddate'] );?></p>
        <p class="card-text">DESCRIPTION : <?php echo htmlspecialchars($event['description'] );?></p>
      </div>
    </div>
  </div>
    <hr border="20px"color='black'>
    <hr>
<?php } ?>
</div>
</div>
</div>
    </div>
    <div class="group latest">
     
</div>
</section>
</div>
</div>

  <footer class="site-footer bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">Disclaimer</h2>
                <p>Its an nonprofitable organisation,which works for the betterment of people across all the platforms,hence there is no three party committe or organisation works with us.</p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="aboutus.html">About Us</a>
                  <li><a href="events.php">Events</a></li>
                  <li><a href="impact.html">Impact</a></li>
                  <li><a href="covid.html">Covid-19</a></li>
                  <li><a href="volunteer.php">To Be Volunteer</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
            <h2 class="footer-heading mb-4">Follow Us</h2>
            <div class="followus">
            <a href="#about-section"><img src="images/facebook.png"></a>
            <a href="#"><img src="images/instagram.png"></a>
            <a href="#"><img src="images/twitter.png"></a>
    			</div>
            <br>
        <div class="mb-5">
              <h2 class="footer-heading mb-4">CONTACT US</h2>
                  <div class="input-group-append">
                     <a href="contact.php" class="btn btn-primary rounded-0 px-4">Contact Us</a>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</footer>
 <script>
	var slideImg=document.getElementById("slideImg");
	var images=new Array(
		"images/7.jpg",
		"images/8.jpg",
		"images/12.jpg",
		"images/22.jpg",
		"images/7.jpg",
		"images/17.jpg",
		"images/11.jpg"
		);
	var len=images.length;
	var i=0;
	function slider(){
		if(i>len-1){
			i=0;
		}
		slideImg.src=images[i];
		i++;
		setTimeout('slider()',5000);
	}
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
</body>
</html>