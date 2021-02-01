<!DOCTYPE HTML>

<html>
	<head>
	 <link rel="stylesheet" href="styles.css">
	<title><?= $title ?></title>
	<?php include('Template/head.php') ?>	
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


 
	<?php include('Template/script.php') ?>
</body>

</html>