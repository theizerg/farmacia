<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log\LogSistema;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        if (\Auth::guest()) {
            return redirect('/login');
        }
        if (! $request->user()->can($permission)) {

            $log = new LogSistema();
            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha intentado ingresar al módulo para '.$permission.' del sistema a las: '. date('H:m:i').' del día: '.date('d/m/Y').' El usuario fue redirigido a la página de inicio, ya que no tiene el debido permiso para acceder dicho módulo.';
            $log->save();
            $notification = array(
                'message' => '¡Acceso denegado!',
                'alert-type' => 'error'
            );
             return \Redirect::to('/')->with($notification);
        }
       
        return $next($request);
    }
}
