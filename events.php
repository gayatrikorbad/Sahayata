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
<html lang="en">

<head>
  <title>EVENTS</title>
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
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
    .card img{
      height: 20vh;
      width:80%;
      background-position: center;

    }
    .vaibhav{
      margin-left:-120px;
    }
  </style>

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">  
    <div class="site-wrap" id="home-section">
    <div class="owl-carousel-wrapper">
      <div class="box-92819">
        <h1 class="text-white mb-3">EVENTS</h1>
        <p class="lead text-white">BE THE PART OF CHANGE.BE THE REVOLUTION.JOIN US</p>
      </div> 
        <div class="ftco-cover-1 overlay" style="background-image: url('images/9.jpg');">
           <div class="overlay">
          <div class="navbar">
            <div class="logo">
              <img src="images/logo.png">
            </div>
            <div class= "menu-icons">
              <a href="profile.php"><img src="images/signin.png"></a>
              <img src="images/cart.png">
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
            
        </div>  
        </div>
      
    </div>
    
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/7.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto">
            <h3 class="text-cursive mb-4">Our Mission</h3>
            <p> We connect people around the world in the fight to end poverty. Working together, we invest in the lives of children and youth, build the healthy environments they need to thrive, and empower them to create lasting change in their own lives and communities.</p>
            <h3 class="text-cursive mb-4">Our Vision</h3>
            <p>The vision of SAHAYATTA is for every child in India to have the opportunity to learn, to have a healthy start, and to feel supported and secure living in a clean environment that is prepared for natural disasters.</p>
            <a href="contact.php" class="btn btn-primary rounded-0 px-4">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
   </div>

    <div class="container">
            <h3 class="text-cursive mb-4">UPCOMING EVENTS</h3> 
            <br><br>
        
<div class="vaibhav">
     <div class="card mb-3" style="max-width: 1200px; margin-left: 200px;">
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
 <div class="container">
            <!--h3 class="text-cursive mb-4">LAST EVENTS</h3> 
        <div class="row">
          <div class="col-md-4">
              <div class="cause shadow-sm">
              
                <a href="#" class="cause-link d-block">
                  <img src="images/12.jpg" alt="Image" class="img-fluid">
                </a>

                <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                  <span class="badge-danger py-1 small px-2 rounded mb-3 d-inline-block">BLOOD DONATION CAMP</span>
                  <h6 class="mb-6">The purpose to organize a blood donation camp is to motivate people to donate blood and social works. The purpose of blood donation camp to select a suitable donor whose blood will be safe to the recipient and who himself shall not in any way be harmed by blood donation.This camp was held in Mahavir Prastithan Campus,Pune.</h6>
                  <div class="border-top border-light border-bottom py-2 d-flex">
                  <div class="ml-auto"><strong class="text-primary">SATURADAY, 14,NOVEMBER 2020</strong></div>
                  </div>
                </div>  
              </div>
          </div>


          <div class="col-md-4">
            
            <div class="cause shadow-sm">
              
                <a href="#" class="cause-link d-block">
                  <img src="images/7.jpg" alt="Image" class="img-fluid">
                </a>

                <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                  <span class="badge-warning py-1 small px-2 rounded mb-3 d-inline-block">ONLINE WEBINAR</span>
                  <h6 class="mb-6">A webinar is an engaging online event where a speaker, or small group of speakers, deliver a presentation to a large audience who participate by submitting questions, responding to polls and using other available interactive tools.This webinar was regarding problems faced by students in studies dur to lockdown.</h6>
                  <div class="border-top border-light border-bottom py-2 d-flex">
                    <div class="ml-auto"><strong class="text-primary">SUNDAY, 1,NOVEMBER 2020</strong></div>
                  </div>
                </div>
              </div>

          </div>
          <div class="col-md-4">
            
            <div class="cause shadow-sm">
              
                <a href="#" class="cause-link d-block">
                  <img src="images/11.jpg" alt="Image" class="img-fluid">
                </a>

                <div class="px-3 pt-3 border-top-0 border border ">
                  <span class="badge-primary py-1 small px-2 rounded mb-3 d-inline-block">Tree Planting</span>
                  <h6 class="mb-6">Trees help clean the air we breathe, filter the water we drink, and provide habitat to over 80% of the world's terrestrial biodiversity.Tree planting was an event where number of students from different schools come together and planted around 300 to 350 new plants near areas of Paravati,Pune.</a></h6>
                  <div class="border-top border-light border-bottom py-2 d-flex">
                    <div class="ml-auto"><strong class="text-primary">WEDNESDAY, 28,OCTOBER 2020</strong></div>
                  </div>
                </div>
              </div>
           </div>      
        </div>
      </div>
    </div>
  </div>
</div--> 

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
    </div>
  </div>
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

  </body>

</html>
