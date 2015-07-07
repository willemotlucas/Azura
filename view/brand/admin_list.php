<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
                Liste des marques
                <small>Vous pouvez modifier ou supprimer une marque.</small>
            </h1>   
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
        <div class="alert alert-info">
            <p><i class="fa fa-info-circle"></i> Cliquez sur le nom d'une marque pour accéder à ses produits et les gérer (modification et suppression).</p>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Type de produits</th>
                                    <th>En ligne</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
 							<?php 
 							foreach ($brands as $brand)
 							{
 								echo('<tr>
 										<td>' . $brand->id . '</td>');
 								echo('<td><strong><a href="/Azura/safehouse/product/list_brand/' . $brand->id . '">' . $brand->name . '</a></strong></td>');
 								echo('<td>' . $brand->description . '</td>');
 								echo('<td>' . $brand->products_type . '</td>');
 								if($brand->online == 1)
 									echo('<td> Oui </td>');
 								else
 									echo('<td> Non </td>');
 								echo('<td><a href="/Azura/safehouse/brand/edit/' . $brand->id . '"> Modifier </a></td>');
 								echo('<td><a onclick="return confirm(\'Voulez-vous vraiment supprimer cette marque et tous les produits correspondants ?\')"
                                href="/Azura/safehouse/brand/delete/' . $brand->id . '"> Supprimer </a></td>');
 								echo('</tr>');
 							}
 							 ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
	</div>
</div>