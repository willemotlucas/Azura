<section id="presentation">
	<div class="row row-centered">
		<div class="col-lg-12 col-center">
			<h1><?php echo($brand->name) ?></h1>
		</div>
		<div class="col-lg-8 col-lg-offset-2">
			<p>
				<?php echo($brand->description) ?>
<!-- 				Farrow & Ball fabrique de la peinture dans le Dorset, bain par bain, depuis 1946, et reste l'une des rares entreprises qui 
				continue à fabriquer une gamme complète de finitions traditionnelles et modernes de la plus haute qualité. 
				Toutes leurs peintures sont respectueuses de l'environnement et sont conformes à la législation environnementale européenne la plus récente. --> 
			</p>
		</div>
	</div>
</section>

<?php 
if(!empty($products))
{
?>
<section id="products">
		<div class="row row-centered">
			<div class="col-lg-12">
				<h1>Les produits phares</h1>
			</div>
		</div>
		<?php
		$i = 0; //to create a new row div
		$j = 1; //count adding line
		$firstCol = true;
		foreach($products as $product)
		{
			if($i%3 == 0)
			{
				echo('<div class="row">' . "\r\n");
			}
			if($j != $nbLines)
			{
				echo('<div class="col-lg-3">' . "\r\n");
			}
			else
			{
				if($nbProductsLastLine == 1)
				{
					echo('<div class="col-lg-4 col-lg-offset-4">' . "\r\n");
				}
				elseif($nbProductsLastLine == 2)
				{
					if($firstCol)
					{
						echo('<div class="col-lg-4 col-lg-offset-2">' . "\r\n");
						$firstCol = false;
					}
					else
						echo('<div class="col-lg-4">' . "\r\n");
				}
				elseif ($nbProductsLastLine == 3) 
				{
					echo('<div class="col-lg-4">' . "\r\n");
				}
				elseif($nbProductsLastLine == 4)
				{
					echo('<div class="col-lg-3">' . "\r\n");
				}
			}
		?>
				<div class="thumbnail">
					<img src="http://placehold.it/300x300">
					<h3>
						<?php echo($product->name) ?>
						<small><?php echo($product->reference) ?></small>
					</h3>
					<div class="caption">
						<p>
							<?php echo($product->description) ?>
						</p>
					</div>
				</div> 
			</div>
			<!-- End of a col div -->

		<?php
			if($i%3==0 && $i != 0)
			{
				echo('</div>');
				$j++;
			}
			$i++;
		} 
		echo('</div>');
		?>
	</section>
<?php 
}
?>