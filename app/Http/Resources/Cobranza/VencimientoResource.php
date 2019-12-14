<?php

namespace App\Http\Resources\Cobranza;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;

class VencimientoResource extends Resource
{
    /**
     * Asigna 
     *      - La cantidad de días de vencimiento, 
     *      - El monto a pagar, sumando los pagos parciales
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $fechaVencimiento = \Carbon\Carbon::createFromFormat(
            'Y-m-d', $this->fecha_vencimiento
        );

        $cantDiasMora = 0;
        $montoMora = 0;
        $montoFraccionado = 0;
        $montoTotalConMora = 0;
        $evitarMora = false;

        if ($fechaVencimiento < Carbon::now()){
            $cantDiasMora = Carbon::now()->diffInDays(
                $fechaVencimiento
            );
            $cantMesMora = Carbon::now()->diffInDays(
                $fechaVencimiento
            );
            $montoMora = $this->contrato->servicio->mora_diaria;
        }

        if (count($this->pagosFraccionados) > 0){
            $montoFraccionado = $this->pagosFraccionados->sum('monto');
        }

        $moraPorCantDiasTotal = $montoMora * $cantDiasMora;
        $montoCuotaConMora = $moraPorCantDiasTotal + $this->monto;
        $montoPorPagar = $montoCuotaConMora - $montoFraccionado;


        return [
            "id" => $this->id,
            "concepto" => $this->concepto,
            "observacion" => $this->observacion,
            "id_cliente" => $this->id_cliente,
            "monto" => $this->monto,
            "fecha_vencimiento" => $fechaVencimiento->format('d/m/Y'),
            "id_contrato" => $this->id_contrato,
            "cuota_nro" => $this->cuota_nro,
            "pagado" => $this->pagado, // si , no
            "fraccionado" => $this->fraccionado, // si. no
            // Pagos Parciales
            "pago_fraccionado" => $this->pagosFraccionados,

            // Moras
            "mora_monto" => $montoMora ,
            "mora_cant_dias" => $cantDiasMora,
            "mora_monto_total" => $moraPorCantDiasTotal,
            "monto_cuota_con_mora" => $montoCuotaConMora,

            // Montos a Pagar
            "monto_por_pagar" => $montoPorPagar,
            "monto_total_fraccionado" => $montoFraccionado,

            // Si el presente mes se tendra en cuenta la mora
             // Ver de acuerdo a a lo politica de la empresa
            "evitar_mora" => $evitarMora
        ];
    }
}
