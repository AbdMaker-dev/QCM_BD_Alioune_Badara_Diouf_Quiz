<?php include('popu.php'); ?>
<div class="row image-bck" id="containt_question">
</div>

<div class="buton row col-5 " id="bnt-pag">
	    <button class="btn bnt-pagi my-2 my-sm-0 float-left" type="submit">Deconnection</button>
	    <button class="btn bnt-pagi my-2 my-sm-0 float-right" type="submit">Deconnection</button>
</div>


<div id="teplate_q" style="display: none;">

    <div class="item-ques marg" id="item_chm">
         <img src="../../asset/img/images/ques.jpg" alt="" srcset="">
         <div class="item-ques-img">
         <div class="item-ques-img-icon">
         </div>
         </div>
             <div class="quess">
                 <div class="ques p">
                     <p id="ques">Les Resgion du senegal klvvlùafp l ,avfj vhbipapzbbi ihvuazvmj afvi ybeaf b iuba eifbby v aefu u  iarvbib?</p>
                 </div>
                 <div class="rep" id="rep">
                   
                </div>
             </div>
             <div class="inc"  id="inc">
                 <button data-toggle="modal" data-target="#exampleModalLong" class="btn col2"><span style="display: none;"><span id="num">1</span><span id="action">edite</span></span><img src="../../asset/img/images/edit.png" alt=""></button>
                 <button class="btn col3"><span style="display: none;"><span id="num">1</span><span id="action">delete</span></span><img src="../../asset/img/images/bin.png" alt=""></button>
             </div>
     </div>

     <div class="item-ques marg" id="item_chs">
         <img src="../../asset/img/images/ques.jpg" alt="" srcset="">
         <div class="item-ques-img">
         <div class="item-ques-img-icon">
         </div>
         </div>
             <div class="quess">
                 <div class="ques p">
                 <p id="ques">Les Resgion du senegal klvvlùafp l ,avfj vhbipapzbbi ihvuazvmj afvi ybeaf b iuba eifbby v aefu u  iarvbib?</p>
                 </div>
                 <div class="rep" id="rep">
                   
                </div>
             </div>
             <div class="inc"  id="inc">
                 <button data-toggle="modal" data-target="#exampleModalLong" class="btn col2"><span style="display: none;"><span id="num">1</span><span id="action">edite</span></span><img src="../../asset/img/images/edit.png" alt=""></button>
                 <button class="btn col3"><span style="display: none;"><span id="num">1</span><span id="action">delete</span></span><img src="../../asset/img/images/bin.png" alt=""></button>
             </div>
     </div>

     <div class="item-ques marg" id="item_cht">
         <img src="../../asset/img/images/ques.jpg" alt="" srcset="">
         <div class="item-ques-img">
         <div class="item-ques-img-icon">
         </div>
         </div>
             <div class="quess">
                 <div class="ques p">
                 <p id="ques">Les Resgion du senegal klvvlùafp l ,avfj vhbipapzbbi ihvuazvmj afvi ybeaf b iuba eifbby v aefu u  iarvbib?</p>
                 </div>
                 <div class="rep" id="rep">
                </div>
             </div>
             <div class="inc" id="inc">
                 <button data-toggle="modal" data-target="#exampleModalLong" class="btn col2"><span style="display: none;"><span id="num">1</span><span id="action">edite</span></span><img src="../../asset/img/images/edit.png" alt=""></button>
                 <button class="btn col3"><span style="display: none;"><span id="num">1</span><span id="action">delete</span></span><img src="../../asset/img/images/bin.png" alt=""></button>
             </div>
     </div>
    <div id="item_rep"><input type="checkbox"  name="chk" id="chk" ><input disabled type="text" name="" id="reponse"></div>
</div>


