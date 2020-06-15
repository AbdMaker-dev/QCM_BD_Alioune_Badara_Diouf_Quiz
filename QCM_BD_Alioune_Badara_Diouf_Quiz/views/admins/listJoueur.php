<div class="row image-bck" id="containt_player">
  <!-- container des Item -->
</div>
<div class="buton row col-5 " id="bnt-pag">
	    <button class="btn bnt-pagi my-2 my-sm-0 float-left" type="submit">Precedent</button>
	    <button class="btn bnt-pagi my-2 my-sm-0 float-right" type="submit">Suivant</button>
</div>

<div id="template" style="display: none;">
    <div class="item" id="item">
            <div class="img_user">
               <img src="../../asset/img/imgUsers/img.jpeg" alt="" srcset="">
               <div class="opac">
               <div class="opac-item">
                   <div class="cil2"><button class="col2" type="button"><span style="display: none;"><span id="num">1</span><span id="action">active</span></span><img src="../../asset/img/images/security.png" alt="logo"></button></div>
                   <div class="col3"><button class="col3" type="button"><span style="display: none;"><span id="num">1</span><span id="action">delete</span></span><img src="../../asset/img/images/bin.png" alt="logo"></button></div>
               </div>
               </div>
               <div class="info-user">
                   <h5 id="nom">Diouf</h5>
                   <h4 id="prenom">Alioune Bdara</h4>
                   <h5 id="score">200pts</h5>
               </div>
            </div>
      </div>
</div>

<script>
    var nbrItem =  0;
    	$.ajax({
				type : "POST",
				url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/getJoueurs.php",
				data : {"role" : 'joueur'},
				success : function(datas){
                    var all_player  =  JSON.parse(datas);
                    console.log(all_player);
                    all_player.forEach(player => {
                       addPlayer(player);
                    });
				},
				complete: function(xmlHttp) {
                }
            });
            function addPlayer(player){
                nbrItem ++;
                var item = $('#template #item').clone();
                item.attr('id','item_'+player.id);
                item.find('#nom').html(player.nom);
                item.find('#prenom').html(player.prenom);
                item.find('#score').html(150+"pts");
                item.find('#num').html(player.id);
                item.find('button').click(function(){
                    //alert($(this).find('#num').html());
                    var n = parseInt($(this).find('#num').html());
                    if ($(this).find('#action').html() == 'delete') {
                        remove_player(n);
                    }else if($(this).find('#action').html() == 'active'){
                        alert('Active'+n);
                    }
                });
                $('#containt_player').append(item);
            }

            function remove_player(n){
                $.ajax({
				type : "POST",
				url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/deletJoueurs.php",
				data : {"id" : n},
				success : function(datas){
                    var {msg} = JSON.parse(datas);
                    if (msg == 'succes') {
                        $('#item_'+n).remove();
                    }else{
                        alert('No');
                    }
				},
				complete: function(xmlHttp) {
                }
            });
            }
</script>