@extends ('base')
@section('titulo', 'Formulário Paciente')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('paciente.update', $dado->id);
        } else {
            $action = route('paciente.store');
        }
    @endphp

    <form action="{{ $action }}" method='post'>
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="mx-auto bg-white p-4 rounded col" style="max-width: 600px;">

            <h2 class="mt-3 mb-3">Cadastro de Pacientes</h2>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>CPF</strong></label>
                <input class="form-control" type="text" placeholder="000.000.000-00" name="cpf"
                    value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Data de nascimento</strong></label>
                <input class="form-control" type="date" name="nascimento"
                    value="{{ old('nascimento', $dado->nascimento ?? '') }}">
            </div>

            <div class="mt-3">

                <label class="form-label" for=""><strong>Tipo sanguíneo</strong></label>
                <select class="form-select" name="tiposanguineo_paciente_id">

                    <option value="" disabled selected>Selecione</option>

                    @foreach ($tiposanguineo as $item)
                        <option value="{{ $item->id }}"
                            {{ old('tiposanguineo_id', $item->tiposanguineo_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Telefone</strong></label>
                <input class="form-control" type="text" name="telefone" placeholder="(00) 00000-0000"
                    value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Endereço</strong></label>
                <input class="form-control" type="text" name="endereco"
                    value="{{ old('endereco', $dado->endereco ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>E-mail</strong></label>
                <input class="form-control" type="email" placeholder="Nome@gmail.com" name="email"
                    value="{{ old('email', $dado->email ?? '') }}">
            </div>

            <div class="d-grid gap-3 mt-4">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a type="submit" class="btn btn-success" href="{{ url('paciente') }}">Voltar</a>
            </div>

        </div>
    </form>
@stop
