<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

#############################################################################################
##################  Administación del sistema   #############################################
#############################################################################################
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('logins', 'LoginController');
  Route::resource('user',   'UserController');
  Route::resource('permission', 'PermissionController');
  Route::get('logs', 'HomeController@logs')->name('logs');
  Route::resource('roles',   'RolesController');
  Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PRODUCTOS #################################
#############################################################################################

  Route::post('/productos/familiaProductos/nueva', 'ProductoController@nuevaFamiliaProducto');
	Route::get('/productos', 'ProductoController@index');
	Route::get('/productos/movimientos', 'ProductoController@movimientos');
	Route::get('/productos/buscar', 'ProductoController@buscar');		
	Route::get('/productos/nuevo', 'ProductoController@nuevo');
	Route::post('/productos/nuevo', 'ProductoController@guardar');
	Route::post('/productos/editar', 'ProductoController@editar');
	Route::post('/productos/borrar', 'ProductoController@borrar');
	Route::get('/productos/detalle/{codigo}', 'ProductoController@detalle');
	Route::post('/productos/{codigo}/configuracion', 'ProductoController@configuracion');
	Route::post('/productos/{codigo}/ModificarStock', 'ProductoController@movimientoModificarStock');
	Route::get('/productos/{codigo}/NotifStockMin', 'ProductoController@NotifStockMin');
	Route::get('/ganancias','GananciaContoller@ganancias');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE CLIENTES #################################
#############################################################################################

	Route::get('/clientes', 'ClienteController@index');
	Route::get('/clientes/nuevo', 'ClienteController@nuevo');
	Route::post('/clientes/guardar', 'ClienteController@guardar');
	Route::get('/clientes/buscar', 'ClienteController@buscar');
	Route::get('/clientes/detalle/{clienteId}', 'ClienteController@detalle');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
  Route::get('/proveedores', 'ProveedorESController@index');
	Route::get('/proveedores/nuevo', 'ProveedorESController@nuevo');
	Route::post('/proveedores/guardar', 'ProveedorESController@guardar');
	Route::get('/proveedores/detalle/{proveedor_id}', 'ProveedorESController@detalle');
	Route::get('/indicadores/masVendidos/{mes}', 'IndicadoresController@masVendidos');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE EMPLEADOS #################################
#############################################################################################

  Route::resource('/empleados','EmpleadoController');
  Route::get('/asignacion/{empleado_id}','AsignacionTrabajoController@nuevo');
  Route::post('/asignacion/guardar','AsignacionTrabajoController@guardar')->name('asignacion.guardar');
  Route::get('/asignaciones','AsignacionTrabajoController@index');
  Route::get('/asignacion/editar/{empleado_id}','AsignacionTrabajoController@editar');
  Route::put('/asignacion/actualizar/{empleado_id}','AsignacionTrabajoController@actualizar')->name('asignacion.actualizar');
  Route::resource('/empleado/pagos','PagosController');
	Route::get('/pagos/empleado/{id}/imprimir','PagosController@imprimir');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE EMPLEADOS #################################
#############################################################################################

  Route::resource('/gastos','GastosController');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#

#############################################################################################
################################# MOD REGISTRO DE COMPROBANTES ##############################
#############################################################################################

  Route::get('/comprobantes', 'ComprobanteController@index');
	Route::get('/comprobantes/consultas', 'ComprobanteController@consultas');
	//Route::get('/comprobantes/reportes', 'ReportesController@indexComprobantes');
	Route::get('/comprobantes/nuevo', 'ComprobanteController@nuevo');
	Route::get('/comprobantes/detalle/{facturaId}', 'ComprobanteController@detalle');
	Route::get('/comprobantes/imprimir/{facturaId}', 'ComprobanteController@imprimir');
	Route::post('/comprobantes/guardar', 'ComprobanteController@guardar');
	Route::get('/comprobantes/vencimientos', 'ComprobanteController@vencimientos');
	Route::get('/comprobantes/recibos/nuevo/{cliente_id}', 'ComprobanteController@nuevoRecibo');
	Route::post('/comprobantes/recibos/guardar', 'ComprobanteController@guardarRecibo');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE SURSALES ##################################
#############################################################################################

  Route::get('sucursales', 'SucursalesController@index');
	Route::get('/sucursales/nuevo', 'SucursalesController@nuevo');
	Route::post('/sucursales/guardar', 'SucursalesController@guardar');
	Route::get('/sucursales/buscar', 'SucursalesController@buscar');
	Route::get('/sucursales/detalle/{clienteId}', 'SucursalesController@detalle');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE APERTURA ##################################
#############################################################################################

    Route::resource('/apertura','AperturaCajaController');
  	Route::resource('/historial','HistorialCajaController');
  	Route::resource('/cierre','CierreCajaController');
  	Route::post('/ventas/desgloce', 'HomeController@ventadesgloce');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
});
