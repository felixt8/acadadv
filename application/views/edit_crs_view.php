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
<link rel="stylesheet" href="http://localhost/fyproj/public/css/add_crs_css.css">



<!-- javascript & JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://localhost/fyproj/public/js/owl.carousel.min.js"></script>
<script src="http://localhost/fyproj/public/js/circle-progress.min.js"></script>

<script>
var clo_num=0; var cp_num=0; var cco_num=0; var key_num=0;
</script>
</head>



<body>
<!----------------Header---------------------->
<header class="header-section">

<a href ="<?php base_url()?>add_prog">	
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
		<h3>Edit Course</h3>
		<?php foreach($COURSE as $crs){?>
		<form id="formRegister" action ="<?php echo base_url()?>edit_crs/update/<?php echo $adm->AdmID ?>/<?php echo $crs->CrsID ?>" method ="post">
		<?php echo $this->session->flashdata('status'); ?>
		<table id="crs-tb">
		<tr><td>Course Code:</td>
			<td><input type="text" name="code" value="<?php echo $crs->CrsID ?>" placeholder="KK31233" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Course Name: </td>
			<td><input type="text" name= "name" value="<?php echo $crs->CrsName ?>" placeholder="Mathematics" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Category: </td>
			<td><div class="ctg-drop" >
				<select name="ctg">
				<?php if($crs->CrsCtg!=''){ ?>
				<option style="display:none" value="<?php echo $crs->CrsCtg?>"><?php echo $crs->CrsCtg?></option>
				<?php }else{ ?>
				<option style="display:none" >Select Category</option>
				<?php } ?>
				<option value="university">University Core</option>
				<option value="faculty">Faculty Core</option>
				<option value="programme">Programme Core</option>
				<option value="elective">Elective</option>
				</select>
				</div>
			</td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Synopsis</td></tr>
		<tr><td colspan="2"><textarea row="2" cols="66" name= "descrp" placeholder="Description"size="70"/><?php echo $crs->CrsSynopsis ?></textarea></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Credit Hours: </td>
			<td><input type="text" name= "credit" value="<?php echo $crs->CrsCredit ?>" placeholder="980912142563" size="50"/>
		</td></tr>
		<tr><td><br/></td></tr>
		<tr><td>Prerequisite(if any): </td>
			<td><input type="text" name= "preque" value="<?php echo $crs->CrsPreq ?>" placeholder="mathematics,science,etc." size="50"/>
		</td></tr>
			<tr><td><br/></td></tr>
		<tr><td colspan="2">Course Learning Outcomes</td></tr>
		<?php $clon=0 ?>
		<?php foreach($CLO as $clo){?>
		<tr><td><input type="text" name="clo[<?php echo $clon ?>]" class="clo" value="<?php echo $clo->CLONum ?>" placeholder="CLO1" size="10"/></td>
			<td><textarea row="2" cols="50" name= "desc[<?php echo $clon ?>]" placeholder="Description"size="70"/><?php echo $clo->CLOContent ?></textarea></td>
			<td class="del"><button type="button" onclick="delCLO(this)" i="button" i class="fa fa-minus"></i></button></td></tr>
		<?php $clon+=1 ?>
		<script>clo_num+=1;</script>
		<?php }?>
		<tr><td colspan="2" class="add"><button type="button" onclick="addCLO()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Mapping of the Course Learning Outcomes to the Programme Learning Outcomes</td></tr>
		<?php $cpn=0 ?>
		<?php foreach($MAPPING as $map){?>
		<tr><td><input type="text" name="cp[<?php echo $cpn ?>]" class="cp" value="<?php echo $map->CLONum?>" placeholder="CLO1" size="10"/></td>
			<td class="del"><input type="text" name="plo[<?php echo $cpn ?>]" value="<?php echo $map->PLONum?>" placeholder="PLO1" size="10"/>
				<input type="text" name="prog[<?php echo $cpn ?>]" class="cp" value="<?php echo $map->PrgID?>" placeholder="Program Code" size="10"/>
				<button type="button" onclick="delCP(this)" i="button" i class="fa fa-minus" style="margin:3px 0 0 5px;"></i></button></td></tr>
		<?php $cpn+=1 ?>
		<script>cp_num+=1;</script>
		<?php }?>
		<tr><td colspan="2" class="add"><button type="button" onclick="addCP()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Course Content Outline</td></tr>
		<?php $ccon=0 ?>
		<?php foreach($CCO as $cco){?>
		<tr><td colspan="2" class="c"><input type="text" class="cco" name="chap[<?php echo $ccon ?>]" value="<?php echo $cco->CContent?>" placeholder="Chapter" size="54"/><input type="text" name="cco[<?php echo $ccon ?>]" value="<?php echo $cco->CLONum?>"placeholder="CLO1" size="10"/></td>
			<td class="del-cco"><button type="button" onclick="delCCO(this)" i="button" i class="fa fa-minus"></i></button></td></tr>
		<?php $ccon+=1 ?>
		<script>cco_num+=1;</script>
		<?php }?>
		<tr><td colspan="2" class="add"><button type="button" onclick="addCCO()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td colspan="2">Keyword</td></tr>
		<?php $keyn=0 ?>
		<?php foreach($KEY as $key){?>
		<tr><td colspan="2"><div class="key-drop" >
				<select name="key[<?php echo $keyn ?>]">
				<option style="display:none" value="<?php echo $key->KeyID?>"><?php echo $key->Keyword?></option>
				<?php foreach($AKW as $kw){?>
				<option value="<?php echo $kw->KeyID?>"><?php echo $kw->Keyword?></option>
				<?php }?>
				</select>
				</div>
			</td>
			<td class="del-cco"><button type="button" onclick="delKey(this)" i="button" i class="fa fa-minus"></i></button></td></tr>
		<?php $keyn+=1 ?>
		<script>key_num+=1;</script>
		
		<?php }?>
		<tr><td colspan="2" class="add"><button type="button" onclick="addKey()" i="button" i class="btn fa fa-plus"></i></button></td></tr>
		<tr><td><br/></td></tr>
		<tr><td></td>
			<td><button type="submit" class="site-btn">Save</button></td>	
		</tr>
		<tr><td><br/></td></tr><tr><td><br/></td></tr>
		</table>
		</form>
		<?php }?>
    </div>
