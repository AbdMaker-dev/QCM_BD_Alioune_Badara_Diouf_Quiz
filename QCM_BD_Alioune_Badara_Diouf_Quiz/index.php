<?php  
    if (isset($_POST['ins'])) {
		header('location:views/nouveaus/inscription.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="asset/css/botsCss/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="asset/css/login.css">
	<script src="asset/js/botsJs/bootstrap.min.js"></script>
	<title>QuIzZ</title>
</head>
<body>

     

    <div class="container-fluid">
		<div class="image-bck">
			<img src="asset/img/images/quiz-time-2453148.png" class="img-fluid" alt="" srcset="">
			 <div class="bg-opac">
			</div>
			<div class="form">
			<form action="index.php" method="post">
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Login</label>
					<div class="col-sm-10">
					<input type="text" id="log" class="form-control form-control-sm" id="colFormLabelSm">
					</div>
				</div>
				<div class="form-group row input-bas">
					<label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
					<input type="password" id="psw" class="form-control" id="colFormLabel">
					</div>
				</div>
				<div class="form-group">
					<input type="button" id="bntV" class="btn bnt-opa colo-ver input-bas col-sm-10" name="val"  value="Valider">
					<input type="submit" class="btn input-bas colo-red float-right bnt-opa col-sm-10" name="ins"  value="S'inscrire">
				</div>
			</form>
			</div>
		</div>

	</div>
	<script src="asset/js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#bntV").hide();
			setInterval(swapImages,500);
			});
			
			function swapImages ()
			{
				if ( $("#psw").val()!="" && $("#log").val() !="" ) 
				{
					$("#bntV").show();
				}else
				{
					$("#bntV").hide();
				}
			}

			$("#bntV").click(function(){
				var log = $("#log").val();
				var psw = $("#psw").val();
				$.ajax({
					type : "POST",
					url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/connection.php",
					data : {"log" : log,"psw" : psw},
					success : function(datas){
						const {id,role} = JSON.parse(datas)
						if (role=='admin') {
							window.location.href = 'views/admins/admin.php?id='+id;
						}else if(role=='joueur'){
							window.location.href = 'views/joueurs/joueur.php?id='+id;
						}else{
							alert('se compte existe pas !!!');
						}
						
					},
					complete: function(xmlHttp) {
                    }
				});
			});
	</script>
	<script src="asset/js/validation.js"></script>
</body>
</html>