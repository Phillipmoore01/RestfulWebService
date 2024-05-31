<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Advanced Software Engineering</title>
<link href="../assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../assets/css/templatemo-style.css">
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
                    <a href="#" class="navbar-brand">Add New Equipment</a>
               </div>
               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li><a href="search.php" class="smoothScroll">Search Equipment</a></li>
                         <li><a href="add.php" class="smoothScroll">Add Equipment</a></li>
                         <li><a href="modify.php" class="smoothScroll">Modify Equipment</a></li>
                         <li><a href="view.php" class="smoothScroll">View Equipment</a></li>
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
                        include("../functions.php");
                        $dblink=db_connect("Devices");
				   		$sql="Select `DeviceN`,`ID` from `Dev_name` where `status`='active'";
                        $result=$dblink->query($sql) or
                            die("<p>Something went wrong with $sql<br>".$dblink->error);
                        $devices=array();
                        $manufacturers=array();
                        while ($data=$result->fetch_array(MYSQLI_ASSOC))
                            $devices[$data['ID']]=$data['DeviceN'];
                        $sql="Select `Manufact`,`ID` from `Manu_name` where `status`='active'";
                        $result=$dblink->query($sql) or
                            die("<p>Something went wrong with $sql<br>".$dblink->error);
                        while ($data=$result->fetch_array(MYSQLI_ASSOC))
                            $manufacturers[$data['ID']]=$data['Manufact'];
                        if (isset($_REQUEST['msg']) && $_REQUEST['msg']=="DeviceExists")
                        {
                            echo '<div class="alert alert-danger" role="alert">Serial Number already exists in database!</div>';

                        }
				                 
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
                        <label for="exampleSerial">Serial Number:</label>
                        <input type="text" class="form-control" id="serialInput" name="serialnumber">
                    </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Search Equipment</button>
                   </form>
               </div>
          </div>
     </section>
</body>
</html>
<?php
    if (isset($_POST['submit']))
    {
        $device=$_POST['device'];
        $manufacturer=$_POST['manufacturer'];
        $serialNumber=trim($_POST['serialnumber']);
        $sql="Select `auto_id` from `serials` where `serial_number`='$serialNumber'";
        $rst=$dblink->query($sql) or
             die("<p>Something went wrong with $sql<br>".$dblink->error);
        if ($rst->num_rows<=0)//sn not previously found
        {
            $sql="SELECT * FROM `Tech` WHERE `serial_number`='$serialNumber'";
            $result=$dblink->query($sql) or die("<p>Something went wrong with $sql<br>".$dblink->error);
            redirect("index.php?msg=$result");
        }
        else
            redirect("add.php?msg=could not find device");
    }
?>