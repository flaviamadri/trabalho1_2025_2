@extends ('base')
@section('titulo', 'Listagem Consulta')
@section('conteudo')

    <div class='container'>
        <h3 class='mt-5 mb-5'>Listagem de Consultas</h3>
        <form action="{{ route('consulta.search') }}" method='post'>
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label"><strong>Tipo</strong></label>
                    <select name="tipo" class='form-select'>
                        <option value="paciente_id">Paciente ID</option>
                        <option value="medico_id">Médico ID</option>
                        <option value="data_consulta">Data da Consulta</option>
                        <option value="descricao">Descrição</option>
                        <option value="status">Status</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Buscar
                    </button>
                    <a class="btn btn-success" href="{{ url('/consulta/create') }}">
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
                    <td><strong>Paciente ID</strong></td>
                    <td><strong>Médico ID</strong></td>
                    <td><strong>Data da Consulta</strong></td>
                    <td><strong>Descrição</strong></td>
                    <td><strong>Status</strong></td>
                    <td><strong>Editar</strong></td>
                    <td><strong>Deletar</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->paciente_id }}</td>
                        <td>{{ $item->medico_id }}</td>
                        <td>{{ $item->data_consulta }}</td>
                        <td>{{ $item->descricao }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('consulta.edit', $item->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('consulta.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Confirma a exclusão do registro {{ $item->id }}?')">
                                    <i class="fa-solid fa-trash"></i>
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
