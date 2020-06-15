<link rel="stylesheet" href="../../asset/css/login.css?<?php echo time();?>">
<link rel="stylesheet" href="../../asset/css/creeQues.css?<?php echo time();?>">

<div class="container-fluid">
		<div class="image-bck">
			 <img src="../../asset/img/images/quiz-time-2453148.png" class="img-fluid" alt="" srcset="">
			 <div class="bg-opacc">
			 <div class="fomr">
                <form  id="form_question">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Question</label>
                        <div class="col-sm-10">
                        <textarea name="ques" id="ques" cols="50" rows="5" require></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nbr points</label>
                        <div class="col-sm-10">
                        <input type="number" name="nbr_poit" id="nbr_poit" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
                        <div class="col-sm-10">
                         <select name="chx" id="chx">
                             <option value="chm">Choix multiple</option>
                             <option value="chs">Choix simple</option>
                             <option value="cht">Choix text</option>
                         </select>
                         <button type="button" class="btn bnt" id="btn_ajout">+</button>
                        </div>
                    </div>
                    <div id="con_rep">
					</div>
					<div class="form-group">
					  <input type="button" id="vald" class="btn bnt-opa colo-ver input-bas col-sm-10" name=""  value="Valider">
				    </div>
                </form>
            </div>
            </div>
		</div>

    </div>

    <div id="template_ques" style="display: none">
                        <div class="form-group row" id="item_rep">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reponse</label>
                                <div class="col-sm-10">
                                <input type="text" id="rep" require>
                                <input type="checkbox" name="chk[]" id="chk">
                                <input type="radio" name="chk[]" id="rad">
                                <button type="button" class="btn bnt" id="btn_sup">-</button>
                                </div>
                        </div>
        </div>   
	<script src="../../asset/js/jquery.min.js"></script>
	<script>
		var n = 1;
        $(document).ready(function()
        {
			
		});

		$("#vald").click(function(){
            
             if ($('#ques').val()!='' && $('#nbr_poit').val()!='' && $('#chx').val()!='' && $('#rep').val()!='') {
                $.ajax({
					type : "POST",
					url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/creeQuestion.php",
					data : $('#form_question').serialize(),
					success : function(datas){
						console.log(datas);
					},
					complete: function(xmlHttp) {
                    }
				});
             }else{
                 alert("Les champs sont aubligatoire !!!");
             }
			});

			$('#btn_ajout').click(function(){
				var input =  $('#template_ques #item_rep').clone();
				if ( $('#chx').val()=='chm' ) {
					input.find('#rad').remove();
					input.find('#chk').attr('value',n);
				}else if ( $('#chx').val()=='chs' ){
					input.find('#chk').remove();
					input.find('#rad').attr('value',n);
				}else {
					input.find('#rad').remove();
					input.find('#chk').remove();
				}
				input.find('#rep').attr('name','rep_'+n);
				$("#con_rep").append(input);
				n++;
			});

	</script>
	<script src="../../asset/js/validation.js"></script>