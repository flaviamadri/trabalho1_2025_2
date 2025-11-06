<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = "medicos";

    protected $fillable = [

        'nome',
        'cpf',
        'crm',
        'especialidade_medico_id',
        'telefone',
        'email',
        'imagem',
    ];

    public function especialidade()
    {
        return $this->belongsTo(EspecialidadeMedico::class, 'especialidade_medico_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }

     public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

}
