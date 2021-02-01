<!DOCTYPE HTML>

<html>
	<head>
	<title><?= $title ?></title>
	<?php require('Template/head.php') ?>	
	</head>
<body>

	<nav>
	<?php require('Template/partNav.php') ?>
	</nav>



</br>

	<header>
		<?= $allchaptertitle ?>
	</header>

	<section>			
	  	<?= $content ?>
	</section>

	<footer>
		<?php require('Template/footer.php') ?>		
	</footer>
 
	<?php require('Template/script.php') ?>
</body>

</html>