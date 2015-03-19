   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      TUTORIAL DE SUBIR ARCHIVOS
         <?php echo isset($error) ? $error : null;?>
         <div id="cont">
		 <?php echo form_open_multipart('subir','id="myForm"');?>
			 <input id="itFile" type="file" name="userfile" size="20" />
	         <br>
			 <input id="img" type="submit" value="Subir"
			        onclick="subirArchivo($('#myForm'),$('.post_images'),$('#resultado'),$('#cont') );" />
		 </form>
		 </div>
      <div id="resultado">
         
	  </div>
   </div>