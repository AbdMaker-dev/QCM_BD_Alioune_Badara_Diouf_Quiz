<?php 
	include_once('../../src/fonctions/fonction.php');
	if (isset($_GET['id'])){
		$user = getCurrentUser($_GET['id']) ;
		if( empty($user)){
             header('location:../../index.php');
		}
	}else{
		header('location:../../index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../asset/css/botsCss/bootstrap.min.css">
	<script src="../../asset/js/botsJs/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../../asset/css/admin.css">
	<link rel="stylesheet" href="../../asset/css/listquestion.css">

	<title>QuIzZ</title>
</head>
<body>
	<?php include('nave.php'); ?>
	<span id="id" style="visibility: hidden"><?php echo $user['id']; ?></span>
	<div id="pages">
	</div>

	<script src="../../asset/js/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
			$('#pages').load("listJoueur.php");
		});

		$('#list_q').click(function(){
			set_class();
			$(this).attr('class','nav-item activer');
			$('#pages').load("listQuestion.php");
		});

		$('#list_j').click(function(){
			set_class();
			$(this).attr('class','nav-item activer');
			$('#pages').load("listJoueur.php");
		});

		$('#cree_a').click(function(){
			set_class();
			$(this).attr('class','nav-item activer');
			$('#pages').load("creeAdmin.php");
		});

		$('#cree_q').click(function(){
			set_class();
			$(this).attr('class','nav-item activer');
			$('#pages').load("creeQuestion.php");
		});
		function set_class(){
			$('#list_j').attr('class','nav-item');
			$('#list_q').attr('class','nav-item');
			$('#cree_a').attr('class','nav-item');
			$('#cree_q').attr('class','nav-item');
		}
	</script>
</body>
</html>