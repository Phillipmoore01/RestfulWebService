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
                    <a href="index.php" class="navbar-brand">Show Equipment</a>
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
                        <label for="exampleManufacturer">Manufacturer:</label>
                        <select class="form-control" name="manufacturer">
                            <?php
                                foreach($manufacturers as $key=>$value)
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Serial">Serial Number:</label>
                        <input type="text" class="form-control" id="serialInput" name="serialInput">
                    </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">View Equipment</button>
                   </form>
               </div>
          </div>
     </section>
</body>
</html>
<?php
    if (isset($_POST['submit']))
    {
		$sn= $_POST['serialInput'];
		$did = $_POST['device'];
		$mid = $_POST['manufacturer'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/view_equipment");
		$data=$sn;
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));

		$result=curl_exec($ch);
		curl_close($ch);
		$output=json_decode($result,true);
		if($output[0] != 'Status: ERROR')
			echo"$output[1]";
		else{
			echo'<div class="alert alert-primary" role="alert">View Not Available</div>';
			echo" $output[1] ";
		}
    }
?>