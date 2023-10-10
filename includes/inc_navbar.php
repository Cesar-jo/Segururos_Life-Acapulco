<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
  <div class="container-fluid">
  <h5 class="img-fluid navbar-brand"> Seguros_Life 
  <img class="img-fluid navbar-brand" src="assets/images/Seguros_Life_FONDO.png" width="50" height="50" alt=""></h5>
    <button class="navbar-toggler rounded" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
       <!-- <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'index' ? 'active' : '') ?>">
          <a class="nav-link" href="index.php">Mis inmueble<span class="count"> -->
       <!-- Vamos a crear la cantidad que tenemos de productos guardados en nuestro carrito -->
        <?php
        if(isset($_SESSION['carrito'])){
          echo count($_SESSION['carrito']);
        }else {
          echo "";
        }
        ?>
        </span>
        </a>
      </li>
        <?php if (cur_user()['rol'] == 1): ?>
       <!-- <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'add' ? 'active' : '') ?>">
          <a class="nav-link" href="add.php">Agregar nuevo</a>
        </li> -->
        

        <div class="navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown <?php echo (isset($data['active']) && $data['active'] == 'admin' ? 'active' : '') ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Administración
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow rounded" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="index.php">Inventario de seguros</a></li>
            <li><a class="dropdown-item" href="add.php">Agregar un nuevo seguro</a></li>
            <li><a class="dropdown-item" href="carterasvencidas.php">Cartera vencida</a></li>
            <li><a class="dropdown-item" href="cuentas_porpagar.php">Cuentas por pagar</a></li>
            <li><a class="dropdown-item" href="conf_clientes.php">Configurar mis clientes</a></li>
            <li><a class="dropdown-item" href="clientes.php">Clientes</a></li>
          </ul>
        </li>
      </ul>
    </div>
       

        <div class=" navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Finanzas
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow rounded" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="tipo_transaccion.php">Tipo de transacción</a></li>
            <li><a class="dropdown-item" href="movimientos.php">Movimientos</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
       

        <div class=" navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Legal
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow rounded" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="gen_contrato.php">Crear contrato</a></li>
            <li><a class="dropdown-item" href="contratos.php">Contratos</a></li>
          </ul>
        </li>
      </ul>
    </div>

        
        <div class=" navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Comercial
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow rounded" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="crm.php">CRM </a></li>
            <li><a class="dropdown-item" href="https://calendar.google.com/">Agendar cita</a></li>
          </ul>
        </li>
      </ul>
    </div>

        <div class=" navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Analisis
          </a>
          <ul class="dropdown-menu dropdown-menu-dark shadow rounded" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="analisis.php">Analisis ejecutivo</a></li>
            <li><a class="dropdown-item" href="index2022.php">Index Acapulco</a></li>
          </ul>
        </li>
      </ul>
    </div>

        <!--<li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link" href="all.php">Todos los productos</a>
        </li>-->
        <?php else: ?>
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'pedidos' ? 'active' : '') ?>">
          <a class="nav-link" href="pedidos.php">Mis inmuebles</a>
        </li>
        <?php if (cur_user()['rol'] == 2): ?>
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'envios' ? 'active' : '') ?>">
          <a class="nav-link" href="envios.php">Envios</a>
        </li>
          <?php endif ?>
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'all' ? 'active' : '') ?>">
          <a class="nav-link" href="all.php">Todos los inmuebles</a>
        </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
      <!--le decimos si esta validada una sesion pues que aparesca un apartado de cerrar sesion, -->
      <!--si no pues que no aparesca en el nav cerrar sesion y va a parecer ingresar -->
        <?php if (valid_session()): ?>
          <li class="nav-item">
          <!-- si esta validada la sesion, nos va a traer nuestro nombre de la base de datos -->
            <a class="nav-link" href="#"><?php echo cur_user()['nombre'] ?></a>
          </li>
          <!-- Como habia dicho si esta validada una sesion va a parecer en el navbar cerrar sesion-->
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'logout' ? 'active' : '') ?>">
            <a class="nav-link" href="logout.php">Cerrar sesión</a>
          </li>
        <?php else: ?>
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'register' ? 'active' : '') ?>">
            <a class="nav-link" href="register.php">Registrarse</a>
          </li>
          <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'login' ? 'active' : '') ?>">
            <a class="nav-link" href="login.php">Ingresar</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- END Navbar -->
