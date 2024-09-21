<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'user_id'];

    protected $dates = ['data_nascimento']; // Isso deve fazer com que o Laravel trate data_nascimento como Carbon

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class);
    }

    // Accessor para formatar a data de nascimento
    public function getDataNascimentoFormattedAttribute()
    {
        // Verifica se data_nascimento é um objeto Carbon
        if ($this->data_nascimento instanceof Carbon) {
            return $this->data_nascimento->format('d/m/Y');
        }
        
        // Se não for, tenta criar uma instância de Carbon
        try {
            return Carbon::parse($this->data_nascimento)->format('d/m/Y');
        } catch (\Exception $e) {
            return 'Data inválida'; // Retorna uma mensagem de erro se a data não for válida
        }
    }
}
