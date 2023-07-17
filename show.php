<?php
$conn = mysqli_connect('localhost', 'root', '','website');

if(!$conn){
  echo 'Connection error:'  . mysqli_connect_error();
}

$sql= 'SELECT * FROM propety  ';
$result = mysqli_query($conn,$sql);

$propety=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
#print_r($propety);
?>
<!DOCTYPE html> 
<html lang="en">

<head>
  <title>VIEW</title>
    <link rel="stylesheet" type="text/css" href="aboutus.css">
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
    <link rel="stylesheet"  href="website.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style >
    .card img{
      height: 40vh;
      width: 100%;
      background-position: center;

    }

  </style>

  </head>
  <body>
          <header class="head">
    <div class="logo"><img src="logo.png"></div>
     <nav class="toplinks">
            <a href="website.php" class="nlinks">Home</a>
            <a href="show.php" class="nlinks">Projects</a>
            <a href="#" class="nlinks">Agent</a>
            <a href="#" class="nlinks">Loans</a>
          <a href="#" class="nlinks">About us</a>
            <a href="prop.php" class="nlinks">Add Property</a>
        </nav>
        <div class="add"></div>
        <div class="icons">
           <a href="login.html"><i class='fas fa-user' style='font-size:30px'></i></a>
        </div>
        
        </header>
            <div class="card mb-3" style="max-width: 1200px; margin-left: 200px;">
              <?php foreach ($propety as $propety){ ?>
  <div class="row no-gutters">
    <div class="col-md-4">
      <div class="card"><img src="<?php echo htmlspecialchars($propety['images']) ?>" class="card-img" alt="..."></div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title"><?php echo htmlspecialchars($propety['name'] );?></h3>
        <p class="card-text">Address : <?php echo htmlspecialchars($propety['address'] );?></p>
        <p class="card-text">Area (Sq.ft) : <?php echo htmlspecialchars($propety['floor'] );?></p>
        <p class="card-text">Locality : <?php echo htmlspecialchars($propety['bhk'] );?></p>
        <p class="card-text">Type : <?php echo htmlspecialchars($propety['type'] );?></p>
        <p class="card-text">Status : <?php echo htmlspecialchars($propety['status'] );?></p>
       <p class="card-text">Sq.ft : <?php echo htmlspecialchars($propety['floor'] );?></p>

      </div>
    </div>
  </div>
    <hr border="20px"color='black'>
    <hr>
<?php } ?>
</div>
         

</body>
</html>

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
          



            