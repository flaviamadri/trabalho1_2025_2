<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = "pacientes";

    protected $fillable = [

        'nome',
        'cpf',
        'nascimento',
        'tiposanguineo_paciente_id',
        'telefone',
        'endereco',
        'email',
    ];
    public function tiposanguineo()
{
    return $this->belongsTo(TipoSanguineo::class, 'tiposanguineo_paciente_id');
}


}
