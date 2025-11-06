@extends ('base')
@section('titulo', 'Listagem Consulta')
@section('conteudo')

    <h3 class='mt-5 mb-5'>Listagem de Consultas</h3>

    <form action="{{ route('consulta.search') }}" method='post'>

        @csrf

        <div class="row">

            <div class="col-md-4">

                <label class="form-label"><strong>Campo</strong></label>

                <select name="tipo" class='form-select'>
                    <option value="paciente">Paciente</option>
                    <option value="medico">Médico</option>
                    <option value="data_consulta">Data da Consulta</option>
                    <option value="descricao">Descrição</option>
                    <option value="status">Status</option>
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

                <a class="btn btn-success me-4" href="{{ url('/consulta/create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Novo
                </a>

                <a class="btn btn-success"  href="{{ url('/consulta/chart') }}">
                    <i class="fa-solid fa-plus"></i>
                    Gráfico
                </a>

            </div>

        </div>

    </form>

    <table class="table table table-striped table-bordered mt-4">

        <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Paciente</strong></td>
                <td><strong>Médico</strong></td>
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
                    <td>{{ $item->paciente->nome}}</td>
                    <td>{{ $item->medico->nome}}</td>
                    <td>{{ $item->data_consulta }}</td>
                    <td style="max-width: 250px">{{ $item->descricao }}</td>
                    <td>{{ $item->status->nome}}</td>
                    <td class="text-center">
                        <a href="{{ route('consulta.edit', $item->id) }}" class="btn">
                            <i style="color: #1148ad;" class="fa-regular fa-pen-to-square fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('consulta.destroy', $item->id) }}" method="post">
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