</div>
</div>
</section>




<script>
function addCLO(x) {
  var table = document.getElementById("crs-tb");
  var row = table.insertRow(14+clo_num);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = '<td><input type="text" name="clo['+clo_num+']" placeholder="CLO1" size="10"/></td>';
  cell2.innerHTML = '<td><textarea type="text" row="2" cols="50" name= "desc['+clo_num+']" placeholder="Description" size="70"/></textarea></td>';
  cell3.innerHTML = '<td><button type="button" onclick="delCLO(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell3.className= "del";
  clo_num+=1;
}

function delCLO(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 clo_num-=1;
		 delete clo[r-14-clo_num-1];
		 delete desc[r-14-clo_num-1];
}
	
	
function addCP(x) {
  var table = document.getElementById("crs-tb");
  var row = table.insertRow(14+clo_num+cp_num+3);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = '<td><input type="text" name="cp['+cp_num+']" class="cp" placeholder="CLO1" size="10"/></td>';
  cell2.innerHTML = '<td><input type="text" name="plo['+cp_num+']" placeholder="PLO1" size="10"/><input type="text" name="prog['+cp_num+']" class="cp" placeholder="Program Code" size="10"/><button type="button" onclick="delCP(this)" i="button" i class="fa fa-minus" style="margin:3px 0 0 5px;"></i></button></td>';
  cell2.className= "del";
  cp_num+=1;
}

function delCP(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 cp_num-=1;
		 delete cp[r-14-clo_num-cp_num-3-1];
		 delete plo[r-14-clo_num-cp_num-3-1];
		 delete prog[r-14-clo_num-cp_num-3-1];
}

function addCCO(x) {
  var table = document.getElementById("crs-tb");
  var row = table.insertRow(14+clo_num+cp_num+cco_num+6);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td class="c"><input type="text" name="chap['+cco_num+']" placeholder="Chapters" size="54"/><input type="text" name="cco['+cco_num+']" placeholder="CLO1" size="10"/></td>';
  cell2.innerHTML = '<td><button type="button" onclick="delKey(this)" i="button" i class="fa fa-minus"></i></button></td></td>';
  cell1.colSpan = 2;
  cell2.className="del-cco";
  cco_num+=1;
}

function delCCO(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 cco_num-=1;
		 delete cco[r-14-clo_num-cp_num-cco_num-6-1];
		 delete chap[r-14-clo_num-cp_num-cco_num-6-1];
}

function addKey(x) {
  var table = document.getElementById("crs-tb");
  var row = table.insertRow(14+clo_num+cp_num+cco_num+key_num+9);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = '<td><select name="key['+key_num+']"><option disabled selected value style="display:none">Select Keyword</option><?php foreach($AKW as $kw){?><option value="<?php echo $kw->KeyID?>"><?php echo $kw->Keyword?></option><?php }?></select></div></td> or <input type="text" name="newkey['+key_num+']" placeholder="New Keyword" size="30"/>';
  cell2.innerHTML = '<td><button type="button" onclick="delKey(this)" i="button" i class="btn fa fa-minus"></i></button></td>';
  cell1.colSpan = 2;
  cell1.className="key-drop";
  cell2.className="del-cco";
  key_num+=1;
}

function delKey(row) {
     var r=row.parentNode.parentNode;
         r.parentNode.removeChild(r);
		 key_num-=1;
		 delete key[r-14-clo_num-cp_num-cco_num-key_num-9-1];
		 delete newkey[r-14-clo_num-cp_num-cco_num-key_num-9-1];
		 
}
</script>


</body>
</html>
