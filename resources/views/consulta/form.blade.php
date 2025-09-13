@extends ('base')
@section('titulo', 'Formulário Consulta')
@section ('conteudo')

@php
    if(!empty($dado->id)){
        $action = route('consulta.update', $dado->id);
    } else {
        $action = route('consulta.store');
    }
@endphp

<form action="{{ $action }}" method='post'>

    @csrf

    @if(!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '')}}">

    <div class="row">

        <div class="col"><br>
            <label for="">Paciente ID:</label>
            <input type="text" name="paciente_id" value="{{old('paciente_id',$dado->paciente_id ?? '')}}">
        </div>

        <div class="col"><br>
            <label for="">Médico ID:</label>
        <input type="text" name="medico_id" value="{{old('medico_id',$dado->medico_id ?? '')}}">
        </div>

        <div class="col"><br>
            <label for="">Data da Consulta:</label>
        <input type="date" name="data_consulta" value="{{old('data_consulta',$dado->data_consulta ?? '')}}">
        </div>

        <div class="col"><br>
            <label for="">Descrição:</label>
            <input type="text" name="descricao" value="{{old('descricao',$dado->descricao ?? '')}}">
        </div>

        <div class="col"><br>
            <label for="">Status:</label>
            <input type="text" name="status" value="{{old('status',$dado->status ?? '')}}">
        </div>

    </div>

    <div class="row">

        <div class="col"><br>
            <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar'}}</button>
            <a type="submit" class="btn btn-success" href="{{ url ('consulta') }}">Voltar</a>
        </div>

    </div>
    
</form>
@stop
