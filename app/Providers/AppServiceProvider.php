<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
//use App\Model\Negocio\ServicioTipo;
//use App\Model\Negocio\Imagen;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        View::share('appName', "GESTOR DE PROYECTOS");
        View::share('appHtmlName', "<span class=\"logo-l\">λ</span><span class=\"logo-ambda\">ambda</span>to");

        View::share('moraTipoList', ['sin_mora', 'diaria', 'porcentaje']);
        View::share('estadoList', ['activo', 'inactivo', 'archivado']);

        View::share('estadoPedidoList', ['no_entregado', 'cancelado', 'entregado', 'rechazado', 'recibido']);

        View::share('estadosAoI', ['activo', 'inactivo']);
        View::share('tipoIdentificadorCliente', ['ci', 'ruc']);
        View::share('clienteTipoList', ['persona', 'empresa']);
        View::share('tipoVentaList', ['contado', 'credito']);
        View::share('generoList', [
            'NE' => '--', // No Establecido
            'M' => 'Masculino', 
            'F' => 'Femenino',
        ]);
        View::share('estadosSoN', ['NO', 'SI']);

        // View::share(
        //     'tipoProductoList', 
        //     ServicioTipo::where('estado','activo')->get()
        // );

        //View::share('imagenNoDisponible', Imagen::find(0));
        View::share('fechaHoy', \Carbon\Carbon::now());


        // Odontologia
        View::share('examenClinicoList', ['normal', 'alterado']);
        View::share('examenClinicoList2', ['normal', 'gingivitis','periodontitis']);

        Paginator::defaultView('vendor.pagination.bootstrap-4');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');


        View::share('estadosFase', ['abierto', 'bloqueado', 'cerrado']);
        View::share('estadosAoC', ['abierto', 'cerrado']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
