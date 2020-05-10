<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProject'])) {
		$postData = [
			'Quantity' => $_POST['Quantity'],
			'Planting' => $_POST['Planting'],
			'harvest_choice' => $_POST['harvest_choice'],
			'Fertilizer' => $_POST['Fertilizer'],
			'comment' => $_POST['comment']
		];

		if(empty($postData['Quantity']) || empty($postData['Planting'])) {
			echo "Hiányzó adat(ok)!";
		} else {
			$query = "INSERT INTO project (Quantity, Planting, harvest_choice, Fertilizer, comment) VALUES (:Quantity, :Planting, :harvest_choice, :Fertilizer, :comment)";
			$params = [
				':Quantity' => $postData['Quantity'],
				':Planting' => $postData['Planting'],
				':harvest_choice' => $postData['harvest_choice'],
				':Fertilizer' => $postData['Fertilizer'],
				':comment' => $postData['comment']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>

	<form method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="Quantity">Darabszám</label>
				<input type="number"  min="0" value="12" class="form-control input_listen" id="Quantity" name="Quantity">
			</div>

			<div class="form-group col-md-6">
				<label for="Planting">Ültetés tipusa</label>
		    	<select class="form-control input_listen" id="ulttipus" name="Planting">
		      		<option value="Cserépben">Cserépben</option>
		      		<option value="Vadon">Vadon</option>
		    	</select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="harvest_choice">Aratni kell?</label>
						<select class="form-control" id="aratva" name="harvest_choice">
		      		<option value= >nem</option>
		      		<option value="igen">igen</option>
						</select>	
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12" >
		    	<label for="Fertilizer">Trágyázni kell?</label>
						<select class="form-control" id="tragyazva" name="Fertilizer">
		      		<option value= >nem</option>
		      		<option value="igen">igen</option>
						</select>	
		  	</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="komment">Növény tipusa/Komment</label>
				<input type="text" class="form-control" id="komment" name="comment">
			</div>
		</div>

		<button type="submit" class="btn btn-primary" name="addProject">Project létrehozása</button>
	</form>
<?php endif; ?>