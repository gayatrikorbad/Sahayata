<?php


require_once "config.php";


$name = $email = $message  = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {   

      if (empty($_POST["name"])) {  
         $nameErr = "Name is required";
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  

    if (empty($_POST["message"])) {  
         $messageErr = "Message is required"; 
    } else{
      $message = input_data($_POST["message"]);  
      if (strlen ($message) >= 100) {  
            $messageErr = "Message contains more than 100 charters."; 
            }  
    }

     if (empty($_POST["email"])) {  
            $emailErr = "Email is required"; 
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }   
        
        // Check input errors before inserting in database
                if(empty($nameErr) && empty($emailErr) && empty($messageErr)){
                    
                    // Prepare an insert statement
                    $sql = "INSERT INTO contact_us (name,email,message) VALUES ('$name','$email','$message')";
                     
                    if($stmt = mysqli_prepare($link, $sql)){
                        if(mysqli_stmt_execute($stmt)){
                            header("location:contact.php");
                        } else{
                            echo "Something went wrong. Please try again later.";
                        }
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                    // Close connection
                mysqli_close($link);
                }


 }
        
?>
<?php
        function input_data($data) {  
          $data = trim($data);  
          $data = stripslashes($data);  
          $data = htmlspecialchars($data);  
          return $data;  
        }  
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>CONTACT US</title>
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
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">  
    <div class="site-wrap" id="home-section">
    <div class="owl-carousel-wrapper">
      <div class="box-92819">
        <h1 class="text-white mb-3">CONTACT US</h1>
        <p class="lead text-white">If you’re trying to apply for volunteering, please fill in the volunteer application form here.
				<div class="input-group-append">
                     <a href="volunteer.php" class="btn btn-primary rounded-0 px-4">APPLY NOW</a>
                  </div>
        </p>

      </div> 
        <div class="ftco-cover-1 overlay" style="background-image: url('images/7.jpg');">
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
            
        </div>  
        </div>
      
    </div>
    
    
       
    <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="text-cursive">Our Team</h2>
          </div>
        </div>
        <div class="row align-items-stretch">

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 bg-white text-center">
              <a href="#" class="d-inline-block">
                <img src="cart/me.jpeg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                <span class="meta">Founder</span>
                <h2>VAIBHAV SHINDE</h2>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 bg-white text-center">
              <a href="#" class="d-inline-block">
                <img src="cart/umer.jpeg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                <span class="meta">CO-FONDER</span>
                <h2>YASH KADAM</h2>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-5">
            <div class="post-entry-1 h-100 bg-white text-center">
              <a href="#" class="d-inline-block">
                <img src="cart/shree.jpeg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                <span class="meta">MANAGER</span>
                <h2>BHAVIN SHAH</h2>
              </div>
            </div>
          </div>

    <div class="site-section">
      <div class="container">
        <div class="col-md-6 text-center mb-5">
            <h2 class="text-cursive">CONTACT US</h2>
          </div>
        
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group  <?php echo (!empty($nameErr)) ? 'has-error' : ''; ?>">
                <label>Name of an Applicant</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><font color="red"><?php echo $nameErr; ?></font></span>
            </div>   
             <div class="form-group <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?> ">
                <label>EMAIL-ID</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><font color="red"><?php echo $emailErr; ?></font></span>
            </div>    
             <div class="form-group <?php echo (!empty($messageErr)) ? 'has-error' : ''; ?>">
                <label>Message</label>
                <input type="text "name="message" class="form-control"  value="<?php echo $message; ?>">
                <span class="help-block"><font color="red"><?php echo $messageErr; ?></font></span>
            </div>                       
            <div class="form-group">
                <input type="submit"  class="btn btn-primary" value="SEND">
            </div>
        </form>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-cursive mb-4">Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-muted small text-uppercase font-weight-bold">Address:</span>
                  <span>707,Canaught Place,Bund garden,PUNE</span></li>
                <li class="d-block mb-3"><span class="d-block text-muted small text-uppercase font-weight-bold">Phone:</span><span>020 24456576</span></li>
                <li class="d-block mb-3"><span class="d-block text-muted small text-uppercase font-weight-bold">Email:</span><span>sahayatta@gmail.com</span></li>
              </ul>
            </div>
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
