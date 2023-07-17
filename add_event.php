<?php
include ('config.php');
  


// Define variables and initialize with empty values
$name = $description = $date = $images="";
$nameErr = $descriptionErr = $dateErr = $imageErr="";
       

 if($_SERVER["REQUEST_METHOD"] == "POST"){

             $images= $_POST['images'];
             $date=$_POST['date'];
             $description=$_POST['description'];

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

                    
                    if (empty($_POST["date"])) {  
                            $dateErr = "Date is required"; 
                    } 
                       

                    if (empty($_POST["description"])) {  
                            $descriptionErr = "Description is required"; 
                    } 
                       

                // Check input errors before inserting in database
                if(empty($nameErr) && empty($dateErr) && empty($imagesErr) && empty($descriptionErr)){
                    
                    // Prepare an insert statement
                    $sql = "INSERT INTO event (name,description,ddate,image) VALUES ('$name','$description','$date','$images')";
                        if($stmt = mysqli_prepare($link, $sql)){
                        if(mysqli_stmt_execute($stmt)){
                            echo "<script type='text/javascript'> alert('Added Successfully'); 
                                 document.location = 'add_event.php'; </script>";
                            }

                        } else{
                            echo "<script type='text/javascript'> alert('Something Went Wrong'); 
                                 document.location = 'add_event.php'; </script>";
                        }
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                    // Close connection
                mysqli_close($link);
                
            

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
<html>
<title> ADD EVENTS</title>
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
.wrapper{ 
          width: 450px; 
          padding: 40px;
          margin-top: 0px; 
          margin-left:35px;
          text-align:center; }



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
                  <h1 class="text-black mb-3"><font size="5"><i>ADD EVENTS</i></font></h1>
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
          <center>
      <div class="wrapper">
       <font color="black"> <h4>ADD NEW EVENT</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multi/form-data">

            <div class="form-group  <?php echo (!empty($nameErr)) ? 'has-error' : ''; ?>">
                <label>NAME OF AN EVENT</label>
                <input type="text" name="name" class="form-control" value="<?php echo"$name"?>" >
                <span class="help-block"><?php echo $nameErr; ?></span>
            </div>   
            <div class="form-group  <?php echo (!empty($descriptionErr)) ? 'has-error' : ''; ?>">
                <label>Description</label>
                <textarea name="description" class="form-control" value="<?php echo $description; ?>" cols="15" rows="5"></textarea>
                <span class="help-block"><?php echo $descriptionErr; ?></span>
            </div>   
             <div class="form-group <?php echo (!empty($dateErr)) ? 'has-error' : ''; ?> ">
                <label>DATE</label>
                <center>
                <input type="date" id="event" name="date" value="<?php echo $date; ?>">
                <span class="help-block"><?php echo $dateErr; ?></span>
              </center>

            </div>    
             
            <div class="form-group <?php echo (!empty($imageErr)) ? 'has-error' : ''; ?>">    
            <label>COVER IMAGE FOR EVENT :</label>
            <center>
                <input type="file" name="images" value="<?php echo $images; ?>">
                <span class="help-block"><?php echo $imageErr; ?></span>
              </center>
            </div>
            <div class="form-group">
                <input type="submit" onclick="myFunction()" class="btn btn-primary" value="ADD NOW">
            </div>
        </font>
        </form>
    </div>  
    <br><br>
          </center>            

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