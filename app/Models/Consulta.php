<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;

class Consulta extends Model
{
    use HasFactory;

    protected $table = "consultas";

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data_consulta',
        'descricao',
        'status_consulta_id',
    ];

    protected $cast =[

        'data_consulta' => 'date',

    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function medico(){
        return $this->belongsTo(Medico::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusConsulta::class, 'status_consulta_id');
    }



}
