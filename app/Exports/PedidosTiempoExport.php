<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class PedidosTiempoExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $tiempo =  DB::select('call sppedidostiempo');
        return view('indicators.ped_tiempo.excel.index', compact('tiempo'));     }
}
