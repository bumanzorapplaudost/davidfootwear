<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-users"></i> Gestion de Clientes</h1>
		<ol class="breadcrumb">
		  <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		  <li class="active">Clientes</li>
		</ol>
	</section>
	<section class="content">
	<div class="box">
	  <div class="box-header with-border">
	    <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddCustomer" ><i class="fa fa-plus"></i> Agregar Cliente</button>
	  </div>
	  <div class="box-body">
	    <table class="table table-bordered table-striped dt-responsive customer-table" width="100%">
	      <thead>
	        <th>No.</th>
	        <th>Nombre</th>
	        <th>Correo</th>
	        <th>Contacto</th>
	        <th>Tipo</th>
	        <th>Compras</th>
	        <th>Acciones</th>
	      </thead>
	      <tbody>
	      </tbody>
	    </table>
	  </div>
	</div>
	</section>
</div>

<div class="modal fade" role="dialog" id="mdlAddCustomer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="<?= base_url()?>Clientes/crear">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" name="name" required placeholder="Nombre Completo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="number" class="form-control input-lg" min="20000000" name="phone" required placeholder="7XXXXXXX">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control input-lg" name="email" placeholder="name@ejemplo.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                                        <select name="type" id="customer-type" class="form-control input-lg customer-type">
                                            <option value="">Tipo de Cliente</option>
                                            <option value="FCF">Persona Natural</option>
                                            <option value="CCF">Persona Juridica</option>
                                            <option value="ENT">Empresa</option>
                                            <option value="EXP">Facturas de Exportacion</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="customer-nit" name="nit" class="form-control input-lg c-type" disabled placeholder="N.I.T">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="customer-nrc" name="nrc" class="form-control input-lg c-type" disabled placeholder="N.R.C">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                        <input type="text" id="customer-area" name="area" class="form-control input-lg c-type" disabled placeholder="Giro">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" name="representative" placeholder="Representante Legal" disabled id="erepresentative" class="form-control input-lg c-type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-code"></i></div>
                                        <input type="text" id="rep_id" placeholder="DUI" disabled class="form-control input-lg c-type">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn-primary btn">Guardar</button>
                        <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="MdlShowCustomerInfo">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Información Fiscal del Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="vcustomer-nit" disabled name="customer-nit" class="form-control input-lg" placeholder="N.I.T">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="vcustomer-nrc" disabled name="customer-nrc" class="form-control input-lg" placeholder="N.R.C">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                <input type="text" id="vcustomer-area" disabled name="customer-area" class="form-control input-lg" placeholder="Giro">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" id="fd_representative" disabled name="representative" class="form-control input-lg" placeholder="Representante Legal">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="MdlEditCustomer">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="EditForm" action="<?= base_url()?>Clientes/Editar/">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" class="form-control input-lg" id="ecustomer-fname" name="name" required placeholder="Nombre Completo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="number" class="form-control input-lg" min="20000000" name="phone" id="ecustomer-phone" required placeholder="7XXXXXXX">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" id="ecustomer-email" class="form-control input-lg" required name="email" placeholder="nombre@ejemplo.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-file-archive-o"></i></span>
                                <select name="type" id="ecustomer-type" required class="form-control input-lg customer-type">
                                    <option value="">Seleccione Tipo de Cliente</option>
                                    <option value="FCF">Factura Consumidor Final</option>
                                    <option value="CCF">Comprobante de Credito Fiscal</option>
                                    <option value="EXP">Facturas de Exportacion</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="ecustomer-nit" name="nit" class="form-control input-lg c-type" placeholder="N.I.T">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="number" id="ecustomer-nrc" name="nrc" class="form-control input-lg c-type" placeholder="N.R.C">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                                <input type="text" id="ecustomer-area" name="area" class="form-control input-lg c-type" placeholder="Giro">
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