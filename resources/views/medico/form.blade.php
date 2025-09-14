@extends ('base')
@section('titulo', 'Formulário Médico')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('medico.update', $dado->id);
        } else {
            $action = route('medico.store');
        }
    @endphp

    <form action="{{ $action }}" method='post'>
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="mx-auto bg-white p-4 rounded col" style="max-width: 600px;">

            <h2 class="mt-3 mb-3">Cadastro de Médicos</h2>

            <div class=""><br>
                <label class="form-label" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>

            <div class=""><br>
                <label class="form-label" for=""><strong>CPF</strong></label>
                <input class="form-control" type="text" placeholder="000.000.000-00" name="cpf"
                    value="{{ old('cpf', $dado->crm ?? '') }}">
            </div>

            <div class=""><br>
                <label class="form-label" for=""><strong>CRM</strong></label>
                <input class="form-control" type="text" name="crm" value="{{ old('crm', $dado->crm ?? '') }}">
            </div>

            <div class=""><br>
                <label class="form-label" for=""><strong>Especialidade</strong></label>
                <select name="especialidade_id" >

                    <option value="">Selecione</option>

                    @foreach($especialidades as $item)

                       <option value="{{ $item->id }}"
                            {{ old('especialidade_id', $item->especialidade_id ?? '') == $item->id ? 'selected' : ''  }}>
                            {{ $item->nome }}
                       </option>

                    @endforeach

                </select>
            </div>

            <div class=""><br>
                <label class="form-label" for=""><strong>Telefone</strong></label>
                <input class="form-control" type="text" name="telefone" placeholder="(00) 00000-0000"
                    value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>

            <div class=""><br>
                <label class="form-label" for=""><strong>E-mail</strong></label>
                <input class="form-control" type="text" placeholder="Nome@gmail.com" name="email"
                    value="{{ old('email', $dado->email ?? '') }}">
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a type="submit" class="btn btn-success" href="{{ url('medico') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
