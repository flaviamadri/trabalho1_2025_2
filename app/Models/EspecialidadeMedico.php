<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadeMedico extends Model
{
    use HasFactory;

    protected $table = 'especialidade_medicos';

    protected $fillable = ['nome'];
}
