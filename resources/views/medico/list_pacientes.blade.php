@extends ('base')
@section('titulo', 'Formulário paciente')
@section('conteudo')

    <h2>Pacientes do Dr(a). {{ $medico->nome }}</h2>

    @php
        $pacientes = $medico->consultas->pluck('paciente')->unique('id');
    @endphp

    @if ($pacientes->isEmpty())
        <p>Nenhum paciente encontrado.</p>
    @else
        <ul>
            @foreach ($pacientes as $paciente)
                <li>{{ $paciente->nome }}</li>
            @endforeach
        </ul>
    @endif
</div>

@stop
