<div class="content-wrapper">
   <section class="content-header">
      <h1><i class="fa fa-bank"></i> Gestion de Proveedores</h1>
      <ol class="breadcrumb">
         <li>
            <a href="home"><i class="fa fa-home"></i>Inicio</a>
         </li>
         <li class="active">Proveedores</li>
      </ol>
   </section>
   <section class="content">
      <div class="box">
         <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddProvider"><i class="fa fa-plus"></i>Agregar Proveedor</button>
         </div>
         <div class="box-body">
            <table class="table table-bordered table-striped providers-tbl dt-responsive" width="100%">
               <thead>
                  <th>No.</th>
                  <th>Nombre</th>
                  <th>NIT</th>
                  <th>NRC</th>
                  <th>Giro</th>
                  <th>Rep. Legal</th>
                  <th>Contactos</th>
                  <th>Estado</th>
                  <th>Acciones</th>
               </thead>
               <tbody>
                  
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>

<div class="modal fade" id="mdlAddProvider" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form method="post" action="<?= base_url()?>Proveedores/Crear">
            <div class="modal-header" style="background:#3c8dbc; color:white">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Agregar Proveedor</h4>
            </div>
            <div class="modal-body">
               <div class="box-body">
                  <div class="form-group">
                     <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                     <input type="text" class="form-control input-lg" placeholder="Nombre Proveedor" required name="name" id="provider-name">
                     </div>
                  </div>
					<div class="row">
						<div class="col-sm-4">
						   <div class="form-group">
						       	<div class="input-group">
						          <span class="input-group-addon"><i class="fa fa-code"></i></span>
						          <input type="number" min="0" step="1" class="form-control input-lg" name="nit" placeholder="N.I.T">
						        </div>
						   </div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
						       <div class="input-group">
						          <span class="input-group-addon"><i class="fa fa-code"></i></span>
						          <input type="number" min="0" step="1" class="form-control input-lg" name="nrc" placeholder="N.R.C">
						       </div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
						         <div class="input-group">
						            <span class="input-group-addon"><i class="fa fa-dedent"></i></span>
						            <input type="text" class="form-control input-lg" placeholder="Giro" name="area" id="provider-area">
						         </div>
							</div>
						</div>
					</div>
                     <div class="row">
                        <div class="col-sm-4">
                     		<div class="form-group">
	                           <div class="input-group">
	                              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
	                              <input type="number" min="20000000" class="form-control input-lg" required name="cellphone" placeholder="Contacto #1">
	                           </div>
                     		</div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="form-group">
	                           <div class="input-group">
	                              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
	                              <input type="number" min="20000000" class="form-control input-lg" required name="phone" placeholder="Contacto #2">
	                           </div>
                        	</div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="form-group">
			                    <div class="input-group">
			                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
			                        <input type="text" class="form-control input-lg" placeholder="Representante Legal" name="representative" required id="provider-rep">
			                    </div>
                        	</div>
                        </div>
                     </div>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<div class="form-group">
                  			<div class="input-group">
                  				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  				<input type="email" class="form-control input-lg" name="email" placeholder="Correo electronico" id="provider-email">
                  			</div>
                  		</div>
                  	</div>
                  	<div class="col-sm-6">
                  		<div class="form-group">
		                  	<div class="input-group">
		                  		<span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
		                  		<input type="text" class="form-control input-lg" placeholder="Direccion" name="address" id="provider-address">
                              <input type="hidden" name="status" value="1">
		                  	</div>
		                  </div>
                  	</div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="btn-group">
                  <button class="btn-primary btn btn-submit">Registrar Proveedor</button>
                  <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="MdlEditProvider" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form method="post" action="<?= base_url()?>Proveedores/Editar/" id="EditForm">
            <div class="modal-header" style="background:#3c8dbc; color:white">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Actualizar datos de Proveedor</h4>
            </div>
            <div class="modal-body">
               <div class="box-body">
                  <div class="form-group">
                     <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                     <input type="text" class="form-control input-lg" placeholder="Nombre Proveedor" required name="name" id="eprovider-name">
                     </div>
                  </div>
               <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                           <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="number" class="form-control input-lg" name="nit" id="eprovider-nit" placeholder="N.I.T">
                          </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="number" class="form-control input-lg" name="nrc" id="eprovider-nrc" placeholder="N.R.C">
                         </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-dedent"></i></span>
                              <input type="text" class="form-control input-lg" placeholder="Giro" name="area" id="eprovider-area">
                           </div>
                     </div>
                  </div>
               </div>
                     <div class="row">
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                 <input type="number" min="20000000" class="form-control input-lg" required name="cellphone" id="eprovider-cellphone" placeholder="Contacto #1">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                 <input type="number" min="20000000" class="form-control input-lg" required name="phone" id="eprovider-phone" placeholder="Contacto #2">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                 <input type="text" class="form-control input-lg" placeholder="Representante Legal" name="representative" required id="eprovider-rep">
                             </div>
                           </div>
                        </div>
                     </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                              <input type="email" class="form-control input-lg" name="email" placeholder="Correo electronico" id="eprovider-email">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
                              <input type="text" class="form-control input-lg" placeholder="Direccion" name="address" id="eprovider-address">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="btn-group">
                  <button class="btn-primary btn">Guardar Cambios</button>
                  <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>