<div class="content-wrapper">
    <section class="content-header">
        <h1><i class="fa fa-cart-arrow-down"></i> Registrar Compra</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Registrar Compra</li>
        </ol>
    </section>
    <section class="content">
        <form method="POST" action="<?= base_url()?>Compras/Crear">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <select name="provider_id" id="provider_id" required class="form-control">
                                    <option value="">-Seleccione Proveedor-</option>
                                    <?php
                                        if(@isset($proveedores)) {
                                            foreach ($proveedores as $key => $value) {
                                    ?>
                                        <option value="<?= $value["provider_id"]?>"><?= $value["name"]?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="date" name="purchase_date" value="<?= date("Y-m-d")?>" placeholder="Fecha Compra" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size: 1px">&nbsp;</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="radio" class="minimal" name="doc_type" value="Credito" id="Credito">
                                        <label for="Credito">&nbsp; &nbsp;Factura al Crédito</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" checked class="minimal" name="doc_type" value="Contado" id="Contado">
                                        <label for="Contado">&nbsp; &nbsp;Factura al Contado</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" placeholder="No. Factura" name="purchase_code" required class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="1-<?= date("Ymdhis").rand(100,200)?>" id="order_id" name="order_id" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <select name="status" required class="form-control" id="">
                                    <option value="">-Seleccione Estado-</option>
                                    <option value="2">Pendiente</option>
                                    <option value="1">Cancelado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-right">
                                <button class="btn btn-info btn-sm" id="openModal">Agregar Producto</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped dt-responsive tbl-compras-prod">
                                <thead>
                                    <th style="width: 15px;" id="thd">Cant.</th>
                                    <th style="width: 90px">Codigo</th>
                                    <th>Descripcion</th>
                                    <th style="width: 60px">Precio Unit.</th>
                                    <th style="width: 60px">Precio Total</th>
                                    <th style="width: 70px">Acciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <b><i class="fa fa-list-ul"></i> &nbsp;Detalles de la Orden</b>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td class="text-right">Total de Productos :</td>
                                    <td class="text-left product-amount"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Precio sin Impuestos :</td>
                                    <td class="text-left no-taxes-price"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">IVA (13%) :</td>
                                    <td class="text-left iva-amount"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">CESC (5%) :</td>
                                    <td class="text-left cesc-amount"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Total :</td>
                                    <td class="text-left total-amount"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="min-width: 60px">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button class="btn btn-lg btn-success">
                                            <i class="fa fa-save"></i> Guardar Compra
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<div class="modal fade mdf" role="dialog" id="mdlAddItem">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <button class="close mdl-close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Producto</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" id="tab_1_link" data-toggle="tab">Producto</a></li>
                            <li><a href="#tab_2" id="clicks" data-toggle="tab">Tallas</a></li>
                            <li class="pull-right"><a href="#" class="text-muted txt-lnk"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-striped dt-responsive dt-modal-compras" style="width: 100%">
                                            <thead>
                                                <th>Codigo</th>
                                                <th>Descripcion</th>
                                                <th>Precio Costo</th>
                                                <th>Utilidad</th>
                                                <th>Precio Venta</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CAT-BK-092</td>
                                                    <td>ZAPATOS CATERPILLAR NEGRO</td>
                                                    <td>$56.2</td>
                                                    <td>50 %</td>
                                                    <td>$74.30</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm btn-check"><i class="fa fa-check"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="tallas" size="8" id="select-tallas" class="form-control" id="">
                                                    <option value="25">Talla 25</option>
                                                    <option value="26">Talla 26</option>
                                                    <option value="27">Talla 27</option>
                                                    <option value="28">Talla 28</option>
                                                    <option value="29">Talla 29</option>
                                                    <option value="30">Talla 30</option>
                                                    <option value="31">Talla 31</option>
                                                    <option value="32">Talla 32</option>
                                                    <option value="33">Talla 33</option>
                                                    <option value="34">Talla 34</option>
                                                    <option value="35">Talla 35</option>
                                                    <option value="36">Talla 36</option>
                                                    <option value="37">Talla 37</option>
                                                    <option value="38">Talla 38</option>
                                                    <option value="39">Talla 39</option>
                                                    <option value="40">Talla 40</option>
                                                    <option value="41">Talla 41</option>
                                                    <option value="42">Talla 42</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <br><br>
                                                <input type="number" class="form-control" id="cantidad-talla" placeholder="Cantidad">
                                                <br>
                                                <div class="text-center">
                                                    <button class="btn btn-info btn-agregar-tallas">Agregar Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <table class="table table-bordered tbl-revisar-tallas" style="width: 100%">
                                            <thead>
                                                <th>Talla</th>
                                                <th>Cantidad</th>
                                                <th style="width: 20px"></th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button class="btn-primary btn btn-asignar-item">Guardar</button>
                    <button class="btn btn-default mdl-close" data-dismiss="modal">Cerrar</button>
                </div>
                <button class="btn btn-default mdl-cerrar" data-dismiss="modal" style="display: none">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="mdlDetalleTallas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #3c8dbc; color: white;">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalle de Tallas Compradas</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <table class="table table-bordered tbl-revisar-tallas-2" style="width: 100%">
                        <thead>
                            <th>Talla</th>
                            <th>Cantidad</th>
                            <th style="width: 20px"></th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>