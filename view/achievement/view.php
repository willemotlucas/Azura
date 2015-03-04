<!-- Page Content -->
<div class="container-fluid">
	<section id="achievements">

        <!-- Page Heading -->
        <div class="row row-centered">
            <div class="col-lg-12 col-center">
                <h1>Decouvrez toutes nos realisations</h1>
            </div>
        </div>
        <!-- /.row -->

        <?php
        if(isset($achievements))
        {
	        $i = 1;
	        foreach ($achievements as $achievement)
	        {
	        	//To display a grey background
	        	if($i%2 == 1)
	        	{
	        ?>
	       			<div class="row achievement-background">
	       	<?php
	       		}
	       		else
	       		{
	       	?>
	       			<div class="row achievement-background-color">
	       	<?php	
	       		}
	        ?>
	        	<div class="col-lg-4 col-md-4 col-sm-4">
	        		<h3><?php echo($achievement->title)?></h3>
	        		<h4><?php echo($achievement->subtitle)?></h4>
	        		<p><?php echo($achievement->description)?></p>
	        	</div>
	        	<div class="col-lg-8 col-md-8 col-sm-8">

		        	<!-- One row of pictures -->
			        <article>
			        <?php 
			        	if(isset($achievement->images))
			        	{	
			        		foreach ($achievement->images as $image) {
			        ?>
			 			<div class="col-lg-3 col-md-4 col-sm-4">
				            <img data-toggle="modal" data-target="" class="img-responsive img-hover" src=<?php echo('"' . $image->src . '"')?> alt="">
				        </div>
				    <?php
			        		}
			        	} 
			        ?>
				    </article>

<!-- 				       <div class="col-lg-3 col-md-4 col-sm-4">
				            <a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div>
				        <div class="col-lg-3 col-md-4 col-sm-4">
				            <a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div>
				        <div class="col-lg-3 col-md-4 col-sm-4">
				        	<a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div> -->

					<!-- One row of pictures -->
<!-- 			        <article>
			 			<div class="col-lg-3 col-md-4 col-sm-4">
				            <img data-toggle="modal" data-target="#modal1" class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				        </div>

				       <div class="col-lg-3 col-md-4 col-sm-4">
				            <a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div>
				        <div class="col-lg-3 col-md-4 col-sm-4">
				            <a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div>
				        <div class="col-lg-3 col-md-4 col-sm-4">
				        	<a href="#">
				                <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
				            </a>
				        </div>
				    </article> -->
				</div>
			</div>
			<?php
				$i++;
	       	}
	    }
	        ?>

	    <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <?php
                    for($i = 1; $i <= $page; $i++)
                    {
                    	if((isset($_GET['page']) && $_GET['page'] == $i) || (!isset($_GET['page']) && $i == 1))
                			echo '<li class="active">';
                		else
                			echo '<li>';
                	?>
	                        <a href=<?php echo('?page=' . $i) ?>><?php echo $i ?></a>
	                    </li>
                    <?php 
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->

    </section>
</div>