<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Despesas\DespesaInfo;

use Carbon\Carbon;

class CheckDespesaController extends Controller
{
    public function check($id) {
        $dinfo = DespesaInfo::findOrFail($id)->first();

        $despesa = Despesa::where('id', $dinfo->despesa_id)->first();
        $nova_despesa = $despesa->replicate();
        $nova_despesa->check_data_despesa = date('Y') + 1;
        $nova_despesa->save();
        
        $dinfo_nova = $dinfo->replicate();
        $dinfo_nova->check_data_despesa = date('Y') + 1;
        $dinfo_nova->save();
        $dinfo->delete();

        return redirect()->back();
    }

    public function remove($id) {
        DespesaInfo::findOrFail($id)->delete();

        return redirect()->back();
    }
}
