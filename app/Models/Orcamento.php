<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'kwp', 'orientacao', 'instalacao', 'preco', 'arquivo'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
