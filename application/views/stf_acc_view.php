<!DOCTYPE html>
<html lang="en">

<head>
<title> Universiti Malaysia Sabah </title>


<!--meta-->
<meta charset="UTF-8">
<meta name="description" content="University webpage">
<meta name="keywords" content="ums">

<!--Responsive Page-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--UMS Logo Site-->
<link href="<?php echo base_url()?>public/img/umslogo.png" rel="icon">

<!--[if lt IE 9 -->
<!--[<script src="https://oss.maxcdn.com/html5shiv/3.\.2/html5shiv.min.js"> </script>-->
<!--[<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> </script>-->
<!--[endif]-->

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Bree+Serif:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Style Sheet-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/flaticon.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/stf_acc_css.css">



<!-- javascript & JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://localhost/fyproj/public/js/owl.carousel.min.js"></script>
<script src="http://localhost/fyproj/public/js/circle-progress.min.js"></script>
</head>



<body>
<!----------------Header---------------------->
<header class="header-section">

<a href ="<?php base_url()?>add_crs">	
<div class="ums-logo">
	<img src="http://localhost/fyproj/public/img/logo.png" alt="faculty logo" >
</div>
</a>

<div class="logout">
	<a href ="http://localhost/fyproj/login">logout</a>
</div>

<div class="ir-logo">
	<img src="http://localhost/fyproj/public/img/ir-logo.png" alt="IR4.0 logo" >
</div>


</header>



<section class="intro-section">

<div class="col-sm-3">
    <div class="sidemenu">
	<div class="panel">
	<h1>Staff Panel</h1>
	</div>
	<?php foreach($STAFF as $stf){?>
	  <div class="account">
	  <h1><?php echo $stf->StfID?></h1>
	  <h2><?php echo $stf->StfName?></h2>
	  </div>
	  <div class="menu">
	  <h1>MENU</h1>
	  </div>
	  <div class="sidemenu-content">
		<a href="<?php echo base_url()?>SFac_list/index/<?php echo $stf->StfID?>">Faculty</a>
	  </div>
	 <?php }?>
	</div>
</div>
<div class="col-sm-9">
<div class="intro-content">
	<div class="registration">	
		<h3>Account Info</h3>
		<form id="formRegister" action ="<?php echo base_url()?>Update_staff/index/<?php echo $stf->StfID?>" method ="post">
		<?php echo $this->session->flashdata('status'); ?>
		<table>
		<tr><td>Staff ID: </td>
			<td><input type="text" name= "id" placeholder="BI17110000" value="<?php echo $stf->StfID?>" size="50" readonly="readonly"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Password: </td>
			<td><input type="password" name= "password" placeholder="**********" value="<?php echo $stf->StfPwd?>"size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Name: </td>
			<td><input type="text" name= "name" placeholder="Mohd Ali" value="<?php echo $stf->StfName?>" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>IC No: </td>
			<td><input type="text" name= "ic" placeholder="980912142563" value="<?php echo $stf->StfIC?>" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Email: </td>
			<td><input type="text" name= "email" placeholder="ali@ums.edu.my" value="<?php echo $stf->StfEmail?>" size="50"/>
		</td></tr>
			<tr><td><br/></td></tr>
		<tr><td></td>
			<td><button type="submit" class="site-btn">Save</button></td>	
		</tr>
		</table>
		</form>
    </div>
</div>
</div>
</section>



<script>

</script>

</body>
</html>
