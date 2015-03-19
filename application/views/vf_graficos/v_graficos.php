   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      Mostrar data en un Grafico
      <div>
         <div id="myfirstchart" style="height: 0px;"></div>
         <div id="chartContainer" style="height: 450px; width: 100%;"></div>
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