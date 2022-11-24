<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class PedidosCompletosExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $completo =  DB::select('call sppedidoscompleto');
        return view('indicators.ped_completos.excel.index', compact('completo')); 

    }
}
