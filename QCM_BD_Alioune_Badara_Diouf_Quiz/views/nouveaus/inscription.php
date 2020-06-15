<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../asset/css/botsCss/bootstrap.min.css">
	<link rel="stylesheet" href="../../asset/css/singin.css">
	<script src="../../asset/js/botsJs/bootstrap.min.js"></script>
	
	<title>QuIzZ</title>
</head>
<body>

    <div class="container-fluid">
		<div class="image-bck">
			<img src="../../asset/img/images/quiz-time-2453148.png" class="img-fluid" alt="" srcset="">
			 <div class="bg-opac">
			</div>
			<div class="form">
			<form >
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nom</label>
					<div class="col-sm-10">
					<input type="text" id="nom" class="form-control form-control-sm" >
					</div>
				</div>
				<div class="form-group row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Prenom</label>
					<div class="col-sm-10">
					<input type="text" id="prenom" class="form-control form-control-sm" >
					</div>
				</div>
				<div class="form-group row input-bas">
					<label for="colFormLabel" class="col-sm-2 col-form-label">Login</label>
					<div class="col-sm-10">
					<input type="text" id="log" class="form-control" >
					</div>
                </div>
                <div class="form-group row input-bas">
					<label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-10">
					<input type="password" id="psw" class="form-control" >
					</div>
                </div>
                <div class="form-group row input-bas">
					<label for="colFormLabel" class="col-sm-2 col-form-label">Confirme password</label>
					<div class="col-sm-10">
					<input type="password"  class="form-control" id="confpsw">
					</div>
				</div>
				<div class="form-group">
					<input type="button" id="bntV" class="btn bnt-opa colo-ver input-bas col-sm-10" name="val"  value="Valider">
				</div>
			</form>
			</div>
		</div>

	</div>
	<script src="../../asset/js/jquery.min.js"></script>
	<script>
        $(document).ready(function()
        {
			$("#bntV").hide();
			setInterval(swapImages,500);
		});

		function swapImages ()
		{
			if ($("#psw").val()!="") 
			{
				$("#bntV").show();
			}else
			{
				$("#bntV").hide();
			}
		}

		$("#bntV").click(function(){
				
			    var nom = $("#nom").val();
			    var prenom = $("#prenom").val();
				var log = $("#log").val();
				var psw = $("#psw").val();
				var confpsw = $("#confpsw").val();
				var role = "joueur";
				$.ajax({
					type : "POST",
					url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/inscription.php",
					data : {"nom" : nom, "prenom" : prenom, "log" : log,"psw" : psw, "role" : role},
					success : function(datas){
						const {msg} = JSON.parse(datas);
						if (msg=='succes') {
							window.location.href = '../../index.php ';
						}else if(msg=='error'){
							alert("Une erreur c'est produit !!!");
						}	
					},
					complete: function(xmlHttp) {
                    }
				});
			});

	</script>
	<script src="../../asset/js/validation.js"></script>
</body>
</html>