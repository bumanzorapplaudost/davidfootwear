<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-cubes"></i> Gestion de Bodegas</h1>
		<ol class="breadcrumb">
		  <li><a href="<?= base_url()?>POS/Inicio"><i class="fa fa-home"></i> Inicio</a></li>
		  <li class="active">Bodegas</li>
		</ol>
	</section>
	<section class="content">
	<div class="box">
	  <div class="box-header with-border">
	    <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddWarehouse" ><i class="fa fa-plus"></i> Agregar Bodega</button>
	  </div>
	  <div class="box-body">
	    <table class="table table-bordered table-striped dt-responsive warehouse-table" width="100%">
	      <thead>
	        <th style="width: 20px">No.</th>
	        <th>Codigo</th>
	        <th>Descripcion</th>
	        <th>Sucursal</th>
	        <th>Encargado</th>
	        <th>Acciones</th>
	      </thead>
	      <tbody>
	      </tbody>
	    </table>
	  </div>
	</div>
	</section>
</div>

<div class="modal fade" role="dialog" id="mdlAddWarehouse">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?= base_url()?>Bodegas/Crear">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Bodega</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                    			<input type="text" name="description" required placeholder="Descripcion" class="form-control input-lg">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-code"></i></span>
                    					<input type="number" name="code" min="1" class="form-control input-lg" required placeholder="Codigo">
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-user"></i></span>
		                    			<select name="employee_id" class="form-control input-lg">
		                    				<option value="">-Encargado-</option>
		                    				<?php 
                                                if(isset($usuarios)) {
                                                    foreach ($usuarios as $key => $value) {
                                                        echo '<option value="'.$value["user_id"].'">'.$value["name"].'</option>';
                                                    }
                                                }
                                            ?>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-map"></i></span>
                    			<select name="store_id" class="form-control input-lg">
                    				<option value="">-Seleccione una Sucursal-</option>
                    				<?php 
                                        if(isset($sucursales)) {
                                            foreach ($sucursales as $key => $value) {
                                                echo '<option value="'.$value["store_id"].'">'.$value["name"].'</option>';
                                            }
                                        }
                                    ?>
                    			</select>
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

<div class="modal fade" role="dialog" id="mdlEditWarehouse">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="EditForm" action="<?= base_url()?>Bodegas/Editar/">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Bodega</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-th-large"></i></span>
                    			<input type="text" name="description" id="description" required placeholder="Descripcion" class="form-control input-lg">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-code"></i></span>
                    					<input type="number" name="code" id="code" min="1" class="form-control input-lg" required placeholder="Codigo">
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-user"></i></span>
		                    			<select name="employee_id" id="employee_id" class="form-control input-lg">
		                    				<option value="">-Encargado-</option>
		                    				<?php 
                                                if(isset($usuarios)) {
                                                    foreach ($usuarios as $key => $value) {
                                                        echo '<option value="'.$value["user_id"].'">'.$value["name"].'</option>';
                                                    }
                                                }
                                            ?>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-map"></i></span>
                    			<select name="store_id" id="store_id" class="form-control input-lg">
                    				<option value="">-Seleccione una Sucursal-</option>
                    				<?php 
                                        if(isset($sucursales)) {
                                            foreach ($sucursales as $key => $value) {
                                                echo '<option value="'.$value["store_id"].'">'.$value["name"].'</option>';
                                            }
                                        }
                                    ?>
                    			</select>
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