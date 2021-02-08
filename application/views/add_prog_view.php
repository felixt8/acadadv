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
<link rel="stylesheet" href="http://localhost/fyproj/public/css/add_prog_css.css">



<!-- javascript & JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://localhost/fyproj/public/js/owl.carousel.min.js"></script>
<script src="http://localhost/fyproj/public/js/circle-progress.min.js"></script>

<script>
var obj_num=0; 
var plo_num=0;
var uni_num=0; var fac_num=0; var prg_num=0; var ele_num=0;
</script>
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
		<h3>Add Programme</h3>
		<?php foreach($FACULTY as $fac){?>
		<form id="formRegister" action ="<?php echo base_url()?>/add_prog/addPrg/<?php echo $adm->AdmID ?>/<?php echo $fac->FacID?>" method ="post" enctype='multipart/form-data'>
		<?php echo $this->session->flashdata('status'); ?>
		<table id="prog-tb">
		
		<tr><td>Programme Code: </td>
			<td><input type="text" name= "code" placeholder="HC00" size="10"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Programme Name: </td>
			<td><input type="text" name= "name" placeholder="Computer Science" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Picture: </td>
			<td><input type='file' name='pic' size='20' />
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Programme Description</td></tr>
		<tr><td colspan="2"><textarea row="2" cols="66" name= "desc" placeholder="Description"size="70"/></textarea></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Career Prospect: </td>
			<td><input type="text" name= "career" placeholder="Software Developer" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Programme Objectives</td></tr>
		<?php $objn=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addObj()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Programme Learning Outcomes</td></tr>
		<?php $plon=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addPLO()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Duration (years): </td>
			<td><input type="text" name= "duration" placeholder="4" size="5"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>University Core</td><td style="float:right; padding-right:30px;">Semester</td></tr>
		<?php $unin=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addUni()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Faculty Core</td><td style="float:right; padding-right:30px;">Semester</td></tr>
		<?php $facn=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addFac()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Programme Core</td><td style="float:right; padding-right:30px;">Semester</td></tr>
		<?php $prgn=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addPrg()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Elective</td><td style="float:right; padding-right:30px;">Semester</td></tr>
		<?php $elen=0 ?>
		
		<tr><td colspan="2" class="add"><button type="button" onclick="addEle()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td></td>
			<td><button type="submit" class="site-btn">Save</button></td>	
		</tr>

		</table>
		</form>
		<?php } ?>
    </div>
</div>
</div>
</section>



<script>
function addObj(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(obj_num+12);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td colspan="2" class="c"><input type="text" name="obj['+obj_num+']" placeholder="Objective" size="66"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delObj(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell2.className="del-cco";
  obj_num+=1;
}

function delObj(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 obj_num-=1;
		 delete obj[r-obj_num-12-1]; 
}

function addPLO(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(plo_num+obj_num+15);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = '<td><input type="text" name="plo['+plo_num+']" placeholder="PLO1" size="10"/></td>';
  cell2.innerHTML = '<td><textarea row="2" cols="50" name= "descrp['+plo_num+']" placeholder="Description"size="70"/></textarea></td>';
  cell3.innerHTML = '<td><button type="button" onclick="delPLO(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell3.className= "del";
  plo_num+=1;
}

function delPLO(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 plo_num-=1;
		 delete plo[r-plo_num-obj_num-15-1]; 
		 delete descrp[r-plo_num-obj_num-15-1]; 
}

function addUni(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(uni_num+plo_num+obj_num+20);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td><select name="uni['+uni_num+']"><option disabled selected value style="display:none">Select Course</option><?php foreach($AUNI as $uni){?><option value="<?php echo $uni->CrsID?>"><?php echo $uni->CrsName?></option><?php }?></select></td><input type="text" name="usem['+uni_num+']" placeholder="1" size="7"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delUni(this)" i="button" i class="fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell1.className="ctg-drop";
  cell2.className="del-cco";
  uni_num+=1;
}

function delUni(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 uni_num-=1;
		 delete uni[r-uni_num-plo_num-obj_num-20-1];
		 delete usem[r-uni_num-plo_num-obj_num-20-1]; 
}

function addFac(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(fac_num+uni_num+plo_num+obj_num+23);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td><select name="fac['+fac_num+']"><option disabled selected value style="display:none">Select Course</option><?php foreach($AFAC as $fac){?><option value="<?php echo $fac->CrsID?>"><?php echo $fac->CrsName?></option><?php }?></select></td><input type="text" name="fsem['+fac_num+']" placeholder="1" size="7"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delFac(this)" i="button" i class="fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell1.className="ctg-drop";
  cell2.className="del-cco";
  fac_num+=1;
}

function delFac(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 fac_num-=1;
		 delete fac[r-fac_num-uni_num-plo_num-obj_num-23-1];
		 delete fsem[r-fac_num-uni_num-plo_num-obj_num-23-1];
}

function addPrg(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(prg_num+fac_num+uni_num+plo_num+obj_num+26);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td><select name="prg['+prg_num+']"><option disabled selected value style="display:none">Select Course</option><?php foreach($APRG as $prg){?><option value="<?php echo $prg->CrsID?>"><?php echo $prg->CrsName?></option><?php }?></select></td><input type="text" name="psem['+prg_num+']" placeholder="1" size="7"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delPrg(this)" i="button" i class="fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell1.className="ctg-drop";
  cell2.className="del-cco";
  prg_num+=1;
}

function delPrg(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 prg_num-=1;
		 delete prg[r-prg_num-fac_num-uni_num-plo_num-obj_num-26-1];
		 delete psem[r-prg_num-fac_num-uni_num-plo_num-obj_num-26-1];
}

function addEle(x) {
  var table = document.getElementById("prog-tb");
  var row = table.insertRow(ele_num+prg_num+fac_num+uni_num+plo_num+obj_num+29);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td><select name="ele['+ele_num+']"><option disabled selected value style="display:none">Select Course</option><?php foreach($AELE as $ele){?><option value="<?php echo $ele->CrsID?>"><?php echo $ele->CrsName?></option><?php }?></select></td><input type="text" name="esem['+ele_num+']" placeholder="1" size="7"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delEle(this)" i="button" i class="fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell1.className="ctg-drop";
  cell2.className="del-cco";
  ele_num+=1;
}

function delEle(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 ele_num-=1;
		 delete ele[r-ele_num-prg_num-fac_num-uni_num-plo_num-obj_num-29-1];
		 delete esem[r-ele_num-prg_num-fac_num-uni_num-plo_num-obj_num-29-1];
}

</script>

</body>
</html>
