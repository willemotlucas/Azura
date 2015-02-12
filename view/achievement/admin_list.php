<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
                Liste des réalisations
                <small>Vous pouvez consulter, modifier ou supprimer une réalisation.</small>
            </h1>
		</div>
	</div>
    <?php 
    if(isset($msg))
    {
    ?>
	<div class="row">
	  <div class="col-lg-6">
    <?php  
        if(isset($msg['success']))
        {
    ?>
			<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
				<p><?php echo($msg['success']) ?></p>
			</div>
    <?php  
        }
        elseif(isset($msg['error']))
        {
    ?>
            <div class="alert alert-success">
                <p><?php echo($msg['error']) ?></p>
            </div>
    <?php       
        }
    ?>
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
                                    <th>Titre</th>
                                    <th>Sous-titre</th>
                                    <th>Témoignage</th>
                                    <th>Description</th>
                                    <th>En ligne</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
 							<?php 
 							foreach ($achievements as $achievement)
 							{
 								echo('<tr>
 										<td>' . $achievement->id . '</td>');
 								echo('<td><strong>' . $achievement->title . '</strong></td>');
 								echo('<td>' . $achievement->subtitle . '</td>');
 								echo('<td>' . $achievement->testimonial . '</td>');
 								echo('<td>' . $achievement->description . '</td>');
 								if($achievement->online == 1)
 									echo('<td> Oui </td>');
 								else
 									echo('<td> Non </td>');
 								echo('<td><a href="/Azura/safehouse/achievement/edit/' . $achievement->id . '"> Modifier </a></td>');
 								echo('<td><a href="/Azura/safehouse/achievement/delete/' . $achievement->id . '"> Supprimer </a></td>');
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