<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="fa fa-users"></i> Gestion de Usuarios</h1>
		<ol class="breadcrumb">
		  <li><a href="<?= base_url()?>"><i class="fa fa-home"></i> Inicio</a></li>
		  <li class="active">Usuarios</li>
		</ol>
	</section>
	<section class="content">
	<div class="box">
	  <div class="box-header with-border">
	    <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddUser" ><i class="fa fa-plus"></i> Agregar Usuario</button>
	  </div>
	  <div class="box-body">
	    <table class="table table-bordered table-striped dt-responsive users-table" width="100%">
	      <thead>
	        <th style="width: 20px">No.</th>
	        <th>Nombre</th>
	        <th>Usuario</th>
	        <th>Puesto</th>
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

<div class="modal fade" role="dialog" id="mdlAddUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?= base_url()?>Usuarios/Crear">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    	<div class="form-group">
                    		<div class="input-group">
                    			<span class="input-group-addon"><i class="fa fa-user"></i></span>
                    			<input type="text" name="name" required placeholder="Nombre de Empleado" class="form-control input-lg">
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
                    			<div class="form-group">
                    				<div class="input-group">
                    					<span class="input-group-addon"><i class="fa fa-code"></i></span>
                    					<input type="text" name="username" class="form-control input-lg" required placeholder="Usuario">
                    				</div>
                    			</div>
                    		</div>
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
		                    			<select name="profile" class="form-control input-lg" required>
		                    				<option value="">Perfil</option>
		                    				<option value="0">Super Administrador</option>
		                    				<option value="1">Administrador</option>
		                    				<option value="2">Gerente</option>
		                    				<option value="3">Cajero</option>
		                    				<option value="4">Vendedor</option>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		                    			<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña">
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		                    			<input type="password" id="cpassword" class="form-control input-lg" placeholder="Confirmar Contraseña">
		                    		</div>
		                    	</div>
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-sm-6">
		                    	<div class="form-group">
		                    		<div class="input-group">
		                    			<span class="input-group-addon"><i class="fa fa-question"></i></span>
		                    			<select name="status" id="" class="form-control input-lg">
		                    				<option value="">-Estado-</option>
		                    				<option value="1">Activo</option>
		                    				<option value="0">Inactivo</option>
		                    			</select>
		                    		</div>
		                    	</div>
                    		</div>
                    		<div class="col-sm-6">
                    			
                    		</div>
                    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn-primary btn">Registrar Usuario</button>
                        <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>