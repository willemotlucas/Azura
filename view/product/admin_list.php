<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
                Liste de tous les produits
                <small>Vous pouvez rechercher, modifier ou supprimer un produit.</small>
            </h1>   
        </div>
    </div>
    <div class="input-group custom-search-form">
        <form method="POST" action="/Azura/safehouse/product/list">
            <input id="keywords" name="keywords" type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        <form>
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Référence</th>
                                    <th>Description</th>
                                    <th>En ligne</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
 							<?php
 							foreach ($products as $product)
 							{
 								echo('<tr>
 										<td>' . $product->id . '</td>');
 								echo('<td><strong>' . $product->name . '</strong></td>');
 								echo('<td>' . $product->reference . '</td>');
 								echo('<td>' . $product->description . '</td>');
 								if($product->online == 1)
 									echo('<td> Oui </td>');
 								else
 									echo('<td> Non </td>');
 								echo('<td><a href="/Azura/safehouse/product/edit/' . $product->id . '"> Modifier </a></td>');
 								echo('<td><a onclick="return confirm(\'Voulez-vous vraiment supprimer ce produit ?\')"
                                href="/Azura/safehouse/product/delete/' . $product->id . '"> Supprimer </a></td>');
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