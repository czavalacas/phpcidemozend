   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      TRANSACCIONES(INSERT, DELETE, UPDATE)
   </div>
   
   <button class="btn btn-warning btn-md" onclick="abrirModal('insert',' ')" style="float: right;">Insertar</button>
   

   
   <br/>
   <br/>
   <?php echo $table;?>
   
   
          <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Insertar Nueva Ruta</h4>
                  </div>
                  <div class="modal-body">
                        Descripcion:
                        <br/>
                        <input name="descripcion" id="descripcion" type="text"></input>
                        <br/>
                        <br/>
                        Estado:
                        <br/>
                        <input name="estado" type="checkbox" id="estado"></input>
                        
                  </div>
                  <div class="modal-footer">
                      
                        <button class="btn btn-warning btn-md" onclick="insertar()">Insertar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      
                  </div>
                </div>
             </div>
             
             
             <div class="modal fade" id="modalElim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Ruta</h4>
                  </div>
                  <div class="modal-body">
                        Estas Seguro de Eliminar?
                        <div id="contenidoEliminar"></div>
                        
                  </div>
                  <div class="modal-footer">
                      
                        <p id="btnEliminar"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      
                  </div>
                </div>
             </div>
             
             
             <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Ruta</h4>
                  </div>
                  <div class="modal-body">
                        <div id="contenidoEditar"></div>
                        
                  </div>
                  <div class="modal-footer">
                      
                        <p id="btnEditar"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      
                  </div>
                </div>
             </div>
             
             
             

   
        
        
        