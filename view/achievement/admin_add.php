<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Ajout d'une réalisation</h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<h3><p>Dans cet espace vous ajouter une nouvelle réalisation.</p></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<form data-toggle="validator" role="form" method="POST" action="/Azura/safehouse/achievement/add">
				<div class="form-group">
					<label for="title" class="control-label">Titre* :</label>
					<input id="title" name="title" type="text" class="form-control" maxlength="45" />
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="subtitle" class="control-label">Sous-titre :</label>
					<input id="subtitle" name="subtitle" type="text" class="form-control" maxlength="45"/>
				</div>
				<div class="form-group">
					<label for="description" class="control-label">Description :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> La description apparaît sur la page "Nos réalisations".</p>
					</div>
					<textarea id="description" class="form-control" rows="7"></textarea>
				</div>
				<div class="form-group">
					<label for="testimonial" class="control-label">Témoignage :</label>
					<div class="alert alert-info">
						<p><i class="fa fa-info-circle"></i> Le témoignage apparaît sur la page d'accueil, dans la section "Notre dernière réalisation". <br> S'il est vide, la description sera affichée.</p>
					</div>
					<textarea id="testimonial" name="testimonial" class="form-control" rows="7"></textarea>
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
						<button class="btn btn-success" type="submit" name="submit">Enregistrer</button>
						<button class="btn btn-primary" type="button">Annuler</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
