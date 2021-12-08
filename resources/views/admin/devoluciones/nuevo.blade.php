@extends('layouts.admin')
@section('title', 'Ventas')
@push('scripts')		
	<script type="text/javascript">
		var buscar_cliente_url = "{{ url('clientes/buscar?texto=') }}";
		var buscar_prodcto_url = "{{ url('productos/buscar?texto=') }}";
		var comprobante_vistaprevia_url = "{{ url('comprobantes/vistaPrevia') }}";
		var buscar_proveedor_url = "{{ url('proveedores/buscar?texto=') }}";
	</script>
	<script src="{{ asset('js/forms/compras.js') }}"></script>
	<script>
		     
		$(document).ready(function (){
		   
		    //Define la cantidad de numeros aleatorios.
		var cantidadNumeros = 8;
		var myArray = []
		while(myArray.length < cantidadNumeros ){
		  var numeroAleatorio = Math.ceil(Math.random()*cantidadNumeros);
		  var existe = false;
		  for(var i=0;i<myArray.length;i++){
		    if(myArray [i] == numeroAleatorio){
		        existe = true;
		        break;
		    }
		  }
		  if(!existe){
		    myArray[myArray.length] = numeroAleatorio;
		  }

		}
		$('#txtNumeroComprobante').val(myArray.join(""));
		  });
</script>
@endpush

