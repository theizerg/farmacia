@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<section class="container">
    @if ( Auth::user()->hasRole('Super Administrador'))
      
  
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box blue darken-3 text-white">
              <div class="inner">
                <h3>{{ App\Models\User::count() }}</h3>

                <p>Usuarios registrados.</p>
              </div>
                <div class="icon">
                   <i class="fas fa-user-tie"></i>
                </div>
                </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box green darken-3 text-white">
                  <div class="inner">
                    <h3>{{Spatie\Permission\Models\Role::count()}}</h3>

                    <p>Roles registrados.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-lock"></i>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box purple darken-3 text-white">
                  <div class="inner">
                    <h3>{{Spatie\Permission\Models\Permission::count()}}</h3>

                    <p>Permisos registrados.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-lock-open"></i>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box orange darken-3 text-white">
                  <div class="inner">
                    <h3> {{App\Models\Log\LogSistema::count()}}</h3>

                    <p>Histórico del sistema.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-file-archive"></i>
                    </div>
              </div>
          </div>
    </div>

    
</div>
      
   
@elseif (\Auth::user()->hasRole('Gerente'))
      <div class="col-sm-12">
            <div class="card card-line-primary">
                <div class="row">
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Empleados</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-user-tie fa-4x text-primary"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{ App\Models\Empleado::count() }}</h3>
                                    <p class="mr-4">Empleados registrados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Sucursales</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-store-alt fa-4x green-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="mr-icon-arrow-up-circle"></i> {{ App\Models\Sucursales::count() }}</h3>
                                    <p class="mr-4">Sucursales registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Productos</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-handshake fa-4x red-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{ App\Models\Producto::count() }}</h3>
                                    <p class="mr-4">Productos registrados en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Ventas</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-dollar-sign fa-4x yellow-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{  App\Models\Comprobante::count() }}</h3>
                                    <p class="mr-4"> Ventas realizadas en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    <div class="row">  
     <div class="col-lg-12">
        <div class="card card-statistics card-line-primary">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="title"> Márgen de ventas</h4>
                </div>
            </div>
            <div class="card-body">
               <div class="apexchart-wrapper">
                <div id="ventas"  ></div>
            </div>
            </div>
        </div>
       </div>   
         <div class="col-lg-12">
        <div class="card  card-line-primary">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="title"> Márgen de ventas</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="apexchart-wrapper">
                <div id="detalleventas"  ></div>
            </div>
            </div>
        </div>
    </div>     
   <div class="col-sm-6">
     <div class="card card-line-primary">
       <div class="card-header">
         <p class="text-center">
           Gastos y Ganancias
         </p>
       </div>
       <div class="card-body">
          <div class="fa-10x" id="c3demo59"></div>
       </div>
     </div>
   </div>
   <div class="col-sm-6">
     <div class="card card-line-primary">
       <div class="card-header">
         <p class="text-center">
           Gastos y Ganancias
         </p>
       </div>
       <div class="card-body">
          <div class="fa-10x"  id="GananciasGastos"></div>
       </div>
     </div>
   </div>
<div class="col-lg-12">
        <div class="card card-statistics card-line-primary">
            <div class="card-header">
                <div class="card-heading">
                    <h4 class="title"> Márgen de ganacias por días o semanas</h4>
                </div>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-sm-12">
                        <div class=" card-statistics mb-30">
                           <form method="post" action="{{url('ventas/desgloce')}}" autocomplete="off" id="empleados_form">
                                    {{ csrf_field() }}
                              
                                 <div class="card-header">
                                <h4 class="card-title">Buscar por rango de fechas</h4>
                                 </div>
                               <div class="input-group" data-date="23/11/2018" data-date-format="dd/mm/yyyy">
                                
                                 <input id="txtFecha" type="date" name="desde" class="form-control input-sm" title="Fecha del recibo">
                                <input id="txtFecha" type="date" name="hasta" class="form-control input-sm" title="Fecha del recibo">
                               </div>
                       <br>
                        <button type="submit" class="btn btn-primary form-control text-white"> Buscar</button>
                        </div>
                     </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
   
</div>
@else 
<div class="col-sm-12">
            <div class="card card-line-primary">
                <div class="row">
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Productos</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 mdi mdi-apple fa-4x text-primary"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{ App\Models\Producto::count() }}</h3>
                                    <p class="mr-4">Productos registrados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Proveedores</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-store-alt fa-4x green-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="mr-icon-arrow-up-circle"></i> {{ App\Models\Proveedor::count() }}</h3>
                                    <p class="mr-4">Proveedores registradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Clientes</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-handshake fa-4x red-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{ App\Models\Cliente::count() }}</h3>
                                    <p class="mr-4">Clientes registrados en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-6">
                        <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                            <div class="d-flex m-b-10">
                                <p class="ml-5 mt-3 font-regular text-muted font-weight-bold">Ventas</p>
                                
                            </div>
                            <div class="d-block d-sm-flex h-100 align-items-center">
                                <div class="apexchart-wrapper">
                                    <i class="ml-4 mb-4 fas fa-dollar-sign fa-4x yellow-text"></i>
                                </div>
                                <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                    <h3 class="mb-0 mr-4"><i class="icon-arrow-up-circle"></i>{{  App\Models\Comprobante::count() }}</h3>
                                    <p class="mr-4"> Ventas realizadas en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif




