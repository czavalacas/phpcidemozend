   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      TUTORIAL DE TABLAS Y MODAL
      <div style="width: 100%;overflow-x: scroll;">
         <?php echo $table;?>
      </div>
   </div>
   

   
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalle</h4>
              </div>
              <div class="modal-body">
              <div id="contenido"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
        </div>
        
        
        