<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
	<?php else : ?>
 		<?php 
			if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			 		$query = "DELETE FROM project WHERE id = :id";
					$params = [':id' => $_GET['d']];
					require_once DATABASE_CONTROLLER;
					if(!executeDML($query, $params)) {
						echo "Hiba törlés közben!";
					}
				}
 	?>
<?php 
	$query = "SELECT id, norm_dupe, Planting, harvest_choice, Fertilizer, comment  FROM project ORDER BY id ASC";
	require_once DATABASE_CONTROLLER;
	$project = getList($query);
?>
	<?php if(count($project) <= 0) : ?>
		<h1>Nincs projekt még a rendszerben.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col" style="text-align:center">Kolónia darabszám</th>
					<th scope="col">Ültetés tipusa</th>
					<th scope="col" style="text-align:center">Aratni kell?</th>
					<th scope="col" style="text-align:center">Trágyázni kell?</th>
					<th scope="col">Növény tipusa/Komment</th>
					<th scope="col" style="text-align:center">Szerkesztés</th>
					<th scope="col" style="text-align:center">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($project as $w) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td style="text-align:center"><?=$w['norm_dupe'] ?></a></td>
						<td><?=$w['Planting'] ?></td>
						<td style="text-align:center"><?=$w['harvest_choice']== null  ? 'nem' : 'igen' ?></td>
						<td style="text-align:center"><?=$w['Fertilizer'] == null ? 'nem' : 'igen'  ?></td>
						<td><?=$w['comment'] ?></td>
						<td style="text-align:center"><a href="?P=edit_project&w=<?=$w['id'] ?>"><span class="material-icons">edit</span></a></td>
						<td style="text-align:center"><a href="?P=list_Project&d=<?=$w['id'] ?>"><span class="material-icons">delete</span></a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>
