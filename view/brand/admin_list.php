<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Liste des marques</h1>	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="alert alert-info">
				<p>Dans cet espace, vous pouvez consulter, modifier ou supprimer une marque.</p>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Marques
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Type de produits</th>
                                    <th>Logo</th>
                                    <th>En ligne</th>
                                </tr>
                            </thead>
                            <tbody>
 							<?php 
 							foreach ($brands as $brand)
 							{
 								echo('<tr>
 										<td>' . $brand->id . '</td>');
 								echo('<td><strong>' . $brand->name . '</strong></td>');
 								echo('<td>' . $brand->description . '</td>');
 								echo('<td>' . $brand->products_type . '</td>');
 								echo('<td>' . $brand->logo_id . '</td>');
 								if($brand->online == 1)
 									echo('<td> Oui </td>');
 								else
 									echo('<td> Non </td>');
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