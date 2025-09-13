@extends ('base')
@section('titulo', 'Listagem Medico')
@section('conteudo')
    <div class='container'>
        <h3 class='mt-5 mb-5'>Listagem de Médicos</h3>
        <form action="{{ route('medico.search') }}" method='post'>
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label"><strong>Tipo</strong></label>
                    <select name="tipo" class='form-select'>
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="cpf">CRM</option>
                        <option value="cpf">Especialidade</option>
                        <option value="telefone">Telefone</option>
                        <option value="cpf">Email</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Buscar
                    </button>

                    <a class="btn btn-success" href="{{ url('/medico/create') }}">
                        <i class="fa-solid fa-plus"></i>
                        Novo
                    </a>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><strong>Valor</strong></label>
                    <input type="text" class="form-control" name="valor" placeholder='Pesquisar...'>
                </div>
            </div>

        </form>

        <table class="table">
            <thead>
                <tr><br>
                    <td><strong>#ID</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>CPF</strong></td>
                    <td><strong>CRM</strong></td>
                    <td><strong>Especialidade</strong></td>
                    <td><strong>Telefone</strong></td>
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
                        <td>{{ $item->crm }}</td>
                        <td>{{ $item->especialidade }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('medico.edit', $item->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('medico.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja deletar o resgistro?')"> <i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </body>
@stop
