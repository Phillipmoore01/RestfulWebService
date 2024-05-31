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
                    <a href="index.php" class="navbar-brand">Change Equipment</a>
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
			  <div class = "row">
			  
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
					  <label for="exampleSerial">New Device Type:</label>
					  <input type="text" class="form-control" id = "devInput" name="devInput">
				  </div>
				  <div class="form-group">
					  <label for="exampleDevice">Old Manufacturer:</label>
					  <select class="form-control" name="manufacturer">
						  
                       <?php
                           foreach($manufacturers as $key=>$value)
                             echo '<option value="'.$key.'">'.$value.'</option>';
                        ?>
						  
					  </select>
				  </div>
				  <div class="form-group">
					  <label for="exampleSerial">New Manufacturer:</label>
					  <input type="text" class="form-control" id = "manInput" name="manInput">
				  </div>
				  <div class="form-group">
					  <label for="exampleSerial">Old Serial Number:</label>
					  <input type="text" class="form-control" id = "serialInput" name="serialInput">
				  </div>
				  <div class="form-group">
					  <label for="exampleSerial">New Serial Number:</label>
					  <input type="text" class="form-control" id = "nserialInput" name="nserialInput">
				  </div>
				  <button type="submit" class="btn btn-primary" name="button1" value="button1"> Modify Serial Number</button>
				  <button type="submit" class="btn btn-primary" name="button2" value="button2"> Modify Device Type</button>
				  <button type="submit" class="btn btn-primary" name="button3" value="button3"> Modify Manufacturer type</button>
				  <button type="submit" class="btn btn-primary" name="button4" value="button4"> Modify Equipment</button>
				  
				  <div>
				  <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">
                              <h3>Modify Devices</h3>
                              <p>Click here to modify all Devices.</p>
                              <a href="modifyA.php" class="btn btn-default smoothScroll">Modify Devices</a>
                         </div>
                    </div>
				  <div class="col-md-4 col-sm-4">
                         <div class="feature-thumb">
                              <h3>Modify Manufacturers</h3>
                              <p>Click here to modify all Manfucaturers.</p>
                              <a href="modifyB.php" class="btn btn-default smoothScroll">Modify Manufacturer</a>
                         </div>
                   </div>
					</div>
			  </form>
			  </div>
          </div>
     </section>
</body>
</html>
<!-- Comments for future me, make an alert that reurns the $result
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (isset($_POST['button1']))
    {
		$sn= $_POST['serialInput'];
		$nsn = $_POST['nserialInput'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_serial");
		$data="$sn,$nsn";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));

		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">Serial number modified!</div>';
			else{
				echo'<div class="alert alert-primary" role="alert">Serial number not modified </div>';
				echo" $output[1] ";
			}
    }

	elseif (isset($_POST['button2']))
	{
		$did= $_POST['device'];
		$ndid = $_POST['devInput'];
		$sn= $_POST['serialInput'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_DevType");
		$data="$did,$ndid,$sn";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));

		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">Modified Device type!</div>';
			else{
				echo'<div class="alert alert-primary" role="alert">Device type not modified</div>';
				echo" $output[1] ";
			}
	}

	elseif (isset($_POST['button3']))
	{
		$mid= $_POST['manufacturer'];
		$nmid = $_POST['manInput'];
		$sn= $_POST['serialInput'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_manufacturer");
		$data="$did,$nmid,$sn";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));

		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">Modified manufacturer!</div>';
			else{
				echo'<div class="alert alert-primary" role="alert">Manufacturer not modified</div>';
				echo" $output[1] ";
			}
	}

	elseif (isset($_POST['button4']))
	{
		$sn= $_POST['serialInput'];
		$nsn = $_POST['nserialInput'];
		$mid= $_POST['manufacturer'];
		$nmid = $_POST['manInput'];
		$did= $_POST['device'];
		$ndid = $_POST['devInput'];
		$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/modify_equipment");
		$data="$did,$ndid,$mid,$nmid,$sn,$nsn";
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
		curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));

		$result=curl_exec($ch);
		curl_close($ch);
		if($output[0] != 'Status: ERROR')
				echo'<div class="alert alert-primary" role="alert">Equipment moddified!</div>';
			else{
				echo'<div class="alert alert-primary" role="alert">Equipment not modified</div>';
				echo" $output[1] ";
			}
	}
}
?>