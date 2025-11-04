@extends ('base')
@section('titulo', 'Listagem Medico')
@section('conteudo')

    <h3 class='mt-5 mb-5'>Listagem de Médicos</h3>

    <form action="{{ route('medico.search') }}" method='post'>

        @csrf

        <div class="row">

            <div class="col-md-4">

                <label class="form-label"><strong>Campo</strong></label>

                <select name="tipo" class='form-select'>
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="crm">CRM</option>
                    <option value="especialidade">Especialidade</option>
                    <option value="telefone">Telefone</option>
                    <option value="email">E-mail</option>
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

                <a class="btn btn-success me-4" href="{{ url('/medico/create') }}">
                    <i class="fa-solid fa-plus"></i>
                    Novo
                </a>

                <a class="btn btn-success"  href="{{ url('/medico/report') }}">
                    <i class="fa-solid fa-plus"></i>
                    Relatório PDF
                </a>


            </div>

        </div>

    </form>

    <table class="table table-striped table-bordered mt-4">

        <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>CPF</strong></td>
                <td><strong>CRM</strong></td>
                <td><strong>Especialidade</strong></td>
                <td><strong>Telefone</strong></td>
                <td><strong>E-mail</strong></td>
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
                    <td>{{ $item->especialidade->nome }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('medico.edit', $item->id) }}" class="btn">
                            <i style="color: #1148ad;" class="fa-regular fa-pen-to-square fa-lg"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('medico.destroy', $item->id) }}" method="post">
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