@section('content')
<div class="container">
	<div class="row">    
		<div class="col-md-12">
			<div class="card card-line-primary">
				<div class="card-header">
				<h4>Ingreso de venta</h4> 
				
				</div>                
				<div class="card-body">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/devoluciones" class="link_ruta">
								Listado de devoluciones &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/devoluciones/nuevo" class="link_ruta">
								Nuevo
							</a>
						</li>						
					</ul>
					
					
					<form id="formNuevoComprobante" action="/devoluciones/guardar" method="post">
					{{ csrf_field() }}
						<div class="modal fade" id="modalDescripcion" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<legend>Agregar información</legend>
									</div>

									<input type="hidden" name="usuario_id" id="usuario_id" value="{{Auth::user()->id}}">

									<div class="modal-body">
										<div class="form-group">
											<input maxlength="60" class="form-control" type="text" name="descripcion_1" placeholder="Línea 1">
											<input maxlength="60" class="form-control" type="text" name="descripcion_2" placeholder="Línea 2">
											<input maxlength="60" class="form-control" type="text" name="descripcion_3" placeholder="Línea 3">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-block blue darken-4 text-white" data-dismiss="modal">Confirmar</button>
									</div>        
								</div>
							</div>
						</div>
						<input id="hiddenListado" type="hidden" name="listadoArticulos">
						<div class="row">
							<div class="col-md-12"><br>
								<fieldset>
									<div class="row">
										<div class="form-group col-md-4">
									
										<label  for="txtFecha">Fecha de emisión</label>
										<input id="txtFecha" type="date" name="fecha_emision" class="form-control input-sm">
									</div><br><br>
										<div class="form-group col-md-4">
										<label  for="selectTipoDevolucion">Tipo de devolución</label>
										<select id="selectTipoDevolucion" name="tipo_devolucion" class="form-control input-sm" tabindex="2">
										@php
                        $tipodevolucion = App\Models\TipoDevoluciones::get();
                    @endphp	
                    @foreach($tipodevolucion as $t)
                    <option value="{{$t->id}}">{{$t->descripcion}}</option>
                    @endforeach										
										</select>
									</div>
									<div class="form-group col-md-4 form_venta_contado form_factura_credito form_devolucion_contado">
										<label  for="txtSerieComprobante">Número de devolución</label>
										<input name="serie" type="text" class="form-control input-sm"  id="txtNumeroComprobante" >
									</div>
									<div class="form-group col-md-4 form_devolucion_dinero">
										<label  for="txtSerieComprobante">Cotización</label>
										<input name="cotizacion" type="text" class="form-control input-sm" placeholder="Cotización del dólar">
									</div>
										<div class="form-group col-md-4 form_devolucion_dinero ">
										<label  for="txtMoneda">Moneda</label>
                    @php
                        $monedas = App\Models\Moneda::get();
                    @endphp	
										<select name="moneda" class="form-control input-sm" tabindex="4">
											@foreach($monedas as $moneda)
													<option value="{{$moneda->id}}" 
                            selected="true">{{$moneda->nombre}} ({{$moneda->simbolo}})</option>
											@endforeach
										</select>
									</div>
                  <div class="form-group col-md-4 form_devolucion_dinero">
										<label  for="txtCantidadDinero">Cantidad de dinero devuelto</label>
										<input 
                    name="cantidad_devolucion" 
                    type="text" 
                    class="form-control input-sm" 
                    id="txtCantidadDinero" 
                    placeholder="Cantidad de dinero devuelto">
									</div>
									<div class="form-group col-md-12">		
                    <label class="mt-1">Sucursal</label>
                    @php
                        $sucursales = App\Models\Sucursales::pluck('nombre','id');
                    @endphp
                      {!! Form::select('sucursal_id', $sucursales, null,array('class' => 'form-control input-sm','placeholder'=>'Selecione la sucursal','id'=>'sucursal_id')) !!} 
                       </div>                 
									</div>
									<br>

								</fieldset>
							</div>
							
							<div class="col-md-12">
								<fieldset>
									<legend>
									<div class="row container form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<div class="col-md-6">
											Buscar producto devuelto
										</div>
										<div class="col-sm-6">
											<div class="input-group float-right">
												<form>
													<input type="text" class="form-control input-sm" id="txtAgregarArticulo" list="listaBusquedaProducto" placeholder="Agregar un artículo..." onkeydown="if (event.keyCode == 13) return false;" tabindex="1">
													<div class="input-group-btn">
														<button id="btnAgregarArticulo" class="btn blue darken-4 text-white btn-md mb-2">
															<i class="fa fa-cart-plus" aria-hidden="true"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
					
										
										 
										<datalist id="listaBusquedaProducto">
											<!--
											<option value="a"/>
											<option value="b"/>
											<option value="c"/>
											-->
										</datalist>
									</div>
									</legend>
									<div class="col-md-12 pre-scrollable div-detalle-comprobante form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<table width="100%" class="table table-responsive table-hover">
											<thead>
												<tr>
													<th class="text-center" width="100px">Código</th>
													<th class="text-center">Artículo</th>
													<th class="text-center" width="200px">Precio</th>
													<th class="text-center" width="200px">Cantidad</th>
													<th class="text-center" width="200px">Subtotal</th>
													<th class="text-center" width="200px">Total</th>
													<th class="text-center" width="200px"></th>
												</tr>
											</thead> 
											<tbody id="tablaProductos">
												
											</tbody>
										</table><br><br><br><br><br>	
									
									<div class="col-md-12 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<table class="table-condensed float-right table-striped">
											<thead id="tablaResumen">
												
											</thead>
										</table>
									</div>		
									<div class="col-md-6 form_venta_contado form_factura_credito form_devolucion_contado form_compra_contado">
										<button id="btnGuardarComprobante" class="btn btn-block text-white blue darken-4" tabindex="9">
											<i class="ti ti-check mr-3"></i>
											Confirmar
										</button>
									</div>
								</fieldset>                                
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal  fade" id="modalAgregarPorducto" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<legend>Agregar artículo</legend>
			</div>

			<div class="modal-body">
				
			</div>

			<div class="modal-footer">
				
			</div>        
		</div>
	</div>
</div>

@endsection
@push('scripts')
<script type="text/javascript">
  	
  $(document).ready(function(){
    $(".form_devolucion_dinero").hide();
    
    $("#selectTipoDevolucion").on('change', function(){
      if($("#selectTipoDevolucion").val() == 2){
        $(".form_devolucion_dinero").show();
        
      }else{

        $(".form_devolucion_dinero").hide();
        
      }
    });
  });
</script>
@endpush