</section>
@endsection
@if (\Auth::user()->hasRole('Gerente'))
@push('scripts')
  <script>
      var c3demo59 = jQuery("#c3demo59");
        if (c3demo59.length > 0) {
            var chart = c3.generate({
                bindto: '#c3demo59',
                data: {
                    columns: [
                        ["Gastos", {{ $gastos }}],
                        ["Ganancias",{{ $ganancias }}],
                       
                    ],
                    colors: {
                        Gastos: '#E95454',
                        Ganancias: '#4776E6',
                    },
                    type: 'pie'
                }
            });
        }

    var GananciasGastos = jQuery("#GananciasGastos");
    if (GananciasGastos.length > 0) {
        var chart = c3.generate({
            bindto: '#GananciasGastos',
            data: {
                columns: [
                    ['Ganancias', {{ $ganancias }}],
                    ['Gastos', {{ $gastos }}]
                ],
                colors: {
                    Ganancias: '#4776E6',
                    Gastos: '#E95454'
                },
                types: {
                    Ganancias: 'bar',
                    Gastos: 'bar'
                }
            }
        });
    }

    var ventas = jQuery('#ventas')
                if (ventas.length > 0) {
                  var options = {
                    chart: {
                        height: 350,
                        type: 'line',
                        shadow: {
                            enabled: false,
                            color: '#bbb',
                            top: 3,
                            left: 2,
                            blur: 3,
                            opacity: 1
                        },
                    },
                    stroke: {
                        width: 7,   
                        curve: 'smooth'
                    },
                    series: [{
                        name: 'Cantidad de ventas',
                        data: [{{ $venta_count_1 }}, {{ $venta_count_2 }},{{ $venta_count_3 }},{{ $venta_count_4 }}]
                    }],
                    xaxis: {
                        type: 'datetime',
                        categories: [
                    '{{Carbon\Carbon::now()->subMonths(0)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}'],
                    },
                    title: {
                        text: 'Ventas realizadas en los últimos 4 meses',
                        align: 'left',
                        style: {
                            fontSize: "20px",
                            color: '#666'
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            gradientToColors: [ '#8E54E9'],
                            shadeIntensity: 1,
                            type: 'horizontal',
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100, 100, 100]
                        },
                    },
                    markers: {
                        size: 4,
                        opacity: 0.9,
                        colors: ["#2bcbba"],
                        strokeColor: "#fff",
                        strokeWidth: 2,
                         
                        hover: {
                            size: 7,
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 40,
                        title: {
                            text: 'Cantidad de ventas realizadas',
                        },                
                    }
                }
        
               var chart = new ApexCharts(
                    document.querySelector("#ventas"),
                    options
                );
                
                chart.render();
                }
    // Get Canvas element by its id
        var detalleventas = jQuery('#detalleventas')
                if (detalleventas.length > 0) {
                  var options = {
                    chart: {
                        height: 350,
                        type: 'line',
                        shadow: {
                            enabled: false,
                            color: '#bbb',
                            top: 3,
                            left: 2,
                            blur: 3,
                            opacity: 1
                        },
                    },
                    stroke: {
                        width: 7,   
                        curve: 'smooth'
                    },
                    series: [{
                        name: 'Cantidad de ventas',
                        data: [{{ $venta_detalle_1 }},{{ $venta_detalle_2 }},{{ $venta_detalle_3 }},{{ $venta_detalle_4 }}]
                    }],
                    xaxis: {
                        type: 'datetime',
                        categories: [
                    '{{Carbon\Carbon::now()->subMonths(0)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(1)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(2)->toFormattedDateString()}}',
                    '{{Carbon\Carbon::now()->subMonths(3)->toFormattedDateString()}}'],
                    },
                    title: {
                        text: 'Dinero entrante de ventas relizadas en los últimos 4 meses',
                        align: 'left',
                        style: {
                            fontSize: "20px",
                            color: '#666'
                        }
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            gradientToColors: [ '#8E54E9'],
                            shadeIntensity: 1,
                            type: 'horizontal',
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 100, 100, 100]
                        },
                    },
                    markers: {
                        size: 4,
                        opacity: 0.9,
                        colors: ["#2bcbba"],
                        strokeColor: "#fff",
                        strokeWidth: 2,
                         
                        hover: {
                            size: 7,
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 10000,
                        title: {
                            text: 'Dinero entrante de ventas relizadas en los últimos 4 meses',
                        },                
                    }
                }
        
               var chart = new ApexCharts(
                    document.querySelector("#detalleventas"),
                    options
                );
                
                chart.render();
                }
        
  </script>
  @endpush
@endif
 
