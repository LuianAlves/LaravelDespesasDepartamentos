<?php

namespace App\Models\Despesas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Departamentos\Departamento;
use App\Models\Pagamentos\MetodoPagamento;

class Despesa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Departamento() {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }
    public function CategoriaDespesa() {
        return $this->belongsTo(CategoriaDespesa::class, 'categoria_despesa_id', 'id');
    }
    public function SubCategoriaDespesa() {
        return $this->belongsTo(SubCategoriaDespesa::class, 'sub_categoria_despesa_id', 'id');
    }
    public function MetodoPagamento() {
        return $this->belongsTo(MetodoPagamento::class, 'metodo_pagamento_id', 'id');
    }
}
