<!DOCTYPE html>
<html lang="en">

<head>
<title> Faculty Computer and Informatics </title>

<!--favcon -->
<link href="<?php echo base_url()?>public/img/favicon.ico" rel="icon">

<!--meta-->
<meta charset="UTF-8">
<meta name="description" content="University faculty webpage">
<meta name="keywords" content="ums, fki, fci">

<!--Responsive Page-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--UMS Logo Site-->
<link href="<?php echo base_url()?>public/img/umslogo.png" rel="icon">


<!--[if lt IE 9 -->
<script src="https://oss.maxcdn.com/html5shiv/3.\.2/html5shiv.min.js"> </script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<!--[endif]-->

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Bree+Serif:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Style Sheet-->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/css/flaticon.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url()?>public/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/css/owl.carousel.min.css">

<link rel="stylesheet" href="<?php echo base_url()?>public/css/admin_view_css.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  



<!-- javascript & JQuery-->
<script src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>public/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>public/js/main.js"></script>
<script src="<?php echo base_url()?>public/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>public/js/circle-progress.min.js"></script>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
tr:nth-child(odd) {background-color: #ffffff;}

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
		
		
		<div class="row">
 	    <div style="width:1050px;margin-left:400px; margin-top:200px;">
  	    <h2 style="background-color: #000; color: #fff; text-align: center;">Lecturer List</h2>
    	<?php 
        // All users list
        if(isset($view) && $view == 1)  {
            ?>
            <table border='1'>
                <tr>
                    <td style="text-align: center;">ID</td>
                    <td style="text-align: center;">Name</td>
                    <td style="text-align: center;">Contact</td>
                    <td style="text-align: center;">Email</td>
                    <td>&nbsp;</td>
                </tr>
                <?php 
                $sno = 1;
                foreach($response as $val){  
                    echo '<tr>
                        <td>'.$sno.'</td>
                        <td>'.$val['lecturer_name'].'</td>
                          <td>'.$val['lecturer_contact'].'</td>
                        <td>'.$val['lecturer_email'].'</td>
                        <td><a href="'.site_url().'/up_lecturer/index?edit='.$val['lecturer_id'].'">Edit</a></td>
                    </tr>';
                    $sno++;
                }
                ?>
            </table>
            <?php
        } 

        // Edit user
        if(isset($view) && $view == 2)  {
        ?>
        <form method='post' action=''>
            <table>
               
                <tr>
                    <td>Name</td>
                    <td><input type='text' name='txt_name'  value='<?php echo $response[0]['lecturer_name']; ?>'></td>
                </tr>     
                 <tr>
                    <td>contact</td>
                    <td><input type='text' name='txt_contact' value='<?php echo $response[0]['lecturer_contact']; ?>' ></td>
                </tr>      
                <tr>
                    <td>Email</td>
                    <td><input type='text' name='txt_email' value='<?php echo $response[0]['lecturer_email']; ?>' ></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type='submit' name='submit' value='Submit'></td>
                </tr>
            </table>
        </form>
    <?php
        }
    ?>
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
           $('.delete_lecturer').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>Del_lecturer/delete_Lecturer/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
</script>