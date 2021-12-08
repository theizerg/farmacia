<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('images/logo/logo-hexagono.png') }}" alt="AdminLTE Logo" class="brand-image img-circle " style="opacity: .8">
      <span class="brand-text font-weight-light">LARADMIN</span>
    </a> 
<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="info text-white text-center">
    <a href="/" class="d-block h5 ml-1 white-text"> {{auth()->user()->display_name}}</a> 
                                        <span class="bg-success user-status"></span>
    <small class="h7 white-text "> {{ Auth::user()->hasrole('Administrador') ? 'Administrador del sistema' : 'Usuario del sistema' }}</small>
    <br>
      <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="example" class="btn"  data-toggle="tooltip" data-placement="top" title="Tooltip on top">
          <i class="fas fa-sign-out-alt"></i> Salir del sistema
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </div>
</div>
  <!-- SidebarSearch Form -->
<div class="form-inline">
  <div class="input-group mb-3" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Buscar link del menú" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
     <li class="nav-item has-treeview menu-open">
      @if (\Auth::user()->hasRole('Super Administrador'))
        {{-- expr --}}
     
        @can('VerPermisos')
        <a href="#" class="nav-link active">
          <i class="nav-icon mdi mdi-view-dashboard"></i>
          <p>
            Administración
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
         @endcan
        <ul class="nav nav-treeview">
          @can('VerPermisos')
          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="fas fa-users nav-icon text-orange"></i>
              <p>Usuarios</p>
            </a>
          </li>
          @endcan
          @can('VerPermisos')
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon mdi mdi-lock blue-text"></i>
            <p>
              Permisos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <input type="hidden" value="{{$roles = Spatie\Permission\Models\Role::get()}}">
            @foreach ($roles as $role)
            <li class="nav-item">
              <a href="/permission/{{ $role->name }}" class="nav-link">
                <i class="{{$role->icon}} nav-icon"></i>
                <p>{{ $role->name }}</p>
              </a>
            </li>
            @endforeach
          </ul>
        </li>
        @endcan
        @can('VerRole')
          <li class="nav-item">
            <a href="/roles" class="nav-link">
              <i class="fas fa-user-tie nav-icon green-text"></i>
              <p>Roles</p>
            </a>
          </li>
          @endcan
          @can('VerLogins')
          <li class="nav-item">
            <a href="/logins" class="nav-link">
              <i class="fas fa-sign-in-alt nav-icon purple-text"></i>
              <p>Logins</p>
            </a>
          </li>
          @endcan   
           @can('VerLogins')
          <li class="nav-item">
            <a href="/logs" class="nav-link">
              <i class="mdi mdi-light-switch nav-icon red-text"></i>
              <p>Logs del sistema</p>
            </a>
          </li>
          @endcan
        </ul>
        @else
        <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon mdi mdi-view-dashboard"></i>
          <p>
            Oficina
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
         <ul class="nav nav-treeview">
          @can('VerEmpleados')          
            <li class="nav-item">
              <a href="/empleados" class="nav-link">
                <i class="fas fa-users nav-icon text-orange"></i>
                <p>Empleados</p>
              </a>
            </li>
            @endcan
            @can('VerCliente')  
            <li class="nav-item">
              <a href="/clientes" class="nav-link">
                <i class="fas fa-user-tie nav-icon text-blue"></i>
                <p>Clientes</p>
              </a>
            </li>
            @endcan
            @can('VerProveedor')  
            <li class="nav-item">
              <a href="/proveedores" class="nav-link">
                <i class="mdi mdi-hand nav-icon text-pink"></i>
                <p>Proveedores</p>
              </a>
            </li>
            @endcan
            @can('VerProducto')  
            <li class="nav-item">
              <a href="/productos" class="nav-link">
                <i class="mdi mdi-apple nav-icon accent-text"></i>
                <p>Productos</p>
              </a>
            </li>
            @endcan
             @can('VerProducto')  
            <li class="nav-item">
              <a href="/comprobantes" class="nav-link">
                <i class="mdi mdi-handshake nav-icon yellow-text"></i>
                <p>Ventas</p>
              </a>
            </li>
            @endcan
             @can('VerProducto')  
            <li class="nav-item">
              <a href="/comprobantes/vencimientos" class="nav-link">
                <i class="mdi mdi-face nav-icon red-text"></i>
                <p>Facturas</p>
              </a>
            </li>
            @endcan
            @can('VerGastos') 
            <li class="nav-item">
              <a href="/gastos" class="nav-link">
                <i class="nav-icon mdi mdi-calendar green-text"></i>
                <p>Gastos</p>
              </a>
            </li>
            @endcan
            @can('VerGanancias') 
            <li class="nav-item">
              <a href="/ganancias" class="nav-link">
                <i class="mdi mdi-calendar nav-icon purple-text"></i>
                <p>Ganancias</p>
              </a>
            </li>
            @endcan
            @can('VerSucursales') 
            <li class="nav-item">
              <a href="/sucursales" class="nav-link">
                <i class="mdi mdi-store nav-icon red-text"></i>
                <p>Sucursales</p>
              </a>
            </li>
            @endcan
            @can('VerSucursales') 
            <li class="nav-item">
              <a href="/historial" class="nav-link">
                <i class="mdi mdi-cash-register nav-icon yellow-text"></i>
                <p>Historial de caja</p>
              </a>
            </li>
             @endcan
          </ul>
         </li>
          @endif
      </li>
   </ul>
</nav>

 
</div>
<!-- /.sidebar -->