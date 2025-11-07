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

        <div class="mx-auto bg-white p-4 rounded" style="max-width: 800px;">

            <h2 class="mt-3 mb-5">Cadastro de Consultas</h2>

            <div class="border p-4 rounded shadow-lg">

                <div class="mt-3">

                    <label for="paciente_id" class="form-label"><strong>Paciente</strong></label>

                    <select name="paciente_id" id="paciente" class="form-select" required>

                        <option value="" disabled selected>Selecione</option>

                        @foreach ($pacientes as $item)
                            <option value="<?= $item->id ?>">
                                <?= $item->nome ?>
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mt-3">

                    <label for="medico_id" class="form-label"><strong>Médico</strong></label>

                    <select name="medico_id" id="medico" class="form-select" required>

                        <option value="" disabled selected>Selecione</option>

                        @foreach ($medicos as $item)
                            <option value="<?= $item->id ?>">
                                <?= $item->nome ?>
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mt-3">
                    <label class="form-label" for=""><strong>Data da Consulta</strong></label>
                    <input class="form-control" type="date" name="data_consulta"
                        value="{{ old('data_consulta', $dado->data_consulta ?? '') }}">
                </div>

                <div class="mt-3">
                    <label class="form-label" for=""><strong>Descrição</strong></label>
                    <input class="form-control" type="text" name="descricao"
                        value="{{ old('descricao', $dado->descricao ?? '') }}">
                </div>

                <div class="mt-3">

                    <label class="form-label" for=""><strong>Status</strong></label>
                    <select class="form-select" name="status_consulta_id">

                        <option value="" disabled selected>Selecione</option>

                        @foreach ($status as $item)
                            <option value="{{ $item->id }}"
                                {{ old('status_id', $item->status_id ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->nome }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="d-grid gap-3 mt-4">
                    <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                    <a type="submit"  style="background-color: #1148ad; color: white;" class="btn" href="{{ url('consulta') }}">Voltar</a>
                </div>

            </div>

        </div>

    </form>
@stop
