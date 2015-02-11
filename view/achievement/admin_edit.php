<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Modification de la réalisation n°<?php echo($achievement->id) ?></h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="alert alert-info">
				<p>Dans cet espace vous modifier une réalisation. Faites attention avant de sauvegarder !</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>Titre :</label>
				<input class="form-control" value=<?php echo('"'.$achievement->title.'"')?>/>
			</div>
			<div class="form-group">
				<label>Sous-titre :</label>
				<input class="form-control" value=<?php echo('"'.$achievement->subtitle.'"')?>/>
			</div>
			<div class="form-group">
				<label>Description :</label>
				<textarea class="form-control" rows="7"><?php echo('"'.$achievement->description.'"')?></textarea>
			</div>
			<div class="form-group">
				<label>Témoignage :</label>
				<textarea class="form-control" rows="7"><?php echo('"'.$achievement->testimonial.'"')?></textarea>
			</div>
			<div class="col-lg-4 col-lg-offset-9">
				<button class="btn btn-success" type="button">Enregistrer</button>
				<button class="btn btn-primary" type="button">Annuler</button>
			</div>
		</div>
	</div>
</div>
