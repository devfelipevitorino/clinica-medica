<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'email'
    ];

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecavel');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
