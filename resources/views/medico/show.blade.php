<h2>Pacientes do médico: {{ $medico->nome }}</h2>

<ul>
@foreach($medico->pacientes as $paciente)
    <li>{{ $paciente->nome }}</li>
@endforeach
</ul>
