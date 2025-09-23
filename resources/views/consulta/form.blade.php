@extends ('base')
@section('titulo', 'Formulário Consulta')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('consulta.update', $dado->id);
        } else {
            $action = route('consulta.store');
        }
    @endphp

    <form action="{{ $action }}" method='post'>

        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="mx-auto bg-white p-4 rounded col" style="max-width: 600px;">

            <h2 class="mt-3 mb-3">Cadastro de Consultas</h2>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Paciente ID</strong></label>
                <input class="form-control" type="text" name="paciente_id" value="{{ old('paciente_id', $dado->paciente_id ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Médico ID</strong></label>
                <input class="form-control" type="text" name="medico_id" value="{{ old('medico_id', $dado->medico_id ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Data da Consulta</strong></label>
                <input class="form-control" type="text" name="data_consulta" value="{{ old('data_consulta', $dado->data_consulta ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Descrição</strong></label>
                <input class="form-control" type="text" name="descricao" value="{{ old('descricao', $dado->descricao ?? '') }}">
            </div>

            <div class="mt-3">
                <label class="form-label" for=""><strong>Status</strong></label>
                <input class="form-control" type="text" name="status" value="{{ old('status', $dado->status ?? '') }}">
            </div>

            <div class="d-grid gap-3 mt-4">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a type="submit" class="btn btn-success" href="{{ url('consulta') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
