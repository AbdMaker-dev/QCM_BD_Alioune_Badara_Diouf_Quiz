     <div class="container question_j">
          <div class="form_j">

          </div> 
          <form>
               <div class="form-row">
                    <div class="form-group col-md-6">
                         <div class="cont_gauche"></div>
                         <div class="qcm_bg_black"></div>
                         <div style="width: 100%;position:relative; bottom:250px">
                              <div class="qcm"></div>
                              <div  class="ques" id="ques">
                                   
                              </div>
                         </div>
                    </div>
                    <div class="form-group col-md-6">
                    <div class="cont_droit"></div>
                    <div class=""></div>
                         <div style="width: 100%;position:relative; bottom:350px;left:10%">
                              <div class="rep"></div>
                         <div id="rep">

                         </div>
                         </div>
                    </div>
               </div>
               <div class="container" style="position:relative; bottom: 160px;">
                    <button type="button" id="btn_P" class="btn float-left" style="background-color: rgba(29, 113, 72, 0.91); color:white">Precedent</button>
                    <button type="button" id="btn_S" class="btn float-right" style="background-color: rgba(115, 15, 15, 0.84);color:white">Suivant</button>
               </div>
          </form>
     </div>

     <div style="display: none;" id="template_Q">
          <p>Les region du senegal ?</p>
          <div id="item_Q">
              <input type="checkbox" name="" id=""><label for="">Dakar</label><br>
          </div>
     </div>

     <script>
          var n = 0;
          $.ajax({
		     type : "POST",
			url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/demare_jeux.php",
			data : {"n" : n},
			success : function(datas){
                    var {question,type,reponses}   = JSON.parse(datas);
                    console.log(datas);
                    affiche_question({question,type,reponses});
			},
			complete: function(xmlHttp) {
               }
            });


            // click sur le bouton suivant
            $('#btn_S').click(function(){
                    $.ajax({
                    type : "POST",
                    url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/get_question_jeux.php",
                    data : {"n" : n},
                    success : function(datas){
                         var {question,type,reponses}   = JSON.parse(datas);
                         console.log(datas);
                         affiche_question({question,type,reponses});
                    },
                    complete: function(xmlHttp) {
                    }
               });
            }); 

            // fonction qui affiche les questions au joueur
            function affiche_question({question,type,reponses}){
               $('#ques').empty();
               $('#rep').empty();
                 var p = $('#template_Q p').clone();
                 p.html(question);
                 $('#ques').append(p);
                 if (type == "chs") {
                    reponses.forEach(element => {
                         var item_Q = $('#template_Q #item_Q').clone();
                         item_Q.find('input').attr('type','radio');
                         item_Q.find('label').html(element.reponse);
                         $('#rep').append(item_Q);
                    });
                 }else if(type == "chm"){
                    reponses.forEach(element => {
                         var item_Q = $('#template_Q #item_Q').clone();
                         item_Q.find('label').html(element.reponse);   
                         $('#rep').append(item_Q);                        
                      });
                 }else{
                    reponses.forEach(element => {
                         var item_Q = $('#template_Q #item_Q').clone();
                         item_Q.find('input').attr('type','text');
                         item_Q.find('label').html(element.reponse);  
                         $('#rep').append(item_Q);                         
                      });
                 }
               n++;
            }
     </script>