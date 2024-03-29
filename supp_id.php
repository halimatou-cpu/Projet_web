<title>Suppression d'un type d'identification</title>
<?php
	include("session.php");
		$SQL = "SELECT * FROM itypes ORDER BY tid";
		$res = $db->query($SQL);
		if ($res->rowCount()==0)
		{
		echo "<P>La liste est vide";
		}
		else
		{	
?>				
				<div class="verticalement">
	 					<fieldset>
                    <legend align="center">Suppression d'un type d'identification</legend>
                    <div class="table-responsive">
						<table class="table table-hover">
					  		<thead>
							    <tr>
							      <th scope="col">Tid</th>
							      <th scope="col">Nom</th>
							    </tr>
							</thead>
							<tbody>
 
<?php
								foreach($res as $row)
								{
?>					
									<tr class="active">
										<td><?php echo htmlspecialchars($row['tid']); ?></td>
										<td><?php echo htmlspecialchars($row['nom']); ?></td>
										<td><a href="#" class="btn btn-sm btn-danger" id="<?php echo $row['tid']; ?>" data-toggle="modal" data-target="#confirmationSupp" onclick="document.getElementById('ref_id_bouton').value=this.id;"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
									</tr>
<?php
								}
?>
							</tbody>
						</table>
					</div>
					</fieldset>
				</div>
				<div class="modal fade" id="confirmationSupp" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" align="center">
							Êtes-vous sûr de supprimer ce moyen d'identification ?
							</div>
							<div class="modal-footer" style="display: flex; flex-direction: row;">
								<form method="post" action="traitement_supp_id.php">
									<input type='hidden' name="tid" value='' id='ref_id_bouton'>
								    <button type="submit" class="btn btn-secondary"style="height: 35px;">Oui</button>
								</form>
								<button type="button" data-dismiss="modal" class="btn btn-primary"style="height: 35px;">Annuler</button>

							</div>
						</div>
					</div>
				</div>
<?php
		}
?>