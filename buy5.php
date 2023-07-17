<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username=$name = $email = $city = $state = $img_id = $contact = $amount = $ptype="";
$usernameErr=$nameErr = $emailErr = $cityErr = $stateErr = $educationErr = $contactErr = $experienceErr = $ptypeErr = "";

       

 if($_SERVER["REQUEST_METHOD"] == "POST"){
  $amount="600";
  $ptype=$_POST['ptype'];
  $img_id="Walking Through The Forest";


 $username=$_SESSION['username'];

                    
                      // Validate username
                    if (empty($_POST["images"])) {  
                         $imageErr = "Image is required";
                    }
 
                    // Validate username
                    if (empty($_POST["name"])) {  
                         $nameErr = "Name is required";
                    } else {  
                        $name = input_data($_POST["name"]);  
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                                $nameErr = "Only alphabets and white space are allowed";  
                            }  
                    }  

                    if (empty($_POST["contact"])) {  
                            $contactErr = "Contact-No is required"; 
                    
                    } else {  
                            $contact = input_data($_POST["contact"]);  
                            // check if mobile no is well-formed  
                            if (!preg_match ("/^[0-9]*$/", $contact) ) {  
                            $contactErr = "Only numeric value is allowed.";
                            }  
                        //check mobile no length should not be less and greator than 10  
                        if (strlen ($contact) != 10) {  
                            $contactErr = "Mobile no must contain 10 digits."; 
                            }  
                    }  
                  

                    if (empty($_POST["city"])) {  
                         $cityErr = " City Name is required";
                    } else {  
                        $city = input_data($_POST["city"]);  
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$city)) {  
                                $cityErr = "Only alphabets and white space are allowed";
                            }  
                    }  

                    if (empty($_POST["state"])) {  
                         $stateErr = " State Name is required"; 
                    } else {  
                        $state = input_data($_POST["state"]);  
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$state)) {  
                                $stateErr = "Only alphabets and white space are allowed";  
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

                      if (empty($_POST["ptype"])) {  
                            $ptypeErr = "Payment Type is required"; 
                    }

                // Check input errors before inserting in database
                if( empty($nameErr) && empty($emailErr) && empty($stateErr) && empty($cityErr) && empty($contactErr) && empty($ptypeErr) && empty($usernameErr)){
                    
                    // Prepare an insert statement
                    $sql = "INSERT INTO buyers (username,name,email,contact,city,state,ptype,amount,img_id) VALUES ('$username','$name','$email','$contact','$city','$state','$ptype','$amount','$img_id')";
                     
                    if($stmt = mysqli_prepare($link, $sql)){
                        if(mysqli_stmt_execute($stmt)){
                            echo "<script> alert('Thanks for donating'); </script>" ; 
                            header("location:cart.php");
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
    
    <meta charset="UTF-8">
    <title>BUY NOW</title>
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
    <style type="text/css">
        body{ 
      font: 14px sans-serif;
          align-content: center; 
          background-image: url("");
          background-repeat: no-repeat;
          background-size:100% 100vh;
          }
        .wrapper{ width: 350px; 
          padding: 40px;
          margin-top: 0px; 
          margin-left:1000px;
          text-align:center; }

            .followus{
                margin left: 480px;
                flex:4;
                align-items: center;
              }
            .followus img{
              width: 40px;
              margin-left:20px;
              cursor: pointer;
            }

          .logo{
          flex-basis: 15%;
          }
          .logo img{
            margin:20px 40px;
          width:120px;
          cursor: pointer;
          }
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
          margin-top: -180px;
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
        .menu-icons{
              display: flex;
              margin-left: 1320px;
              flex:4;
              align-items: center;
            }
            .menu-icons img{
              margin-left:20px;
              cursor: pointer;
            }
    </style>
</head>
<body>
    <div class="logo">
              <img src="images/logo(1).png">
            </div>
            <div class= "menu-icons">
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


      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="cart/5.jpeg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto">
            <font color="black"> <h4>DETAILS</h4>

        <p>Please fill in your details to TO CHECK OUT.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multi/form-data">

           
            <div class="form-group  <?php echo (!empty($nameErr)) ? 'has-error' : ''; ?>">
                <label>Name of A Buyer</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $nameErr; ?></span>
            </div>   
             <div class="form-group <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?> ">
                <label>EMAIL-ID</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $emailErr; ?></span>
            </div>    
             <div class="form-group <?php echo (!empty($contactErr)) ? 'has-error' : ''; ?>">
                <label>CONTACT-NO</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>">
                <span class="help-block"><?php echo $contactErr; ?></span>
            </div>     
             <div class="form-group <?php echo (!empty($cityErr)) ? 'has-error' : ''; ?> ">
                <label>CITY</label>
                <input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
                <span class="help-block"><?php echo $cityErr; ?></span>
            </div>    
             <div class="form-group <?php echo (!empty($stateErr)) ? 'has-error' : ''; ?>">
                <label>STATE</label>
                <input type="text" name="state" class="form-control" value="<?php echo $state; ?>">
                <span class="help-block"><?php echo $stateErr; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($ptypeErr)) ? 'has-error' : ''; ?>">    
            <label>Payment Mode</label>
              <center>
                <select name="ptype" value="<?php echo $ptype; ?>">
                 <option value="">--select--</option>
                 <option value="Online Transaction">Online Transaction</option>
                 <option value="COD">CASH ON DELIVERY</option>
                </select>
               </center> 
                <span class="help-block"><?php echo $ptypeErr; ?></span>
            </div>
            <div class="form-group">
                <label>AMOUNT</label>
                <input type="text" name="amount" class="form-control" value="600" placeholder="600" disabled>
            </div> 
            <div class="form-group">
                <label>IMG-ID</label>
                <input type="text" name="img_id" class="form-control" value="Walking Through the Forest" placeholder="Walking through the Forest" disabled>
            </div> 
            <div class="form-group">
                <input type="submit" onclick="myFunction()" class="btn btn-primary" value="BUY NOW">
            </div>
        </font>
        </form>
    </div>  
          </div>
        </div>
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


</body>
</html>