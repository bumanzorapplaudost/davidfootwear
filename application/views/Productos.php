<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-product-hunt"></i> Gestion de Productos</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Productos</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">    
                <button data-toggle="modal" data-target="#mdlAddProduct" class="btn btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Agregar Producto
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tbl_productos dt-responsive ">
                    <thead>
                        <th style="width: 20px">No.</th>
                        <th>Código</th>
                        <th>Descripcion</th> <!--Categoria Marca Genero Color-->
                        <th>Foto</th>
                        <th>Tallas</th>
                        <th>Precio Costo</th>
                        <th>Utilidad</th>
                        <th>Precio Venta</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                </table>
          </div>
        </div>
    </section>
</div>

<div class="modal fade" role="dialog" id="mdlAddProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="<?= base_url()?>Productos/Crear">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>
                                <select name="brand_id" class="form-control input-lg" required>
                                    <option value="">-Seleccione Marca-</option>
                                    <?php
                                        if(isset($marcas)) {
                                            foreach ($marcas as $key => $value) {
                                                echo '<option value="'.$value["brand_id"].'">'.$value["brand"].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="text" placeholder="Codigo" name="code" required class="form-control input-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hashtag"></i></div>
                                        <input type="number" min="0" name="min_stock" placeholder="Cant. Minima" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                        <select class="form-control input-lg" name="category_id" required>
                                            <option value="">-Seleccione Categoria-</option>
                                            <?php
                                                if(isset($categorias)) {
                                                    foreach ($categorias as $key => $value) {
                                                        echo '<option value="'.$value["category_id"].'">'.$value["category"].'</option>';
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
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control input-lg" name="color" placeholder="Color" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                        <select class="form-control input-lg" name="gender" required >
                                            <option value="">-Seleccione Genero-</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="B">Niños</option>
                                            <option value="G">Niñas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                        <input class="form-control input-lg" type="number" min="1" step=".01" required name="cost_price" id="cost_price" placeholder="Precio de costo" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input class="form-control input-lg" type="number" min="40" step="1" required name="earning" id="earning" placeholder="Utilidad" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input class="form-control input-lg" type="number" min="1" step="0.01" required name="sell_price" id="sell_price" placeholder="Precio Venta">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">SUBIR IMAGEN</div>
                            <input type="file" class="form-control-file picture_image" name="picture" >
                            <p class="help-block">Peso Maximo 6MB</p>
                            <img src="<?= base_url()?>Components/img/productos/default/anonymous.png" alt="" class="img-thumbnail preview" width="100px" class="preview">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                </div> 
                <input type="hidden" name="status" value="1">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="mdlSizes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #3c8dbc; color: #fff">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ver Tallas</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12" id="ctallas">
                            <table style="width: 100%;" class="table table-bordered table-striped dt-responsive tbl_tallas">
                                <thead>
                                    <th>Talla</th>
                                    <th>Existencias</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="mdlReadPicture">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Fotografía del producto</h4>
            </div-->
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <img src="" id="showedImage" style="width: 400px" alt="">
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn btn-default" data-dismiss="modal">Cerrar</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="mdlEditProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" id="EditForm" action="<?= base_url()?>Productos/Editar/">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>
                                <select name="brand_id" id="brand_id" class="form-control input-lg" required>
                                    <option value="">-Seleccione Marca-</option>
                                    <?php
                                        if(isset($marcas)) {
                                            foreach ($marcas as $key => $value) {
                                                echo '<option value="'.$value["brand_id"].'">'.$value["brand"].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                        <input type="text" name="code" placeholder="Codigo" required class="form-control input-lg" id="code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hashtag"></i></div>
                                        <input type="number" min="0" id="min_stock" name="min_stock" placeholder="Cant. Minima" class="form-control input-lg" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                        <select class="form-control input-lg" id="category_id" name="category_id" required>
                                            <option value="">-Seleccione Categoria-</option>
                                            <?php
                                                if(isset($categorias)) {
                                                    foreach ($categorias as $key => $value) {
                                                        echo '<option value="'.$value["category_id"].'">'.$value["category"].'</option>';
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
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control input-lg" id="color" name="color" placeholder="Color" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                        <select class="form-control input-lg" id="gender" name="gender" required >
                                            <option value="">-Seleccione Genero-</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                            <option value="B">Niños</option>
                                            <option value="G">Niñas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                        <input class="form-control input-lg" type="number" min="1" step=".01" required name="cost_price" id="_cost_price" placeholder="Precio de costo" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input class="form-control input-lg" type="number" min="40" step="1" required name="earning" id="_earning" placeholder="Utilidad" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input class="form-control input-lg" type="number" min="1" step="0.01" required name="sell_price" id="_sell_price" placeholder="Precio Venta">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="panel">IMAGEN DEL PRODUCTO</div>
                            <img src="<?= base_url()?>Components/img/productos/default/anonymous.png" alt="" class="img-thumbnail preview" width="100px" class="preview">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Guardar Cambios
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>