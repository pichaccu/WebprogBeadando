<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else :
	if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
		header('Location: index.php');
else: 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editProject'])){
		$postData = [
			'Quantity' => $_POST['Quantity'],
			'Planting' => $_POST['Planting'],
			'harvest_choice' => $_POST['harvest_choice'],
			'Fertilizer' => $_POST['Fertilizer'],
			'comment' => $_POST['comment'],
			'id' => $_POST['projectId']
		];
		if($postData['id'] != $_GET['w']) {
			echo "Hiba a dolgozó azonosítása során!";
		} else {
			if(empty($postData['Quantity']) || empty($postData['Planting'])) {
				echo "Hiányzó adat(ok)!";}	
			 else {			
				$query = "UPDATE project SET Quantity = :Quantity, Planting = :Planting, harvest_choice = :harvest_choice, Fertilizer = :Fertilizer, comment = :comment WHERE id = :id";
				$params = [
					':Quantity' => $postData['Quantity'],
					':Planting' => $postData['Planting'],
					':harvest_choice' => $postData['harvest_choice'],
					':Fertilizer' => $postData['Fertilizer'],
					':comment' => $postData['comment'],
					':id' => $postData['id']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";							
				} header('Location: ?P=list_Project');
			}
		}
	}
	$query = "SELECT Quantity, Planting, harvest_choice, Fertilizer, comment, id FROM project WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$project = getRecord($query, $params);
	if(empty($project)) :
		header('Location: index.php');
		else : ?>
			<form method="post">
				<input type="hidden" name="projectId" value="<?=$project['id'] ?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="projectdb">Darabszám</label>
						<input type="text" class="form-control" id="projectdb" name="Quantity" value="<?=$project['Quantity'] ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="projectultetestipus">Ültetés Tipusa</label>
						<select class="form-control input_listen" id="ulttipus" name="Planting" id="projectultetestipus" value=<?=$project['Planting']?>>
		      		<option value="Cserépben">Cserépben</option>
		      		<option value="Vadon">Vadon</option>
			      		</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="projectharvest_choice">Aratni kell?</label>
						<select class="form-control" id="harvest_choice1" name="harvest_choice">
							<option value= <?=$project['harvest_choice'] == null ? 'selected' : '' ?> >nem</option>
							<option value="igen" <?=$project['harvest_choice'] == "igen" ? 'selected' : '' ?> >igen</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="projectFertilizer">Trágyázni kell?</label>
						<select class="form-control" id="Fertilizer1" name="Fertilizer">
							<option value="" <?=$project['Fertilizer'] == null ? 'selected' : '' ?> >nem</option>
							<option value="igen" <?=$project['Fertilizer'] == "igen" ? 'selected' : '' ?> >igen</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="projectcomment">Komment</label>
						<input type="text" class="form-control" id="projectcomment" name="comment" value="<?=$project['comment'] ?>">
					</div>
				</div>

				<button type="submit" class="btn btn-primary" name="editProject">Változtatások mentése</button>
			</form>
		<?php endif;
	endif;
endif;
?>