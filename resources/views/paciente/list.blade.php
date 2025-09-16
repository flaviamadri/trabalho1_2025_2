@extends ('base')
@section('titulo', 'Formulário paciente')
@section('conteudo')

    <h3 class='mt-5 mb-5'>Listagem de pacientes</h3>

    <form action="{{ route('paciente.search') }}" method='post'>

        @csrf

        <div class="row">

            <div class="col-md-4">

                <label class="form-label"><strong>Tipo</strong></label>

                <select name="tipo" class='form-select'>
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="nascimento">Data de nascimento</option>
                    <option value="telefone">Telefone</option>
                    <option value="endereco">Endereço</option>
                    <option value="email">Email</option>
                </select>

            </div>

            <div class="col-md-3">
                <label class="form-label"><strong>Valor</strong></label>
                <input type="text" class="form-control" name="valor" placeholder='Pesquisar...'>
            </div>

            <div class="col-md-5 d-flex align-items-end">

                <button style="background-color: #1148ad; color: white;" type="submit" class="btn me-4">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Buscar
                </button>

                <a class="btn btn-success" href="{{ url('/paciente/create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Novo
                </a>

            </div>

        </div>

    </form>

    <table class="table table table-striped table-bordered mt-4">

        <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>CPF</strong></td>
                <td><strong>Data de nasc.</strong></td>
                <td><strong>Telefone</strong></td>
                <td><strong>Endereço</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Editar</strong></td>
                <td><strong>Deletar</strong></td>
            </tr>
        </thead>

        <tbody>

            @foreach ($dados as $item)

                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->nascimento }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->endereco }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('medico.edit', $item->id) }}" class="btn">
                            <i style="color: #1148ad;" class="fa-regular fa-pen-to-square fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('paciente.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="color: red;"
                                onclick="return confirm('Deseja deletar o resgistro?')"> <i
                                    class="fas fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

@stop
