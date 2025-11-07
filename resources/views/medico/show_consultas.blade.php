@extends ('base')
@section('titulo', 'Listagem Medico')
@section('conteudo')

<h2>Pacientes do médico: {{ $medico->nome }}</h2>

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
                <td><strong>Edit</strong></td>
                <td><strong>Delet</strong></td>
            </tr>
        </thead>

        <tbody>

            @foreach ($medico->pacientes as $paciente)
                @php
                    $nome_imagem = !empty($item->imagem) ? $item->imagem : 'profile2.png';
                @endphp

                <td><img src="/storage/{{ $nome_imagem }}" width="100px" height="100px" alt="img"></td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->cpf }}</td>
                <td>{{ $item->nascimento }}</td>
                <td>{{ $item->tiposanguineo->nome }}</td>
                <td>{{ $item->telefone }}</td>
                <td>{{ $item->endereco }}</td>
                <td>{{ $item->email }}</td>

            @endforeach
        </tbody>
    </table>
@stop
