<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Hora do Lanche</title>  
   

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
	<!-- Custom ICON -->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="teste.html">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Início</a></li>
						<li class="nav-item"><a class="nav-link" href="#menu">Cardápio</a></li>
						<li class="nav-item"><a class="nav-link" href="#sobre">Quem somos</a></li>
						<li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
						<li class="nav-item"><a class="nav-link"  href="carrinho.php"><img src="images/carrinho.png" width="50" height="50"></a></li>
						<li class="nav-item"><a class="nav-link" href="perfil.php"><img src="img-login/iconuser.png" width="50" height="50"></ion-icon></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="images/slider-01.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/slider-02.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/slider-03.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			
		</div>
	</div>
	<!-- End slides -->
	
		<!-- Start Gallery -->
		<div class="gallery-box" id="fotos">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading-title text-center">
							<h2>Promoções da Semana</h2>
							<p>Confira aqui</p>
						</div>
					</div>
				</div>
				<div class="tz-gallery">
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-01.jpg">
								<img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-02.jpg">
								<img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
							</a>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<a class="lightbox" href="images/gallery-img-03.jpg">
								<img class="img-fluid" src="images/gallery-img-0.3.jpg" alt="Gallery Images">
							</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- End Gallery -->
	
	<!-- Start Menu -->
	<div class="menu-box" id="menu">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Cardápio</h2>
						
					</div>
				</div>
			</div>

			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#vertudo" role="tab" aria-controls="v-pills-home" aria-selected="false">Ver tudo</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#bebida" role="tab" aria-controls="v-pills-profile" aria-selected="false">Bebidas</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#lanche" role="tab" aria-controls="v-pills-messages" aria-selected="false">Lanches</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#porcao" role="tab" aria-controls="v-pills-settings" aria-selected="false">Porções</a>
					</div>
				</div>

				<div class="tab-pane fade show active" id="vertudo" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<?php 
				require_once "vertudo.php";
				?>
				</div>

				<div class="tab-pane fade show active" id="bebida" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<?php 
				require_once "bebidas.php";
				?>
				</div>

				<div class="tab-pane fade show active" id="lanche" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<?php 
				require_once "lanche.php";
				?>
				</div >
				<div class="tab-pane fade show active" id="porcao" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<?php 
				require_once "porcao.php";
				?>
				</div>
		</div></div></div></div>	

	<!-- End Menu -->

	 <!-- Start About -->
	<div class="about-section-box" id="sobre">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Bem-vindo <span>a Hora do Lanche</span></h1>
						<h4>Pequena História da Hora do Lanche</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box"  id="contato">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Whatsapp</h4>
						<p class="lead">
							(19) 3608-8300
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Instagram</h4>
						<p class="lead">
							@horadolanche_sjrp
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Localização</h4>
						<p class="lead">
							Praça Barão do Rio Branco, 62, São José do Rio Pardo, SP
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	



	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				
				
				<div class="col-lg-6 col-md-6">
					<h3>Contatos</h3>
					<p class="lead">Praça Barão do Rio Branco, 62, São José do Rio Pardo, SP</p>
					<p class="lead"><a href="#"> (19) 3608-8300</a></p>
				</div>
				<div class="col-lg-6 col-md-6">
					<h3>Horário de Funcionamento</h3>
					<p><span class="text-color">Segunda-feira: </span> 17:00 - 01:00h</p>
					<p><span class="text-color">Terça-feira:</span> 17:00 - 01:00h</p>
					<p><span class="text-color">Quarta-feira:</span> 17:00 - 01:00h</p>
					<p><span class="text-color">Quinta-feira:</span> 17:00 - 01:00h</p>
					<p><span class="text-color">Sexta-feira:</span> 17:00 - 01:00h</p>
					<p><span class="text-color">Sábado e Domingo :</span> 17:00 - 01:00h</p>
				</div>
			</div>
		</div>
		
		
						
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>