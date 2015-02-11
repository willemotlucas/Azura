<!-- About shop header -->
<header id="about">
    <div class="jumbotron">
        <div class="row row-center">
            <h1 class="col-lg-12 col-center">Notre boutique a Blois</h1>
        </div>
        <div class="row">
            <p><strong>Azura</strong>, boutique de décoration, de création et d'innovation, a été fondée en 2002 par Laëtitia Pousse. Fort de son savoir-faire, le premier mot d'ordre fût la création de cartes d'art uniques au monde, à l'aide de matériaux exceptionnels. Petit à petit, Laëtitia a fait évoluer son offre et ses services. Travaillant avec <a href="#"><strong>les marques</strong></a> les plus luxueuses,
            elle vous propose à présent des peintures écologiques haut de gamme, des papiers peints de grande qualité, des tapis, divers textiles et autres objets de décoration. Diplômée de l'ETIC, elle vous offre également <a href="#"><strong>ses services</strong></a> en conseil et en décoration d'intérieur, et vous accompagne dans la réalisation de vos travaux de rénovation.</p>
            <h3 style="text-align: center;"><a href=<?php echo '"' . BASE_URL . '/page/contact"'?>>Nous situer sur la carte</a> - <a href=<?php echo '"' . BASE_URL . '/page/contact#contact-form"'?>>Nous contacter</a></h3>
        </div>
    </div>
</header>
<!-- End About shop header -->

<!-- Page Content -->
<div class="container-fluid">

<?php 
    if(!empty($brands))
    {
?>
    <!-- Marketing Icons Section -->
    <section id="brands">
        <div class="row row-centered">
            <h1 class="col-lg-12 col-center">Les marques</h1>
        </div>
    <?php
        $i = 0;
        $j = 1;
        $firstCol = true;
        foreach ($brands as $brand)
        {
            if($i%3 === 0)
            {
                echo('<div class="row">
                        <div id="thumbnail-container">
                            <div class="col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1">
                ');
            }
            if($j != $nbLines)
            {
                //We are not on the last line, so it's a standard display
                echo('<div class="col-lg-3 col-md-6 col-sm-6">');
            }
            else
            {
                if($nbBrandsLastLine == 1)
                {
                    echo('<div class="col-lg-4 col-lg-offset-4 col-md-6 col-sm-6">');
                }
                elseif($nbBrandsLastLine == 2)
                {
                    if($firstCol)
                    {
                        echo('<div class="col-lg-4 col-lg-offset-2 col-md-6 col-sm-6">');
                        $firstCol = false;
                    }
                    else
                        echo('<div class="col-lg-4 col-md-6 col-sm-6">');
                }
                elseif($nbBrandsLastLine == 3)
                {
                    echo('<div class="col-lg-4 col-md-6 col-sm-6">');
                }
                elseif($nbBrandsLastLine == 4)
                    echo('<div class="col-lg-3 col-md-6 col-sm-6">');
            }
    ?>

                        <div class="thumbnail">
                            <img class="img-responsive" src=<?php echo('"' . $brand->src . '"'); ?> alt="Farrow & ball">
                            <div class="caption">
                                <h3><?php echo($brand->name); ?><br>
                                    <small class="text-black"><?php echo($brand->products_type); ?></small> <br><br>
                                </h3>
                                <h4><a href=<?php echo('"/Azura/brand/view/' . $brand->id . '"'); ?>>Découvrir la gamme</a></h4>
                                <a href="" class="learn-more"></a>
                            </div>
                        </div>
                    </div> 
                    <!-- End of a col thumbnail div -->
    <?php 
        //End of a row, we close div
        if($i%3 == 0 && $i != 0)
        {
            echo('      </div>
                    </div>
                </div>'
            );
            $j++;
        }
        $i++;
        }
    echo('</section>');
    }
     ?>

    <?php 
    if(!empty($achievement))
    {    
    ?>
        <!-- The last achievment section -->
        <section id="last-achievement">
            <div class="jumbotron">
                <div class="row">
                    <h1 class="col-lg-12 align-center text-white">Notre derniere realisation</h1>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 img-portofolio">
                      <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="" data-toggle="modal" data-target="#modal1">
                    </div>
                    <div class="col-lg-3 col-md-6 img-portofolio">
                      <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="" data-toggle="modal" data-target="#modal2">
                    </div>
                    <div class="col-lg-3 col-md-6 img-portofolio">
                      <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="" data-toggle="modal" data-target="#modal3">
                    </div>
                    <div class="col-lg-3 col-md-6 img-portofolio">
                      <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="" data-toggle="modal" data-target="#modal4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-white"><?php echo($achievement->title) ?></h2>
                        <blockquote>
                            <p class="text-justify">" <?php echo($achievement->testimonial) ?> " <a href=<?php echo '"' . BASE_URL . '/achievement/view"'?>> Voir nos autres travaux</a></p>
                        </blockquote>
                        <h3 class="text-white align-center">Vous aussi, faites appel à Azura pour votre décoration ou recevoir de simples conseils. Découvrez <a href="#">les services</a> que nous vous offrons, et <a href=<?php echo '"' . BASE_URL . '/page/contact"'?>>contactez-nous</a> !</h3>
                    </div>
                </div>
            </div>

            <!-- Modal dialog to zoom on the pictures -->

            <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Le salon #1</h4>
                        </div>
                        <div class="modal-body">
                            <img class="img-responsive img-hover" src="http://placehold.it/800x500" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Le salon #2</h4>
                        </div>
                        <div class="modal-body">
                            <img class="img-responsive img-hover" src="http://placehold.it/800x500" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Le salon #3</h4>
                        </div>
                        <div class="modal-body">
                            <img class="img-responsive img-hover" src="http://placehold.it/800x500" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Le salon #4</h4>
                        </div>
                        <div class="modal-body">
                            <img class="img-responsive img-hover" src="http://placehold.it/800x500" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Modal dialog -->
            
        </section>
        <!-- End of last achievement section -->
    <?php
    }
    ?>
</div>
<!-- /.container -->

