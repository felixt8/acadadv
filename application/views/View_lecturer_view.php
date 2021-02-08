<!DOCTYPE html>
<html lang="en">

<head>
<title> Faculty Computer and Informatics </title>

<!--meta-->
<meta charset="UTF-8">
<meta name="description" content="University faculty webpage">
<meta name="keywords" content="ums, fki, fci">

<!--Responsive Page-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--UMS Logo Site-->
<link href="<?= base_url()?>public/img/umslogo.png" rel="icon">


<!--[if lt IE 9 -->
<script src="https://oss.maxcdn.com/html5shiv/3.\.2/html5shiv.min.js"> </script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<!--[endif]-->

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Bree+Serif:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Style Sheet-->
<link rel="stylesheet" href="<?= base_url()?>public/css/animate.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/flaticon.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url()?>public/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url()?>public/css/owl.carousel.min.css">

<link rel="stylesheet" href="<?= base_url()?>public/css/admin_view_css.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  



<!-- javascript & JQuery-->
<script src="<?= base_url()?>public/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>public/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url()?>public/js/main.js"></script>
<script src="<?= base_url()?>public/js/owl.carousel.min.js"></script>
<script src="<?= base_url()?>public/js/circle-progress.min.js"></script>
<style>
/*table*/
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(odd) {background-color: #dce4ea;}
tr:nth-child(even) {background-color: #ffffff;}

th {
  background-color: #edf4f9;
  color: black;
}
.user-panel {
  float:right;
  background: #003380;  
  margin-left: 30px;
  margin-right:70px;
  margin-top:15px;
  font-size:22px;
  padding-left: 20px;
  padding-right: 30px;
  padding-top: 10px;
  border-radius:14px; 
}
</style>
</head>


<body style="font-family: 'Bree Serif',serif; font-size: 20px;">
<!--Header-->
<header class="header-section">

<a href ="<?php echo base_url()?>public/index.php"> 
<div class="fki-logo">
  <img src="<?php echo base_url()?>public/img/logof.png" alt="faculty logo" style="width:210px;height:100px;">
</div>
</a>



  <div class="nav-switch">
  <i class="fa fa-bars"></i>
  </div>
  
 <div class="user-panel">
  <ul>
    <li><a href ="<?php echo base_url()?>Logout" class="logout-btn">
    <span><i class="fa fa-sign-out" style="color: #fff;" >Logout</i></span></a></li>
  </ul>
</div>
</header>

<section class="intro-section set-bg" data-setbg="<?php echo base_url()?>public/img/intro.jpg" style="height: 753px;">
    <div class="col-lg-3">
    <div class="sidemenu" style="height:400px; width:300px;">
    <button class="admin_dropdown">Administration Management<i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
        <a href="<?php echo base_url()?>Register">Registration</a>
        <a href="<?php echo base_url()?>Retrieve_staff">List Staff</a>
      </div>
      <button class="admin_dropdown">Academic Management<i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
        <a href="<?php echo base_url()?>Add_lecturer">add new lecturer</a>
        <a href="<?php echo base_url()?>View_lecturer">List lecturer</a>
        <a href="<?php echo base_url()?>Del_lecturer">Delete lecturer</a>
         <a href="<?php echo base_url()?>up_lecturer">Update lecturer</a>
      </div>
    <button class="admin_dropdown">Feedback<i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
        <a href="<?php echo base_url()?>Retrieve_feedback">List & Delete Feedback</a>
        <a href="<?php echo base_url()?>Update_feedback">Feedback Status</a>
      </div>
    
    
</div>
    </div>
    
    <div class="col-lg-9">
    <div class="row">
      <div style="width:950px;margin-left:auto; margin-right:auto; margin-top:200px;">
        <br><h3 style="background-color: #000; color: #edf4f9;text-align:center;">List Of Lecturer</h3></div>
     <table border="2" id="internalActivities" action ="<?php echo base_url()?>View_lecturer/index" style="width:100%" class="table table-bordered">
      
         <tr>  
            <th>Id</th>  
            <th>Name</th>
            <th>Gender('1'= M,'2'=F)</th>  
            <th>Ic</th>  
            <th>Contact</th>  
            <th>Email</th>
         </tr>  
         <?php  
         foreach ($h->result() as $row)  
         {  
            ?><tr>  
                <td><?php echo $row->lecturer_id;?></td>  
                <td><?php echo $row->lecturer_name;?></td>  
                <td><?php echo $row->lecturer_gender;?></td>  
                <td><?php echo $row->lecturer_ic;?></td>
                <td><?php echo $row->lecturer_contact;?></td>  
                <td><?php echo $row->lecturer_email;?></td>
              </tr>  
         <?php }  
         ?>  
   </table>  
   </div> 
  </div> 
</div>

</section>

</body>
</html>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("admin_dropdown");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

var dropdown = document.getElementsByClassName("dropdown_adminlist");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}


$(document).ready(function(){  
           $('.delete_staff').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>Del_staff/delete_Staff/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
</script>