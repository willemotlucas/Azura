<html lang="fr">
	<head>
	    <!-- 
	        Responsive wbesite developed by Lucas WILLEMOT for AZURA
	        Based on famous bootstrap Twitter framework, thanks to them !

	        Look my personnal website at : http://lucas-willemot.fr
	     -->

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>AZURA, boutique de décoration d'intérieur à Blois</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="/Azura/res/css/lumen_bootstrap.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="/Azura/res/css/modern-business.css" rel="stylesheet">
	    <link href="/Azura/res/css/contact.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="/Azura/res/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

	<body>
		<?php include("includes/menu.php"); ?>

		<div class="container-fluid">
			<section id="map">
				<div class="row row-centered">
					<h1 class="col-lg-12 col-center">Rendez nous visite ...</h1>
				</div>

				<div class="row">
					<div class="col-lg-6 col-lg-offset-2">
						<iframe width="100%" height="400" frameborder="0" scrolling="no" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1345.5380719571574!2d1.334541200000003!3d47.585761000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e4a81baedc67b9%3A0xa47e665e9df855f7!2s12+Rue+Emile+Laurens%2C+41000+Blois!5e0!3m2!1sfr!2sfr!4v1422660858803"></iframe>
						<!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe> -->
					</div>
					<div class="col-lg-4">
						<h2>AZURA</h2>
						<p>12 Rue Emile Laurens <br> 41000 Blois</p>

						<p><i class="fa fa-phone"></i> 
                    	<abbr title="Téléphone">T</abbr>: 02.54.78.72.63</p>

                		<p><i class="fa fa-envelope-o"></i> 
                    	<abbr title="Email">E</abbr>: <a href="willemotlucas@gmail.com">contact@azurablois.com</a>
                		</p>

                		<p><i class="fa fa-clock-o"></i> 
                    	<abbr title="Heure d'ouverture">Ouverture</abbr>: Mardi - Samedi: 10:00 à 19:00</p>
					</div>
				</div>
			</section>

			<section id="contact-form">
				<!-- Contact form -->
				<div class="row">
					<div class="jumbotron">
						<div class="row row-centered">
							<div class="col-lg-12 col-center">
								<h1>... ou envoyez-nous un message !</h1>
								<h2 class="col-lg-12 col-center">Si vous souhaitez commander un produit, remplissez le <a href="#">formulaire de commande.</a></h2>
							</div>
						</div>
						<form name="sentMessage" id="contactForm" novalidate>
	                        <!-- <div class="row"> -->
	                            <div class="col-lg-offset-2 col-lg-4">
	                                <div class="form-group">
	                                    <input type="text" class="form-control" placeholder="Votre nom *" id="name" required data-validation-required-message="Veuillez entrer votre nom.">
	                                    <p class="help-block text-danger"></p>
	                                </div>
	                                <div class="form-group">
	                                    <input type="email" class="form-control" placeholder="Votre e-mail *" id="email" required data-validation-required-message="Veuillez entrer un e-mail.">
	                                    <p class="help-block text-danger"></p>
	                                </div>
	                                <div class="form-group">
	                                    <input type="tel" class="form-control" placeholder="Votre téléhone *" id="phone" required data-validation-required-message="Veuillez entrer un numéro de téléphone.">
	                                    <p class="help-block text-danger"></p>
	                                </div>
	                            </div>
	                            <div class="col-lg-4-offset-2 col-lg-4">
	                                <div class="form-group">
	                                    <textarea class="form-control" height="400" placeholder="Votre message *" id="message" required data-validation-required-message="Veuillez entrer un message."></textarea>
	                                    <p class="help-block text-danger"></p>
	                                </div>
	                            </div>
	                            <div class="clearfix"></div>
	                            <div class="col-lg-12 text-center">
	                                <div id="success"></div>
	                                <button type="submit" class="btn btn-xl">Envoyer</button>
	                            </div>
	                        <!-- </div> -->
                    	</form>
                    </div>
            		<!-- </div>	 -->
				</div>
			</section>
		</div>

		<?php include("includes/footer.php"); ?>
	</body>
</html>