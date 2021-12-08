@extends('layouts.admin')
@section('title', 'Cierre de caja')
@section('content')
<div class="container">
	<div class="row">  
	<div class="btn-group">
		<div class="col-sm-6">
			
		<a class="btn btn-md blue darken-4 text-white mb-3" href="/apertura/create" class="btn btn-link">
			<i class="fa fa-user-plus" aria-hidden="true"></i> Nueva apertura
		</a>

		</div>
	</div>
		<div class="col-md-12">
			<div class="card card-line-primary">
				<div class="card-primary card-outline card-header">
					<h4>Vista general del cierre de caja</h4>
				</div>
				<div class="card-body">
					
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="/" class="link_ruta">
								Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="/apertura" class="link_ruta">
								Apertura
							</a>
						</li>						
					</ul><br>
			
					<div class="table-responsive">
						<table id="example" cellspacing="0" width="100%" class="table table-hover">
							<thead>
							<tr>
								<th class="text-center">ID</th>	
                                <th class="text-center">Efectivo</th>
								<th class="text-center">Punto V.</th>
								<th  class="text-center">Dólares</th>
								<th class="text-center">Transferencia</th>
                                <th  class="text-center">Pago móvil</th>
                                <th  class="text-center">Estado</th>
                                <th  class="text-center">N° Caja</th>
							</tr>
							</thead>
							<tbody>
							@foreach($cierres as $apertura)
							<tr class="text-center">
                                <td>{{$apertura->id_cierre}}</td>		
                                <td>{{$apertura->nu_cantidad_efectivo}}</td>
                                <td>{{$apertura->nu_cantidad_punto_venta}}</td>
                                <td>{{$apertura->nu_cantidad_dolares}}</td>
                                <td>{{$apertura->nu_cantidad_transferencias}}</td>
                                <td>{{$apertura->nu_cantidad_pago_movil}}</td>
                                <td><span class="badge  {{ $apertura->status ? 'badge-success' : 'badge-danger' }}">{{ $apertura->display_status }}</span>	</td>			
								<td>{{$apertura->caja_id}}</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('partials.mensajes');
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

    var table = $('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
            }
        },
    });
    } );
        </script>
@endpush