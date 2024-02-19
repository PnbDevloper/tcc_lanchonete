<?php
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

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
  <header class="top-navbar ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container ">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars-rs-food">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Início</a></li>
            <li class="nav-item"><a class="nav-link" href="#menu">Cardápio</a></li>
            <li class="nav-item"><a class="nav-link" href="#sobre">Quem somos</a></li>
            <li class="nav-item"><a class="nav-link " href="#contato">Contato</a></li>
            <li class="nav-item"><a class="nav-link" href="https://wa.me/551936088300"><img src="images/whatsapp.png" width="35" height="35"></a></li>
            <li class="nav-item"><a class="nav-link" href="perfil.php"><img class="imgwid" src="img-login/iconuser.png" width="40" height="40"></ion-icon></a></li>

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
            <section id="promocao" class="container">
              <h2>Promoções da Semana</h2>
              <p>Confira aqui</p>
            </section>
          </div>
        </div>
      </div>
      <div class="tz-gallery">
        <div class="row">
          <?php
          require_once "promocao_index.php";
          ?>
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
            <a class="nav-link active" id="v-pills-home-tab" href="index.php?valor=vertudo">Ver Tudo</a>
            <a class="nav-link" id="v-pills-profile-tab" href="index.php?valor=opcao1">Bebidas</a>
            <a class="nav-link" id="v-pills-messages-tab" href="index.php?valor=opcao2">Lanches</a>
            <a class="nav-link" id="v-pills-settings-tab" href="index.php?valor=opcao3">Porções</a>
          </div>
        </div>

        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <?php
                $opcao = isset($_REQUEST['opcao']) ? $_REQUEST['opcao'] : 'sem'; // Verifica se 'opcao' está definido na solicitação

                $valor = isset($_GET['valor']) ? $_GET['valor'] : '';

                // Verifica o valor passado no parâmetro da URL
                if ($valor === 'opcao1') {
                  require_once "bebidas.php";
                ?>


                <?php
                } elseif ($valor === 'opcao2') {
                  require_once "lanche.php";
                ?>
                <?php
                } else if ($valor === 'opcao3') {
                  require_once "porcao.php";
                ?>

                <?php
                } else if ('vertudo') {
                  // Lógica padrão se não houver valor ou for diferente de 'opcao1' e 'opcao2'
                  require_once "vertudo.php";
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Menu -->

    <!-- Start About -->
    <div class="about-section-box" id="sobre">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 text-center">
            <div class="inner-column">
              <h1>Bem-vindo <span> a Lanchonete Delícia</span></h1>
              <h4>Pequena História da Lanchonete Delícia</h4>
              <p>Em uma pequena cidade do interior do Brasil, existia uma lanchonete chamada "A Lanchonete Delícia". A lanchonete era de propriedade de um casal chamado Maria e João. Eles eram pessoas gentis e hospitaleiras, e sempre estavam dispostos a ajudar os outros.
              </p>

            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="images/about-img.jpg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <!-- End About -->
    <div id="contato">
    <?php
      require_once "contato.php";
    ?>
    </div>
      <!-- End Contact info -->

 
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