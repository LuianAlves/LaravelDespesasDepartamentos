<?php

namespace App\Exports;

// Excel
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Despesas\Despesa;

use Carbon\Carbon;

class DespesaExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Despesa::with('Departamento', 'CategoriaDespesa', 'SubCategoriaDespesa', 'MetodoPagamento')->get();
    }
    
    public function map($despesa) : array {
        return [
            $despesa->id,
            $despesa->Departamento->departamento,
            $despesa->CategoriaDespesa->categoria_despesa,
            $despesa->SubCategoriaDespesa->sub_categoria_despesa,
            $despesa->MetodoPagamento->metodo_pagamento,
            $despesa->forma_pagamento,
            $despesa->despesa,
            $despesa->descricao_despesa,
            $despesa->valor_despesa,
            $despesa->data_despesa,
            $despesa->dia_despesa,
            $despesa->mes_despesa,
            $despesa->ano_despesa,
            Carbon::parse($despesa->created_at)->toFormattedDateString()
        ];
    }
 
    public function headings() : array {
        return [
           '#ID',
           'DEPARTAMENTO',
           'CATEGORIA DESPESA',
           'SUB CATEGORIA DESPESA',
           'MÉTODO DE PAGAMENTO',
           'FORMA DE PAGAMENTO',
           'DESPESA',
           'DESCRIÇÃO',
           'VALOR',
           'DATA',
           'DIA',
           'MÊS',
           'ANO',
           'CRIADO EM',
        ] ;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:N1')->getFont()->setName('Poppins')->setBold(true);
        
        $sheet->getStyle('A1:N1')->getFill()->applyFromArray([
            'fillType' => 'solid','rotation' => 0, 
            'color' => ['rgb' => 'D9D9D9'],
        ]);
    }

}
