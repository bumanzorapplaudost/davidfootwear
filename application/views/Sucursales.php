<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-users"></i> Gestion de Sucursales</h1>
		<ol class="breadcrumb">
		  <li><a href="<?= base_url()?>Inicio"><i class="fa fa-home"></i> Inicio</a></li>
		  <li class="active">Sucursales</li>
		</ol>
	</section>
	<section class="content">
	<div class="box">
	  <div class="box-header with-border">
	    <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddStore" ><i class="fa fa-plus"></i> Agregar Sucursal</button>
	  </div>
	  <div class="box-body">
	    <table class="table table-bordered table-striped dt-responsive store-table" width="100%">
	      <thead>
	        <th>No.</th>
	        <th>Sucursal</th>
	        <th>Direccion</th>
	        <th>Encargado</th>
	        <th>Contacto</th>
	        <th>Fecha Apertura</th>
	        <th>Status</th>
	        <th>Acciones</th>
	      </thead>
	      <tbody>
	      </tbody>
	    </table>
	  </div>
	</div>
	</section>
</div>

<div class="modal fade" role="dialog" id="mdlAddStore">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?= base_url()?>Sucursales/Crear">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Sucursal</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                    			<input type="text" name="name" required placeholder="Nombre de Sucursal" class="form-control input-lg">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-user"></i></span>
		                    			<select name="employee_id" class="form-control input-lg" required>
		                    				<option value="">-Encargado-</option>
		                    				<?php 
                                                if(isset($usuarios)) {
                                                    foreach ($usuarios as $key => $value) {
                                                        if($value["profile"] == "2") {
                                                            echo '<option value="'.$value["user_id"].'">'.$value["name"].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    					<input type="number" name="phone" min="20000000" class="form-control input-lg" required placeholder="Telefono">
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-map"></i></span>
                    			<input type="text" name="address" class="form-control input-lg" placeholder="Direccion de la Sucursal">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		                    			<input type="date" name="opening_date" required placeholder="Fecha de Apertura" class="form-control input-lg">
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-check"></i></span>
                    					<select name="status" class="form-control input-lg">
                    						<option value="">Seleccione Estado</option>
                    						<option value="0">Inactiva</option>
                    						<option value="1">Funcionando</option>
                    					</select>
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn-primary btn">Guardar Sucursal</button>
                        <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="mdlEditStore">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="EditForm" action="<?= base_url()?>Sucursales/Editar/">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Sucursal</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                    			<input type="text" name="name" id="name" required placeholder="Nombre de Sucursal" class="form-control input-lg">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-user"></i></span>
		                    			<select name="employee_id" id="employee_id" class="form-control input-lg" required>
		                    				<option value="">Encargado</option>
		                    				<?php 
                                                if(isset($usuarios)) {
                                                    foreach ($usuarios as $key => $value) {
                                                        if($value["profile"] == "2") {
                                                            echo '<option value="'.$value["user_id"].'">'.$value["name"].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    					<input type="number" id="phone" name="phone" min="20000000" class="form-control input-lg" required placeholder="Telefono">
                    				</div>
                    			</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-map"></i></span>
                    			<input type="text" name="address" id="address" class="form-control input-lg" placeholder="Direccion de la Sucursal">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		                    			<input type="date" name="opening_date" id="opening_date" required placeholder="Fecha de Apertura" class="form-control input-lg">
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-check"></i></span>
                    					<select name="status" id="status" class="form-control input-lg">
                    						<option value="">Seleccione Estado</option>
                    						<option value="0">Inactiva</option>
                    						<option value="1">Funcionando</option>
                    					</select>
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