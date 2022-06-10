<?php

namespace App\Models\Despesas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoriaDespesa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Categoria() {
        return $this->belongsTo(CategoriaDespesa::class, 'categoria_despesa_id', 'id');
    }
}
