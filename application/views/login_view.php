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
<script src="https://oss.maxcdn.com/html5shiv/3.\.2/html5shiv.min.js"> </script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"> </script>
<!--[endif]-->

<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Bree+Serif:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Style Sheet-->
<link rel="stylesheet" href="http://localhost/fyproj/public/css/animate.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/flaticon.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="http://localhost/fyproj/public/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/owl.carousel.min.css">
<link rel="stylesheet" href="http://localhost/fyproj/public/css/login_css.css">



<!-- javascript & JQuery-->
<script src="http://localhost/fyproj/public/js/bootstrap.min.js"></script>
<script src="http://localhost/fyproj/public/js/jquery-3.2.1.min.js"></script>
<script src="http://localhost/fyproj/public/js/main.js"></script>
<script src="http://localhost/fyproj/public/js/owl.carousel.min.js"></script>
<script src="http://localhost/fyproj/public/js/circle-progress.min.js"></script>
</head>



<body>
<!----------------Header---------------------->
<header class="header-section">

<a href ="./index.php">	
<div class="ums-logo">
	<img src="http://localhost/fyproj/public/img/logo.png" alt="faculty logo" >
</div>
</a>

<div class="ir-logo">
	<img src="http://localhost/fyproj/public/img/ir-logo.png" alt="IR4.0 logo" >
</div>

</header>



<section class="intro-section">
<div class="intro-content">
	<div class="container h-100"> <!--100 means 100%-->
		<div class="intro-content">
			<div class="row">
				<div class="wrapper wrapper--w780">
					<div class="card h-100">
						<div class ="card card-2">
							<div class= "card-body">
								<h3>Administration Login</h3>
								
								<form id="formRegister" action ="http://localhost/fyproj/Login/verify_User_Login" method ="post">
									<?php $string = validation_errors(); if(!empty($string)):?>
									<?php echo '<div class="alert alert-danger text-center" style="width:300px;">' .
									validation_errors().'</div>'?>
									<?php endif; ?>

									<table><tr><td valign="top">
										<div valign="center"><i class="fa fa-user-o" style="color: #eb2b63;"></i>User ID:</div>
									</td><td>
										<input type="text" name="id" id="id" placeholder="id"/><br /><br />
									</td></tr>

									<tr><td valign="top">
										<div><i class="fa fa-lock" style="color: #eb2b63;">
										</i>Password:</div></td><td>
										<input type="password" name="password" id="password" placeholder="**********"/> <br/><br/>
									</td></tr>
									</table>

									<div class="login_field" align="center">
										<Button class="site-btn" type="submit" value="Login"/> <span> Login</span></Button> <br/>
									</div>
								</form>
								
							</div>
						</div>
					</div>	
				</div>	
			</div>			
		</div>
	</div>
</div>

</section>





<script>
<!--menu-->
window.onscroll = function() {myFunction()};

var header = document.getElementById("menu");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

<!--slide-->
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1} 
  slides[slideIndex-1].style.display = "block"; 
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}


</script>

</body>
</html>
