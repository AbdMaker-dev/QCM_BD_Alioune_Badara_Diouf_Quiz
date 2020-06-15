<!-- JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<div>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="fomr">
                <form  id="form_questionn">
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
                        <input type="number" name="id" id="idd">  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
                        <div class="col-sm-10">
                         <select name="chx" id="chx">
                             <option value="chm" id="chm">Choix multiple</option>
                             <option value="chs" id="chs">Choix simple</option>
                             <option value="cht" id="cht">Choix text</option>
                         </select>
                         <button type="button" class="btn bnt" id="btn_ajout">+</button>
                        </div>
                    </div>
                    <div id="con_rep">
					</div>
                </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_ch" class="btn btn-primary" >Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

   <div id="template_ques" style="display: none">
        <div class="form-group row" id="item_repp">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reponse</label>
            <div class="col-sm-10">
            <input type="text" id="repp" require>
            <input type="checkbox" name="chk[]" id="chkk">
            <input type="radio" name="chk[]" id="radd">
            <button type="button" class="btn bnt" id="btn_sup">-</button>
            </div>
        </div>
    </div>  

        <script>
                var nn = 1;
                $(document).ready(function(){
                    
                });

                $("#save_ch").click(function(){
                    if ($('#ques').val()!='' && $('#nbr_poit').val()!='' && $('#chx').val()!='') {
                        $.ajax({
                            type : "POST",
                            url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/modifQuestion.php",
                            data : $('#form_questionn').serialize(),
                            success : function(datas){
                                console.log(datas);
                                 var {msg} = JSON.parse(datas);
                                 if (msg=="succes") {
                                    alert("Modifier avec succes");
                                    location.reload(true);
                                 }else{
                                    alert("Un eurreur est survenue");
                                 }
                               
                            },
                            complete: function(xmlHttp) {
                            }
                        });
                    }else{
                        alert("Les champs sont aubligatoire !!!");
                    }
                    });

                    $('#btn_ajout').click(function(){
                        var input =  $('#template_ques #item_repp').clone();
                        if ( $('#chx').val()=='chm' ) {
                            input.find('#radd').remove();
                          //  input.find('#chkk').attr('id',nn);
                            input.find('#chkk').attr('id','chkk'+nn);
                        }else if ( $('#chx').val()=='chs' ){
                            input.find('#chkk').remove();
                            input.find('#radd').attr('value',isNaN);
                            input.find('#radd').attr('id','radd'+nn);
                        }else {
                            input.find('#radd').remove();
                            input.find('#chkk').remove();
                        }
                        input.find('#repp').attr('name','rep_'+nn);
                        input.find('#repp').attr('id','repp_'+nn);
                        input.find('#repp_'+nn).attr( 'onchange','valeurSaisi('+nn+','+$('#chx').val()+')' );
                        $("#con_rep").append(input);
                        nn++;
                    });
	    </script>