function enviarCorreo(txtFrom,txtPwd,txtDestino,txtAsunto,txtBody){
   var jsonData = $.ajax({
       type: "POST",
       url: "index.php/cf_mail/c_mail/enviarCorreo",
       data: {myPostData : "{\"correoEnvia\":\"" + txtFrom + "\", " +
       		                "\"claveCorreo\":\"" + txtPwd + "\", "+
       		                "\"destino\":\"" + txtDestino + "\", "+
       		                "\"asunto\":\"" + txtAsunto + "\", "+
       		                "\"body\":\"" + txtBody + "\" "+
       						"}" },
       dataType:"json",
       async: false
  }).responseText;
  //alert(jsonData);
  document.getElementById("contenido").innerHTML = jsonData;
}