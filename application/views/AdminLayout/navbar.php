<?php date_default_timezone_set("America/El_Salvador"); ?>
<header class="main-header">
  <!--=====================================
  LOGOTIPO
  ======================================-->
  <a href="./" class="logo">
    <!-- logo mini -->
    <span class="logo-mini">D<b>F</b></span>

    <!-- logo normal -->
    <span class="logo-lg">David<b>Footwear</b></span>
  </a>

  <!--=====================================
  BARRA DE NAVEGACIÓN
  ======================================-->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Botón de navegación -->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Expandir menu</span>
    </a>

    <!-- perfil de usuario -->
    <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle">
                <span id="datetime">
                </span>&nbsp;&nbsp;
                <span><?= date("d/m/Y"); ?></span>
            </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url() ?>Components/img/usuarios/default/anonymous.png" class="user-image">
            <span class="hidden-xs">Super Administrador</span>
          </a>
          <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url() ?>Components/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">
                <p><b>Super Administrador</b> <br><small>Administrador</small></p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="logout" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
        </li>
      </ul>
    </div>
  </nav>
 </header>