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
<link rel="stylesheet" href="http://localhost/fyproj/public/css/prg_pg_css.css">
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
	<h1><a href ="<?php echo base_url() ?>">Home</a> > <a href ="<?php echo base_url()?>fac_pg/index/<?php echo $fac->FacID?>">Faculty</a> > Programme</h1>
	</div>
	<div class="fac-title">
	<h1><?php echo $fac->FacName?></h1>
	<a href="<?php echo $fac->FacLink?>">>>Faculty Website</a>
	</div>
	<?php }?> 
	
	<div class="prg-sec">
	<?php foreach($PROGRAMME as $prg){?>
	<h2><?php echo $prg->PrgID?> <?php echo $prg->PrgName?></h2>
	<div class="prg-content">
	<table>
		<tr><td><h3>Programme Description</h3></td></tr>
		<tr><td><p><?php echo $prg->PrgDesc?></p></td></tr>
		<tr><td><br/></td></tr>
		<tr><td><h3>Career Prospect</h3></td></tr>
		<tr><td><p><?php echo $prg->PrgProspect?></p></td></tr>
		<tr><td><br/></td></tr>
		<tr><td><h3>Programme Objectives</h3></td></tr>
		<tr><td><ul>
		<?php foreach($PRGOBJ as $obj){?>
		<li><?php echo $obj->ObjDesc?></li>
		<?php }?></ul></td></tr>
		<tr><td><br/></td></tr>
		<tr><td><h3>Programme Learning Outcomes</h3></td></tr>
		<tr><td><ul>
		<?php foreach($PLO as $plo){?>
		<li><?php echo $plo->PLODesc?></li>
		<?php }?></ul></td></tr>
		<tr><td><br/></td></tr>
	</table>
	</div>
	
	<div class="crs-content">
	<table>
		<tr><td><br/></td><td colspan="2">Year 1</td><td colspan="2">Year 2</td><td colspan="2">Year 3</td><td colspan="2">Year 4</td></tr>
		<!----------------------------University------------------------------>
		<tr><td>University Core Course</td>
		<td>
		<?php foreach($SEM1U as $sem1U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1U->CrsID?>
		<?php echo $sem1U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2U as $sem2U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2U->CrsID?>
		<?php echo $sem2U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3U as $sem3U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3U->CrsID?>
		<?php echo $sem3U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4U as $sem4U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4U->CrsID?>
		<?php echo $sem4U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5U as $sem5U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5U->CrsID?>
		<?php echo $sem5U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6U as $sem6U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6U->CrsID?>
		<?php echo $sem6U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7U as $sem7U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7U->CrsID?>
		<?php echo $sem7U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8U as $sem8U){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8U->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8U->CrsID?>
		<?php echo $sem8U->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
		<!----------------------------Language------------------------------>
		<tr><td>Language</td>
		<td>
		<?php foreach($SEM1L as $sem1L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1U->CrsID?>
		<?php echo $sem1U->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2L as $sem2L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2L->CrsID?>
		<?php echo $sem2L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3L as $sem3L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3L->CrsID?>
		<?php echo $sem3L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4L as $sem4L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4L->CrsID?>
		<?php echo $sem4L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5L as $sem5L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5L->CrsID?>
		<?php echo $sem5L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6L as $sem6L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6L->CrsID?>
		<?php echo $sem6L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7L as $sem7L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7L->CrsID?>
		<?php echo $sem7L->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8L as $sem8L){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8L->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8L->CrsID?>
		<?php echo $sem8L->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
		<!----------------------------Co-Curr------------------------------>
		<tr><td>Co-Curriculum</td>
			<td>
		<?php foreach($SEM1C as $sem1C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1C->CrsID?>
		<?php echo $sem1C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2C as $sem2C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2C->CrsID?>
		<?php echo $sem2C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3C as $sem3C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3C->CrsID?>
		<?php echo $sem3C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4C as $sem4C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4C->CrsID?>
		<?php echo $sem4C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5C as $sem5C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5C->CrsID?>
		<?php echo $sem5C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6C as $sem6C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6C->CrsID?>
		<?php echo $sem6C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7C as $sem7C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7C->CrsID?>
		<?php echo $sem7C->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8C as $sem8C){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8C->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8C->CrsID?>
		<?php echo $sem8C->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
		<!----------------------------Faculty------------------------------>
		<tr><td>Faculty Core</td>
			<td>
		<?php foreach($SEM1F as $sem1F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1F->CrsID?>
		<?php echo $sem1F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2F as $sem2F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2F->CrsID?>
		<?php echo $sem2F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3F as $sem3F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3F->CrsID?>
		<?php echo $sem3F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4F as $sem4F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4F->CrsID?>
		<?php echo $sem4F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5F as $sem5F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5F->CrsID?>
		<?php echo $sem5F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6F as $sem6F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6F->CrsID?>
		<?php echo $sem6F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7F as $sem7F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7F->CrsID?>
		<?php echo $sem7F->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8F as $sem8F){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8F->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8F->CrsID?>
		<?php echo $sem8F->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
		<!----------------------------Programme------------------------------>
		<tr><td>Programme Core</td>
		<td>
		<?php foreach($SEM1P as $sem1P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1->CrsID?>
		<?php echo $sem1->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2P as $sem2P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2P->CrsID?>
		<?php echo $sem2P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3P as $sem3P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3P->CrsID?>
		<?php echo $sem3P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4P as $sem4P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4P->CrsID?>
		<?php echo $sem4P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5P as $sem5P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5P->CrsID?>
		<?php echo $sem5P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6P as $sem6P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6P->CrsID?>
		<?php echo $sem6P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7P as $sem7P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7P->CrsID?>
		<?php echo $sem7P->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8P as $sem8P){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8P->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8P->CrsID?>
		<?php echo $sem8P->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		<!----------------------------Industry------------------------------>
		<tr><td>Industrial Training</td>
		<td>
		<?php foreach($SEM1I as $sem1I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1I->CrsID?>
		<?php echo $sem1I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2I as $sem2I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2I->CrsID?>
		<?php echo $sem2I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3I as $sem3I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3I->CrsID?>
		<?php echo $sem3I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4I as $sem4I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4I->CrsID?>
		<?php echo $sem4I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5I as $sem5I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5I->CrsID?>
		<?php echo $sem5I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6I as $sem6I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6I->CrsID?>
		<?php echo $sem6I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7I as $sem7I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7I->CrsID?>
		<?php echo $sem7I->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8I as $sem8I){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8I->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8I->CrsID?>
		<?php echo $sem8I->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
		<!----------------------------Elective------------------------------>
		<tr><td>Elective</td>
			<td>
		<?php foreach($SEM1E as $sem1E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem1E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem1E->CrsID?>
		<?php echo $sem1E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM2E as $sem2E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem2E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem2E->CrsID?>
		<?php echo $sem2E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM3E as $sem3E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem3E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem3E->CrsID?>
		<?php echo $sem3E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM4E as $sem4E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem4E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem4E->CrsID?>
		<?php echo $sem4E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM5E as $sem5E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem5E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem5E->CrsID?>
		<?php echo $sem5E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM6E as $sem6E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem6E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem6E->CrsID?>
		<?php echo $sem6E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM7E as $sem7E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem7E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem7E->CrsID?>
		<?php echo $sem7E->CrsName?>
		</a>
		<?php }?>
		</td><td>
		<?php foreach($SEM8E as $sem8E){?>
		<a style="display:block;margin-bottom:20px;" href ='<?php echo base_url()?>crs_pg/index/<?php echo $sem8E->CrsID?>/<?php echo $prg->PrgID?>'>
		<?php echo $sem8E->CrsID?>
		<?php echo $sem8E->CrsName?>
		</a>
		<?php }?>
		</td></tr>
		
	</table>
	</div>
	
	
	
    <?php }?>  
	</div>
	
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
