<div class="content-wrapper"> 
    <section class="content-header">
      <h1><i class="fa fa-th-large"></i> &nbsp;Gestion de Pedidos</h1>
      <ol class="breadcrumb">
        <li><a href="Inicio"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Pedidos</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddOrder">
          	<i class="fa fa-plus-circle"></i>
            <br>Crear Pedido
          </button>
        </div>
        <div class="box-body" id="ajx_categories">
         <table class="table table-bordered table-striped dt-responsive orders-table" width="100%">
          <thead>
             <th style="width:10px">No.</th>
             <th>No. Pedido</th>
             <th>Estado</th>
             <th>Total</th>
             <th>Productos</th>
             <th>Usuario</th>
             <th>Acciones</th>
          </thead>
          <tbody>
          	<tr>
          		<td>1</td>
          		<td>1-19019091090</td>
          		<td><span class="text-primary"><b>Abierto</b></span></td>
          		<td><b>$ 12.83</b></td>
          		<td>4</td>
          		<td>BUMANZOR</td>
          		<td>
          			<div class="btn-group">
          				<button class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
          				<button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
          				<button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
          			</div>
          		</td>
          	</tr>
          	<tr>
          		<td>1</td>
          		<td>1-19019091090</td>
          		<td><span class="text-warning"><b>En Progreso</b></span></td>
          		<td><b>$ 26.92</b></td>
          		<td>4</td>
          		<td>AMIHERNANDEZ</td>
          		<td>
          			<div class="btn-group">
          				<button class="btn btn-warning btn-sm" disabled><i class="fa fa-pencil"></i></button>
          				<button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
          				<button class="btn btn-danger btn-sm" disabled><i class="fa fa-times"></i></button>
          			</div>
          		</td>
          	</tr>
          	<tr>
          		<td>1</td>
          		<td>1-19019091090</td>
          		<td><span class="text-success"><b>Cerrado</b></span></td>
          		<td><b>$ 0.70</b></td>
          		<td>4</td>
          		<td>YHERNANDEZ</td>
          		<td>
          			<div class="btn-group">
          				<button class="btn btn-warning btn-sm" disabled><i class="fa fa-pencil"></i></button>
          				<button class="btn btn-primary btn-sm" disabled><i class="fa fa-eye"></i></button>
          				<button class="btn btn-danger btn-sm" disabled><i class="fa fa-times"></i></button>
          			</div>
          		</td>
          	</tr>
          </tbody>
         </table>
        </div>
      </div>
    </section>
</div>

<div id="mdlAddOrder" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 1100px">
    <div class="modal-content">
      <form role="form" method="post" action="<?= base_url()?>Pedidos/Crear">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Creación de Pedido</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<div class="col-sm-4">
        			<div class="input-group">
	        			<span class="input-group-addon"><b>#</b></span>
	        			<input type="text" placeholder="1-XXXXXXXX" disabled class="form-control">
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="input-group">
        				<span class="input-group-addon">Estado</span>
	        			<select name="" readonly class="form-control" id="">
	        				<option value="0">Pendiente</option>
	        			</select>
        			</div>
        		</div>
        		<div class="col-sm-4">
        			<div class="input-group">
        				<input type="text" class="form-control" placeholder="Seleccione Cliente">
        				<span class="input-group-btn">
	        				<button type="button" data-toggle="modal" class="btn btn-primary" data-target="#mdlTest" value="">
	        					<i class="fa fa-search"></i>
	        				</button>
        				</span>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-12">
        			&nbsp;
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-6 text-justify">
        			<table class="table table-bordered table-striped less-padding">
        				<thead>
        					<th style="width: 36px">Cant</th>
        					<th>Producto</th>
        					<th>P. Unitario</th>
        					<th>P. Total</th>
        					<th style="width: 32px">-</th>
        				</thead>
        				<tbody>
        					<tr>
        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
        						<td>LECHE DESCREMADA</td>
        						<td>$ 5.90</td>
        						<td>$ 19.20</td>
        						<td>
        							<button class="btn btn-sm btn-danger btn-delete-product"><i class="fa fa-times"></i></button>
        						</td>
        					</tr>
        					<tr>
        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
        						<td>LECHE DESCREMADA</td>
        						<td>$ 5.90</td>
        						<td>$ 19.20</td>
        						<td>
        							<button class="btn btn-sm btn-danger btn-delete-product"><i class="fa fa-times"></i></button>
        						</td>
        					</tr>
        					<tr>
        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
        						<td>LECHE DESCREMADA</td>
        						<td>$ 5.90</td>
        						<td>$ 19.20</td>
        						<td>
        							<button class="btn btn-sm btn-danger btn-delete-product"><i class="fa fa-times"></i></button>
        						</td>
        					</tr>
        					<tr>
        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
        						<td>LECHE DESCREMADA</td>
        						<td>$ 5.90</td>
        						<td>$ 19.20</td>
        						<td>
        							<button class="btn btn-sm btn-danger btn-delete-product"><i class="fa fa-times"></i></button>
        						</td>
        					</tr>
        					<tr>
        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
        						<td>LECHE DESCREMADA</td>
        						<td>$ 5.90</td>
        						<td>$ 19.20</td>
        						<td>
        							<button class="btn btn-sm btn-danger btn-delete-product"><i class="fa fa-times"></i></button>
        						</td>
        					</tr>
        				</tbody>
        			</table>
        			<table class="table totals">
        				<tr>
        					<td>&nbsp;</td>
        					<td>&nbsp;</td>
        					<td style="text-align: right;"><b>Sub Total:</b> </td>
        					<td style="text-align: right;">$ 53.00</td>
        				</tr>
        				<tr>
        					<td>&nbsp;</td>
        					<td>&nbsp;</td>
        					<td style="text-align: right;"><b>IVA (13%):</b> </td>
        					<td style="text-align: right;">$ 6.89</td>
        				</tr>
        				<tr>
        					<td>&nbsp;</td>
        					<td>&nbsp;</td>
        					<td style="text-align: right;"><b>CESC (5%):</b> </td>
        					<td style="text-align: right;">$ 0.00</td>
        				</tr>
        				<tr>
        					<td>&nbsp;</td>
        					<td>&nbsp;</td>
        					<td style="text-align: right;"><b>Total:</b> </td>
        					<td style="text-align: right;">$ 59.89</td>
        				</tr>
        			</table>
        		</div>
        		<div class="col-sm-6 text-justify">
	        			<table class="table table-bordered table-striped less-padding order-products-table">
	        				<thead>
	        					<th>Cant</th>
	        					<th>Codigo</th>
	        					<th>Producto</th>
	        					<th>Stock</th>
	        					<th>P. Unitario</th>
	        					<th>-</th>
	        				</thead>
	        				<tbody>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        					<tr>
	        						<td><input type="text" style="width: 35px; padding: 0; text-align: center;" class="form-control"></td>
	        						<td>C00X</td>
	        						<td>LECHE DESCREMADA</td>
	        						<td>25</td>
	        						<td>$ 19.20</td>
	        						<td>
	        							<button class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
	        						</td>
	        					</tr>
	        				</tbody>
	        			</table>
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
            <div class="btn-group">
               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i>&nbsp;
                  Enviar a Facturación
               </button>
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                  <i class="fa fa-times"></i>
                  Cerrar
               </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="mdlTest" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" action="<?= base_url()?>Pedidos/Crear">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Creación de Pedido</h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <div class="btn-group">
               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i>&nbsp;
                  Enviar a Facturación
               </button>
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                  <i class="fa fa-times"></i>
                  Cerrar
               </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>