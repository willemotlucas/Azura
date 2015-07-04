<div id="page-wrapper">
	<?php 
	if(!empty($brand))
	{
	?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Modification de la marque : <?php echo($brand->name) ?></h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3><p>Dans cet espace vous modifier une marque. Faites attention avant de sauvegarder !</p></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form data-toggle="validator" role="form" method="POST" action="/Azura/safehouse/achievement/add">
				<div class="form-group">
					<label for="name" class="control-label">Nom* :</label>
					<input id="name" name="name" type="text" class="form-control" maxlength="45" value=<?php echo('"'.$brand->name.'"')?>required/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description* :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> La description apparaît sur la page de la marque.</p>
					</div>
					<textarea id="description" name="description" class="form-control" rows="7" required><?php echo('"'.$brand->description.'"')?></textarea>
				</div>
				<div class="form-group">
					<label for="url" class="control-label">Lien vers le site de la marque :</label>
					<input id="url" name="url" type="text" class="form-control" maxlength="255" value=<?php echo('"'.$brand->url.'"')?>/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="products_type" class="control-label">Type de produits vendus</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> Le type de produits vendus apparaît sur la page d'accueil, sur l'encart de la marque.</p>
					</div>
					<input id="products_type" name="products_type" type="text" class="form-control" maxlength="255" value=<?php echo('"'.$brand->products_type.'"')?>/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
				<label class="control-label">Mettre le contenu en ligne* :</label>
				    <div class="radio">
				    	<label>
				    		<?php 
				    		if($brand->online == 1) 
				    			echo('<input type="radio" name="online" value="yes" checked required>');
				    		else
				    			echo('<input type="radio" name="online" value="yes" required>')
				    		?>
				        	Oui
				      	</label>
				    </div>
				    <div class="radio">
				    	<label>
				    		<?php 
				    		if($brand->online == 0) 
				    			echo('<input type="radio" name="online" value="no" checked required>');
				    		else
				    			echo('<input type="radio" name="online" value="no" required>')
				    		?>
				        	Non
				      	</label>
				    </div>
				</div>
				<p>* Ces champs sont obligatoires</p>
				<div class="form-group">
					<div class="col-lg-4 col-lg-offset-9">
						<button class="btn btn-success" type="submit">Enregistrer</button>
						<button class="btn btn-primary" type="button">Annuler</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php 
	}
	 ?>
</div>
