<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['nome', 'crm', 'telefone', 'email', 'especialidade_id'];

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecavel');
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
