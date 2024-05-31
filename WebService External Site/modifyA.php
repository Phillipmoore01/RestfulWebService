<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Advanced Software Engineering</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/templatemo-style.css">
</head>
<body>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
						 <span class="icon icon-bar"></span>
						 <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.php" class="navbar-brand">Modify Devices</a>
               </div>
               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="search.php" class="smoothScroll">Search Equipment</a></li>
                         <li><a href="add.php" class="smoothScroll">Add Equipment</a></li>
						 <li><a href="modify.php" class="smoothScroll">Modify Equipment</a></li>
						 <li><a href= "view.php" class="smoothScroll">View Equipment</a></li>
                    </ul>
               </div>
          </div>
     </section>
 <!-- HOME -->
     <section id="home">
          </div>
     </section>
     <!-- FEATURE -->
     <section id="feature">
          <div class="container">
               <div class="row">
                   
                   <?php 
                    include("functions.php");
				   	$devices = check_Dev();
				   	$manufacturers = check_Man();
				    $avail = check_Avail();
                   
                   ?>
                    <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleDevice">Device:</label>
                        <select class="form-control" name="device">
                            <?php
                                foreach($devices as $key=>$value)
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                            ?>
                        </select>
                    </div>
					<div class="form-group">
					  <label for="exampleSerial">New Device Name:</label>
					  <input type="text" class="form-control" id = "devInput" name="devInput">
				  </div>
					<div class="form-group">
                        <label for="exampleDevice">Status:</label>
                        <select class="form-control" name="status">
                            <?php
                                foreach($avail as $key=>$value)
                                		echo '<option value="'.$key.'">'.$value.'</option>';
                            ?>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary" name="button1" value="button1">Modify all Device Name</button>
						<button type="submit" class="btn btn-primary" name="button2" value="button2">Change Device all availability</button>
                   </form>
               </div>
          </div>
     </section>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (isset($_POST['button1'])){
		$did = $_POST['device'];
		$ndid = $_POST['devInput'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_AllDev");
		$data="$did,$ndid";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));
		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">All device types modified!</div>';
		else{
			echo'<div class="alert alert-primary" role="alert">All device types not modified </div>';
			echo" $output[1] ";
		}
	}

	elseif (isset($_POST['button2'])){
		$did = $_POST['device'];
		$act = $_POST['status'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_devAvail");
		$data="$did,$act";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));
		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">All device availability modified!</div>';
		else{
			echo'<div class="alert alert-primary" role="alert">All device availability modified </div>';
			echo" $output[1] ";
		}
	}
}
?>