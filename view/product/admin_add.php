<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Ajout d'un produit</h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3><p>Dans cet espace vous ajouter un nouveau produit</p></h3>
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
			<form data-toggle="validator" role="form" method="POST" action="/Azura/safehouse/product/add" enctype="multipart/form-data">
				<div class="form-group">
					<label for="brand" class="control-label">Marque du produit* :</label>					<div class="help-block with-errors"></div>
					<select id="brand" name="brand" required>
						<?php
							foreach ($brands as $brand) {
								echo('<option>' . $brand->id . ' ' . $brand->name . '</option>');
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="name" class="control-label">Nom* :</label>
					<input id="name" name="name" type="text" class="form-control" maxlength="45" required/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="reference" class="control-label">Reference* :</label>
					<input id="reference" name="reference" type="text" class="form-control" maxlength="45"/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description* :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> La description apparaît sur la page du produit.</p>
					</div>
					<textarea id="description" name="description" class="form-control" rows="7" required></textarea>
				</div>
				<div class="form-group">
					<label for="product_image" class="control-label">Image du produit</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i>Poids maximale de l'image : 10mo. Hauteur maximale : 150px - Largeur maximale : 300px</p>
					</div>
					<input id="product_image" name="product_image" type="file" class="form-control" required/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
				<label class="control-label">Mettre le contenu en ligne* :</label>
				    <div class="radio">
				    	<label>
				        	<input type="radio" name="online" value="yes" checked required>
				        	Oui
				      	</label>
				    </div>
				    <div class="radio">
				    	<label>
				        	<input type="radio" name="online" value="no" required>
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
