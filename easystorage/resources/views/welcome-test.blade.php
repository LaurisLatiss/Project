<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Easy Storage</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('my-css/bootstrap/css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('fontawesome/web-fonts-with-css/css/fontawesome-all.css')}}"/>
        <link rel="stylesheet" href="{{asset('my-css/bootstrap/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('my-css/bootstrap/css/fonts.css')}}"/>

    </head>
    <body>
     
    <!-- Navigation -->
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/home') }}">Easy Storage</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">Sākumlapa
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kontakti.php">Kontakti</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Pieslēgties</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- Navigation end -->
      
<div id="banner">
    <img src="{{asset('kval_darbs/images/archive.jpg')}}" id="homepage-banner" class="img-fluid" alt="Archive">
    <div id="banner-text-wrapper">
        <div id="banner-text-container">
            <div id="centered-banner-text"></div>
        </div>
    </div>
</div>  
  
      
<!-- Services section -->
<div class="container">
	<section id="what-we-do">
			<h2 class="section-title mb-2 h1">Ko mēs piedāvājam?</h2>
			<p class="text-center text-muted h5">Invetāra uzskaitīšana Jūsu uzņēmumiem!</p>
			<div class="row mt-5">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-1">
							<h3 class="card-title">ĀTRS UN DROŠS</h3>
							<p class="card-text">Nodrošināta klienta datu drošība un veikala ātrdarbība</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-2">
							<h3 class="card-title">ELASTĪGS</h3>
							<p class="card-text">Adaptīvs dizains: pielāgojas ierīcēm un ekrānu izmēriem</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-3">
							<h3 class="card-title">IETILPĪGS</h3>
							<p class="card-text">Iespējams pievienot neierobežotu skaitu inventāra un kategoriju.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-4">
							<h3 class="card-title">DRAUDZĪGS UN ĒRTS</h3>
							<p class="card-text">Viegli pārskatāms, iespējama preču meklēšana</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-5">
							<h3 class="card-title">Title</h3>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
					<div class="card">
						<div class="card-block block-6">
							<h3 class="card-title">Title</h3>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>	

	<!-- /Services section -->
  
  <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4>Par mums</h4>
            <p>Ja jums nepieciešama droša sava inventāra uzskaitīšana, ja būtiski svarīgas ir  informācijas arhivēšanas un automātiskās dublēšanas sistēmas, ja vēlaties paātrināt datu apstrādi un pārsūtīšanu, turklāt gribat būt pārliecināti, ka  informācija nekur nepazudīs nekādos apstākļos, pat zemestrīces, vispārējā streika vai valdības maiņas gadījumā - jūs esat mūsu klients.</p>
          </div>
          <div class="col-md-4">
            <h4>Informācija</h4>
            <p>Uzņēmums Easy Storage piedāva Jūsu uzņēmuma inventāra uzskaitīšanu un pieeju jebkurā vieta, jebkurā laika izmantojot jebkuru ierīci..</p>
          </div>
          <div class="col-md-4">
            <h4>Kontakti</h4>
            <p>Telefons: +371 20202977</p>
            <p>E-pasts: info@easystorage.lv</p>
            <p>Skype: EasyStorage</p>
            <p>Adrese: Vanšu iela 54</p>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <div class="text-left">
                Copyright © Easy Storage
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
<!-- Footer end -->
  
      <!-- JS -->
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
      });
    </script>
  </body>

</html>
