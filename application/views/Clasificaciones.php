<div class="content-wrapper"> 
    <section class="content-header">
      <h1><i class="fa fa-th-large"></i> &nbsp;Gestion de Clasificaciones</h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Clasificaciones</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#mdlAddCategory">
            <i class="fa fa-plus"></i> &nbsp;
            Agregar Clasificacion
          </button>
        </div>
        <div class="box-body" id="ajx_categories">
         <table class="table table-bordered table-striped dt-responsive cat-table" width="100%">
          <thead>
             <th style="width:10px">No.</th>
             <th>Categoria</th>
             <th>Fecha Registro</th>
             <th>Acciones</th>
          </thead>
          <tbody>
          </tbody>
         </table>
        </div>
      </div>
    </section>
</div>


<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="mdlAddCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" action="<?= base_url()?>Clasificaciones/Crear">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Clasificacion</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="category" placeholder="Ingresar categoría" required>
              </div>
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
            <div class="btn-group">
               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i>&nbsp;
                  Guardar Categoría
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
<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->
<div id="mdlEditCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" id="EditForm" action="<?= base_url()?>Clasificaciones/Editar/">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar categoría</h4>
        </div>
        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" id="ecategory-name" name="category" placeholder="Ingresar Clasificacion" required>
              </div>
            </div>
          </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->
        <div class="modal-footer">
          <div class="form-group">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>