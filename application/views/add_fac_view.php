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
<link rel="stylesheet" href="http://localhost/fyproj/public/css/add_fac_css.css">



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

<a href ="<?php base_url()?>login">	
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
	<h1>Admin Panel</h1>
	</div>
	<?php foreach($ADMIN as $adm){?>
	  <div class="account">
	  <h1><?php echo $adm->AdmID ?></h1>
	  <h2><?php echo $adm->AdmName ?></h2>
	  </div>
	  <div class="menu">
	  <h1>MENU</h1>
	  </div>
	  <div class="sidemenu-content">
		<a href="<?php echo base_url()?>fac_list/index/<?php echo $adm->AdmID ?>">Faculty</a>
		<a href="<?php echo base_url()?>adm_acc/index/<?php echo $adm->AdmID ?>">Account</a>
		<a href="<?php echo base_url()?>Staff_reg/index/<?php echo $adm->AdmID ?>">Staff Registration</a>
		<a href="<?php echo base_url()?>Stf_list/index/<?php echo $adm->AdmID ?>">Staff List</a>
	  </div>
	  <?php }?>
	</div>
</div>
<div class="col-sm-9">
<div class="intro-content">
	<div class="registration">	
		<h3>Add Faculty</h3>
		<form id="formRegister" action ="<?php echo base_url()?>add_fac/add_fc/<?php echo $adm->AdmID ?>" method ="post" enctype='multipart/form-data'>
		<?php echo $this->session->flashdata('status'); ?>
		<table id="prog-tb">
		<tr><td>Faculty: </td>
			<td><input type="text" name= "name" placeholder="faculty" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Picture: </td>
			<td><input type='file' name='facPic' size='20' />
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Faculty Website: </td>
			<td><input type="text" name= "link" placeholder="https:..." size="50"/>
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
var obj_num=0;
var plo_num=0;

function addObj(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(obj_num+11);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td colspan="2" class="c"><input type="text" name="chap" placeholder="Chapter" size="66"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delObj(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell2.className="del-cco";
  obj_num+=1;
}

function delObj(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 obj_num-=1;
}

function addPLO(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(plo_num+obj_num+15);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = '<td><input type="text" name="plo" placeholder="PLO1" size="10"/></td>';
  cell2.innerHTML = '<td><textarea row="2" cols="50" name= "descrp" placeholder="Description"size="70"/></textarea></td>';
  cell3.innerHTML = '<td><button type="button" onclick="delPLO(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell3.className= "del";
  plo_num+=1;
}

function delPLO(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 plo_num-=1;
}
</script>

</body>
</html>
