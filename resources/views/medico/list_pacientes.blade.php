@extends ('base')
@section('titulo', 'Formulário paciente')
@section('conteudo')

    <h2>Pacientes do Dr(a). {{ $medico->nome }}</h2>

    <table class="table table table-striped table-bordered mt-4">

        <thead>
            <tr>
                <td><strong>Img</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>CPF</strong></td>
                <td><strong>Data de nasc.</strong></td>
                <td><strong>Tipo Sanguineo</strong></td>
                <td><strong>Telefone</strong></td>
                <td><strong>Endereço</strong></td>
                <td><strong>Email</strong></td>
            </tr>
        </thead>

        <tbody>

            @php
                $pacientes = $medico->consultas->pluck('paciente')->unique('id');
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'profile2.png';
            @endphp

            

            @if ($pacientes->isEmpty())
                <p>Nenhum paciente encontrado.</p>
            @else
                @foreach ($pacientes as $paciente)
                    <td><img src="/storage/{{ $nome_imagem }}" width="100px" height="100px" alt="img"></td>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td>{{ $paciente->nascimento }}</td>
                    <td>{{ $paciente->tiposanguineo->nome }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>{{ $paciente->endereco }}</td>
                    <td>{{ $paciente->email }}</td>
                @endforeach
            @endif

        </tbody>

    </table>

    </div>

@stop
