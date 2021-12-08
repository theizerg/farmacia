@extends('layouts.adminfront')


@section('title', 'Login')

@section('content')
  <div class="container-fluid p-0">
     <div class="row no-gutters justify-content-center">
        <div class="col-sm-6 col-lg-5 col-xxl-4  align-self-center order-2 order-sm-1">
            <div class="card-group">
                <div class="card p-4 mt-5 elevation-1">
                    <div class="card-body px-lg-5 py-lg-5">
                        <h1>Iniciar Sesión</h1><!-- <p class="text-muted">ADMIN<br>
                            Email : admin@macbrame.com<br> Pass : macbrame</p> -->
                        <p class="text-muted">Ingresa tu cuenta</p>
                         <form id="main-form" autocomplete="off"><br>
                          <input type="hidden" id="_url" value="{{ url('login') }}">
                          <input type="hidden" id="_redirect" value="{{ url('/') }}">
                          <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            <div class="form-group mb-3">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                </div>
                                <input class="form-control" placeholder="Usuario" 
                                type="text" 
                                name="username" 
                                value="{{ old('username') }}" 
                                required autocomplete="username" 
                                autofocus>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input class="form-control" 
                                placeholder="Contraseña" 
                                type="password" 
                                name="password" 
                                required>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn blue darken-4 form-control" id="boton">
                                        <i class="fas fa-sign-in-alt text-white" 
                                        id="ajax-icon"></i>
                                        <span class="text-white ml-3">
                                             {{ __('Iniciar Sesión') }}
                                        </span>
                                    </button>                           
                                </div>   
                                
                            </div>
                        </form>
                    </div>
                </div><br>
            </div>
        </div>
         <div class="col-sm-6 col-lg-5 col-xxl-4  align-self-center order-2 order-sm-1">
            <div class="card-group">
                <div class="card p-4 mt-5 blue darken-4 elevation-1">
                  <div class="card-header text-white text-center">
                    <h4>VENTAS</h4>
                  </div>
                    <div class="card-body px-lg-5 py-lg-5 text-white  text-center">
                        <i class="mdi mdi-handshake fa-7x"></i>
                        <p class="text-muted text-white">Sistema desarrollado para el control de ventas.</p>
                        
                    </div>
                </div><br>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush

