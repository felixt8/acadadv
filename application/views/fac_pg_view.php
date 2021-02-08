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
<link href="http://localhost/fyproj/public/img/umslogo.png" rel="icon">

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
<link rel="stylesheet" href="http://localhost/fyproj/public/css/fac_pg_css.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/chat.css">



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

<a href ="<?php echo base_url() ?>">	
<div class="ums-logo">
	<img src="http://localhost/fyproj/public/img/logo.png" alt="faculty logo" >
</div>
</a>

<div class="ir-logo">
	<img src="http://localhost/fyproj/public/img/ir-logo.png" alt="IR4.0 logo" >
</div>

</header>


 
<section class="intro-section set-bg">

<div class="intro-content">	
	<!-- Content -->
	<?php foreach($FACULTY as $fac){?>
	<div class="nav">
	<h1><a href ="<?php echo base_url() ?>">Home</a> > Faculty</h1>
	</div>
	<div class="fac-title">
	<h1><?php echo $fac->FacName?></h1>
	<a href="<?php echo $fac->FacLink?>">>>Faculty Website</a>
	</div>
	<?php }?> 
</div>

	<div class="prg-sec">
	<?php foreach($PROGRAMME as $prg){?>
	<a href ='<?php echo base_url()?>prg_pg/index/<?php echo $fac->FacID?>/<?php echo $prg->PrgID ?>'>
	<div class="prg-slot">
	<?php
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $prg->PrgPic ).'" height="200" width="200" />';
	?>
	<h3><?=$prg->PrgID;?> <?=$prg->PrgName;?></h3>
	</div>
	</a>
    <?php }?>  
	</div>
	
	

</section>

<section class="spadBtm">
	<div class="container">
		<div class="row">
			
			<!--ums logo-->
			<div class="col-lg-2">
				<div class="ums-logo">
					<img src="http://localhost/fyproj/public/img/umslogo.png" alt="university logo" style="width:120px;height:120px;">						
				</div>
			<div class="eco-campus" style="margin-top:20px;">
					<img src="http://localhost/fyproj/public/img/eco-campus-logo.png" alt="eco campus logo" style="width:170px; height: 100px;">
				</div>
			</div>
			
			
			<!--socialmedia-->
			<div class="col-lg-4">
				<div class="contact">
					<h2> Follow Us </h2>
						<ul>
							<li><a href="https://twitter.com/UMS_EcoCampus" i class="fa fa-twitter" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.facebook.com/FCI.UMS/" i class="fa fa-facebook" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.linkedin.com/school/umsofficial/" i class="fa fa-linkedin" style="color:#fff;"></i><span class="label"></a></li>
							<li><a href="https://www.youtube.com/channel/UCkriQ1ronfQofaoVH1qYk8A" i class="fa fa-youtube" style="color:#fff;"></i><span class="label"></a></li>
						</ul>
						
				</div>
			</div>
			
			<!--second -->
			<div class="col-lg-3">
				<div class="umskk">
					<h5 class="heading"><u>UMS-KK</u></h5>	
					<p> Faculty Of Computing and Informatics</p>
					<p>University Malaysia Sabah</p>
					<p>Jalan UMS,</p>
					<p>8400 Kota Kinabalu,Sabah, Malaysia</p>
					<p></p>
					<p>Tel : (+6088) 320000  Ext.: 613708 / 613710</p>
					<p>Fax : (+6088) 320390</p>
					<p>Email: pejfki@ums.edu.my</p>
				</div>
			</div>
			
	
			<!--third-->
			<div class="col-lg-3">
				<div class="umskal">
					<h5 class="heading"><u>UMS-KAL</u></h5>	
					<p> Faculty Of Computing and Informatics</p>
					<p>University Malaysia Sabah</p>
					<p>Labuan International Campus,</p>
					<p>Jalan Sungai Pagar,</p>
					<p>87000 Labuan F.T., Malaysia</p>
					<p></p>
					<p>Tel: (+6087) 460445</p>
					<p>Fax: (+6087) 465155</p>
					<p>Email: pejfki@ums.edu.my</p>
				</div>
			</div>
		</div>
	</div>
		
</section>

</body>
</html>
