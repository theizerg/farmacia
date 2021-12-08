<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devoluciones;
use App\Models\Moneda;
use App\Models\Producto;

class DevolucionesController extends Controller
{
    





    public  function nuevo()
    {

        return view ('admin.devoluciones.nuevo');
    }


    public function guardar(Request $request)
    {
        $tipo_devolucion = $request->tipo_devolucion;   

        if($tipo_devolucion == 1 || $tipo_devolucion == 2){
            $articulos = json_decode($request->listadoArticulos);

            $devolucion = new Devoluciones();
            $devolucion->moneda()->associate($request->moneda);
            $devolucion->sucursal()->associate($request->sucursal_id);

            if ($request->tipo_devolucion == 1) {
                $devolucion->fecha_emision = $request->fecha_emision;
                for ($i=0; $i < count($articulos); $i++) {
                    $producto = Producto::BuscarPorCodigo($articulos[$i]->codigo)->first();
                    $linea = $articulos[$i];
                    $stock = 0;

                    $stock += $linea->cantidad;
                    $linea->stock = $producto->stock;

                    $producto->stock = $stock + $producto->stock;
                    dd($linea->stock);
                      
                   $producto->save();
                       
    
    
                
                    $compra->total = $compra->iva + $compra->subTotal;               
                    $compra->save();                               
    
    
                   
    
    
                   
                }

                
            }
        
        }
    }
}
