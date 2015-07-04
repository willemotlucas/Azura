<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Ajout d'une marque</h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3><p>Dans cet espace vous ajouter une nouvelle marque.</p></h3>
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
			<form data-toggle="validator" role="form" method="POST" action="/Azura/safehouse/brand/add" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name" class="control-label">Nom* :</label>
					<input id="name" name="name" type="text" class="form-control" maxlength="45" required/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description* :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> La description apparaît sur la page de la marque.</p>
					</div>
					<textarea id="description" name="description" class="form-control" rows="7" required></textarea>
				</div>
				<div class="form-group">
					<label for="url" class="control-label">Lien vers le site de la marque :</label>
					<input id="url" name="url" type="text" class="form-control" maxlength="255"/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="products_type" class="control-label">Type de produits vendus :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> Le type de produits vendus apparaît sur la page d'accueil, sur l'encart de la marque.</p>
					</div>
					<input id="products_type" name="products_type" type="text" class="form-control" maxlength="255"/>
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="logo" class="control-label">Logo de la marque</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i>Poids maximale de l'image : 10mo. Hauteur maximale : 150px - Largeur maximale : 300px</p>
					</div>
					<input id="logo" name="logo" type="file" class="form-control" required/>
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
