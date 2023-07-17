<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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
    <style type="text/css">
          body{ 
            font: 14px sans-serif;
            align-content: center; 
            background-image: url();
            background-repeat: no-repeat;
             background-size:100% 100vh;
            }
            .wrapper{ 
                        width: 350px; 
                        padding: 40px;
                        margin-top: 0px; 
                        margin-left:1000px;
                        text-align:center; 
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

                .one{
                    margin-top: 400px;
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
    <div class="page-header">
    
    <center> <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
   <P>DETAILS REGARDING CART ITEM SHIPPING,APPLICATIONS AND DONATIONS WILL BE AVAILABLE ON YOUR EMAIL<P></center>
    
    </div>

<center>
<?php
// Initialize the session
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$name=$_SESSION['username'];

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $sql = "SELECT name,email,contact,city,state,amount,created_at FROM donation where username = '$name'   ";

                     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {
                    
                            echo '<div class="two">
                            <div class="col-md-4">
                            <div class="cause shadow-sm">
                            <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                            <span class="badge-primary py-1 small px-2 rounded mb-3 d-inline-block">DONATIONS</span>
                            <h6 class="mb-6">';
                           echo  "NAME OF DONATOR:".$row['name']."<br>"."<br>"."EMAIL:".$row['email']."<br>"."<br>"."CONTACT:".$row['contact']."<br>"."<br>"."CITY:".$row['city']."<br>"."<br>"."STATE:".$row['state']."<br>"."<br>"."AMOUNT DONATED:".$row['amount']."<br>"."<br>". "DONATED AT:".$row['created_at']."<br>"."<br>"."<br>";
                           echo'</div>';
                           echo'</div>';
                           echo'</div>';
                    }
                        

?>

<?php
 $sql = " SELECT name,email,contact,education,image,created_at FROM application where username = '$name' ;";

                     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {
                             echo'<div class="three">
                            <div class="col-md-4">
                            <div class="cause shadow-sm">
                            <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                            <span class="badge-danger py-1 small px-2 rounded mb-3 d-inline-block">APPLICATION</span>
                            <h6 class="mb-6">';

                           echo  "NAME OF APPLICIANT:".$row['name']."<br>"."<br>"."EMAIL:".$row['email']."<br>"."<br>"."CONTACT:".$row['contact']."<br>"."<br>"."EDUCATION:".$row['education']."<br>"."<br>"."IMAGE:".$row['image']."<br>"."<br>"."APPLIED AT:".$row['created_at']."<br>"."<br>"."<br>"."<br>"."<br>";
                            echo'</div>';
                           echo'</div>';
                           echo'</div>';


                    }                       

?>

<?php
 $sql = " SELECT name,email,contact,ptype,amount,img_id,buy_date FROM buyers where username = '$name' ;";

                     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {
                             echo'<div class="three">
                            <div class="col-md-4">
                            <div class="cause shadow-sm">
                            <div class="px-3 pt-3 border-top-0 border border shadow-sm">
                            <span class="badge-warning py-1 small px-2 rounded mb-3 d-inline-block">CART</span>
                            <h6 class="mb-6">';
                           echo  "NAME OF BUYER:".$row['name']."<br>"."<br>"."EMAIL:".$row['email']."<br>"."<br>"."CONTACT:".$row['contact']."<br>"."<br>"."Payment Type:".$row['ptype']."<br>"."<br>"."AMOUNT:".$row['amount']."<br>"."<br>"."IMAGE BUYIED:".$row['img_id']."<br>"."<br>"."BUYIED AT:".$row['buy_date']."<br>"."<br>"."<br>";;
                            echo'</div>';
                           echo'</div>';
                           echo'</div>';

                    }                       

?>

 </center>


    <div class="one">
    <p>
        <center>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </center>
    </p>
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