<script>
    var nbr = 4 ;
    	$.ajax({
				type : "POST",
				url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/getQuestion.php",
				data : {"nbr" : nbr},
				success : function(datas){
                    var all_questions  =  JSON.parse(datas);
                    console.log(all_questions);
                    all_questions.forEach(question =>{
                       addQuestion(question);
                    });
				},
				complete: function(xmlHttp) {
                }
            });

            function addQuestion(question) {
               var item ;
                if (question.type == 'chm' ) {
                    var item = $('#teplate_q #item_chm').clone();
                    item.attr('id','item_'+question.id);
                    question.reponses.forEach(reponse => {
                        var item_rep = $('#teplate_q #item_rep').clone();
                        item_rep.find('#reponse').attr("value",reponse.reponse);
                        if (reponse.etat == 1) {
                            item_rep.find('#chk').attr("checked",'checked');
                        }
                        
                        item.find('#rep').append(item_rep);
                    });
                }else if(question.type == 'chs' ){
                    var item = $('#teplate_q #item_chs').clone();
                    item.attr('id','item_'+question.id);
                    question.reponses.forEach(reponse => {
                        var item_rep = $('#teplate_q #item_rep').clone();
                        item_rep.find('#reponse').attr("value",reponse.reponse);
                        item_rep.find('#chk').attr("name",'chk_'+question.id);
                        item_rep.find('#chk').attr("type",'radio');
                        if (reponse.etat == 1) {
                            item_rep.find('#chk').attr("checked",'checked');
                        }
                        item.find('#rep').append(item_rep);
                    });
                }else{
                    var item = $('#teplate_q #item_cht').clone();
                    item.attr('id','item_'+question.id);
                    question.reponses.forEach(reponse => {
                        var item_rep = $('#teplate_q #item_rep').clone();
                        item_rep.find('#reponse').attr("value",reponse.reponse);
                        item_rep.find('#chk').remove();
                        item.find('#rep').append(item_rep);
                    });
                }
                
                item.find('#ques').html(question.question);
                item.find('#inc button #num').html(question.id);
                item.find('#inc button').click(function(){
                    if ($(this).find('#action').html() == 'edite') {
                        // alert('edite ' + $(this).find('#num').html());
                         //$('#quess').val( 'edite ' + $(this).find('#num').html() )
                         $.ajax({
                            type : "POST",
                            url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/get_edite_question.php",
                            data : {"id" : $(this).find('#num').html()},
                            success : function(datas){
                             console.log(datas);
                             var {id,question,point,type,reponses} = JSON.parse(datas);
                             edite_question({id,question,point,type,reponses});
                            },
                            complete: function(xmlHttp) {
                            }
                        });
                    }else{
                      // alert('delete ' + $(this).find('#num').html());
                      delete_question(parseInt( $(this).find('#num').html() ));
                    }
                });
                $('#containt_question').append(item);
            }
      
      function delete_question(n){
        $.ajax({
				type : "POST",
				url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/deletQuestion.php",
				data : {"id" : n},
				success : function(datas){
                    var {msg} = JSON.parse(datas);
                    if (msg == 'succes') {
                      $('#item_'+n).remove();
                    }else{
                        alert('Erreur de supression');
                    }
				},
				complete: function(xmlHttp) {
                }
            });
      }

     function  edite_question({id,question,point,type,reponses}){
        $('#con_rep').empty();
        nn=1;
        $('#ques').val(question);
        $('#nbr_poit').val(point);
        $('#idd').attr('value',id);
        $('#'+type).attr('selected','selected');
        reponses.forEach(element => {
            var input = $('#template_ques #item_repp').clone();
            input.find('#repp').val(element.reponse);
            if (type=='chs') {
                if (element.etat==1) {
                    input.find('#radd').attr('checked','checked');
                }
                input.find('#chkk').remove();
                input.find('#radd').attr('value',element.reponse);
                input.find('#radd').attr('id','radd'+nn);
                
            }else if(type=='chm'){
                if (element.etat==1) {
                    input.find('#chkk').attr('checked','checked');
                   
                }
                input.find('#radd').remove();
                input.find('#chkk').attr('value',element.reponse);
                input.find('#chkk').attr('id','chkk'+nn);
            }else{
                input.find('#radd').remove();
                input.find('#chkk').remove();
            }
            input.find('#repp').attr('name','rep_'+nn);
            input.find('#repp').attr('id','repp_'+nn);
            input.find('#repp_'+nn).attr( 'onchange','valeurSaisi('+nn+','+type+')' );
            $('#con_rep').append(input);
            nn++;
        });
      }
      function valeurSaisi(n,t){
          if (t.value=="chs") {
            $('#radd'+n).val( $('#repp_'+n).val());
          }else if (t.value=="chm"){
            $('#chkk'+n).val( $('#repp_'+n).val());
          }
      }
</script>
