function requette(url,data){
    $.ajax({
        type : "POST",
        url  : "http://localhost/SonatelAcademy/QCM_BD_Alioune_Badara_Diouf_Quiz/src/data/"+url,
        data : data,
        success : function(datas){
            return datas;
          //  const {msg} = JSON.parse(datas);    
        },
        complete: function(xmlHttp) {
        }
    });
}