<aside class="main-sidebar">
   <section class="sidebar">
      <ul class="sidebar-menu">
         <li>
<?php
    if($id == "POS") {

?>
            <a href="Inicio">
               <i class="fa fa-home"></i>
               <span>Inicio</span>
            </a>
         </li>
         <li>
            <a href="Clientes">
               <i class="fa fa-users"></i>
               <span>Clientes</span>
            </a>
         </li>
         <li>
            <a href="Compras">
               <i class="fa fa-cart-arrow-down"></i>
               <span>Compras</span>
            </a>
         </li>
         <li>
            <a href="Productos">
               <i class="fa fa-product-hunt"></i>
               <span>Productos</span>
            </a>
         </li>
         <li>
            <a href="Proveedores">
               <i class="fa fa-bank"></i>
               <span>Proveedores</span>
            </a>
         </li>
         <li>
            <a href="Traslados">
               <i class="fa fa-cubes"></i>
               <span>Traslados</span>
            </a>
         </li>
         <li class="treeview">
            <a href="Ventas">
               <i class="fa fa-money"></i>
               <span>Ventas</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li>
                  <a href="Pedidos">
                     <i class="fa fa-list-ul"></i>
                     <span>Administrar Pedidos</span>
                  </a>
               </li>
               <li>
                  <a href="Ventas">
                     <i class="fa fa-dollar"></i>
                     <span>Administrar Ventas</span>
                  </a>
               </li>
               <li>
                  <a href="POS">
                     <i class="fa fa-plus-circle"></i>
                     <span>Crear Venta</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="header">ADMINISTRACION</li>
         <li>
            <a href="Inventario">
               <i class="fa fa-square"></i>
               <span>Inventario</span>
            </a>
         </li>
         <li class="treeview">
            <a href="Ajustes">
               <i class="fa fa-cog"></i>
               <span>Sistema</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li>
                  <a href="Clasificaciones">
                     <i class="fa fa-th"></i>
                     <span>Clasificaciones</span>
                  </a>
               </li>
               <li>
                  <a href="Marcas">
                     <i class="fa fa-tag"></i>
                     <span>Marcas</span>
                  </a>
               </li>
               <li>
                  <a href="Usuarios">
                     <i class="fa fa-cogs"></i>
                     <span>Usuarios</span>
                  </a>
               </li>
            </ul>
         </li>
<?php
    }
?>
      </ul>
   </section>
</aside>