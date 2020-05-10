<hr>
<img src="https://gamepedia.cursecdn.com/oxygennotincluded_gamepedia_en/6/6f/Duplicant.png?version=173431f29bbee8f3e27a9fad4e675cb4" id="Header_kep" style="width:30px;height:30px;">
<a href="index.php">Kezdőlap</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span style="font-size:15px " class="material-icons">more_vert</span>
	<a href="index.php?P=login">Bejelentkezés</a>
	<span style="font-size:15px " class="material-icons">more_vert</span>
	<a href="index.php?P=register">Regisztrálás</a>
<?php else : ?>
	<span style="font-size:15px " class="material-icons">more_vert</span>
	<a href="index.php?P=test">Jogosúltsági szinted</a>

	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<span style="font-size:15px " class="material-icons">more_vert</span>
		<a href="index.php?P=users">Felhasználó lista</a>
		<span style="font-size:15px " class="material-icons">more_vert</span>
		<a href="index.php?P=list_Project">Project lista</a>
		<span style="font-size:15px " class="material-icons">more_vert</span>
		<a href="index.php?P=addProject">Project készítése</a>
		<span style="font-size:15px " class="material-icons">more_vert</span>
	<?php else : ?>
		<span style="font-size:15px " class="material-icons">more_vert</span>
	<?php endif; ?>

	<a href="index.php?P=logout">Kilépés</a>
	<img src="https://gamepedia.cursecdn.com/oxygennotincluded_gamepedia_en/6/6f/Duplicant.png?version=173431f29bbee8f3e27a9fad4e675cb4" id="Header_kepj" style="width:30px;height:30px; ">
<?php endif; ?>

<hr>