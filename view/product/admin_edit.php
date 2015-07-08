<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Modification du produit <?php echo($product->name);?></h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3><p>Dans cet espace vous modifier un produit</p></h3>
		</div>
	</div>
	<?php 
    if(isset($_SESSION['flash']))
    {
    ?>
    <div class="row">
      <div class="col-lg-6">
      <?php echo($this->Session->flash()); ?>
        </div>
    </div>
    <?php
    }
    ?>
	<div class="row">
		<div class="col-lg-6">
			<form data-toggle="validator" role="form" method="POST" action="/Azura/safehouse/product/edit" enctype="multipart/form-data">
				<input id="id" name="id" type="hidden" value=<?php echo('"'.$product->id.'"')?>/>
				<div class="form-group">
					<label for="brand" class="control-label">Marque du produit* :</label>					<div class="help-block with-errors"></div>
					<select id="brand" name="brand" required>
						<?php
							foreach ($brands as $brand) {
								if($brand->id == $product->Brand_id)
									echo('<option selected>' . $brand->id . ' ' . $brand->name . '</option>');
								else
									echo('<option>' . $brand->id . ' ' . $brand->name . '</option>');
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name" class="control-label">Nom* :</label>
					<input id="name" name="name" type="text" class="form-control" maxlength="45" value=<?php echo('"'.$product->name.'"');?> required/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="reference" class="control-label">Reference* :</label>
					<input id="reference" name="reference" type="text" class="form-control" maxlength="45" value=<?php echo('"'.$product->reference.'"');?>/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description* :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> La description apparaît sur la page du produit.</p>
					</div>
					<textarea id="description" name="description" class="form-control" rows="7" required><?php echo($product->description);?></textarea>
				</div>
				<div class="form-group">
					<label for="Product_image_id" class="control-label">Image du produit : </label>
					<img src=<?php echo('"' . $product_image->src . '"')?> alt=<?php echo('"' . $product_image->alt . '"') ?>/>
					<input type="hidden" name="Product_image_id" value=<?php echo('"' . $product_image->id . '"');?> />
					<br>
					<label for="product_image" class="control-label">Modifier l'image du logo :</label>
					<input id="product_image" name="product_image" type="file" class="form-control"/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
				<label class="control-label">Mettre le contenu en ligne* :</label>
				    <div class="radio">
				    	<label>
				    		<?php 
				    		if($product->online == 1) 
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
				    		if($product->online == 0) 
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
</div>
