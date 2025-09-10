@extends ('base')
@section('titulo', 'Formulário Médico')
@section ('conteudo')

@php
    if(!empty($dado->id)){
        $action = route('medico.update', $dado->id);
    } else {
        $action = route('medico.store');
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
            <label for="">Nome:</label>
            <input type="text" name="nome" value="{{old('nome',$dado->nome ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">CPF:</label>
        <input type="text" name="cpf" value="{{old('cpf',$dado->crm ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">CRM:</label>
        <input type="text" name="crm" value="{{old('crm',$dado->crm ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">Especialidade:</label>
            <input type="text" name="especialidade" value="{{old('especialidade',$dado->especialidade ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">Telefone:</label>
            <input type="text" name="telefone" value="{{old('telefone',$dado->telefone ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">E-mail</label>
            <input type="text" name="email" value="{{old('email',$dado->email ?? '')}}">
        </div>
    </div>
    <div class="row">
        <div class="col"><br>
            <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar'}}</button>
            <a type="submit" class="btn btn-success" href="{{ url ('medico') }}">Voltar</a>
        </div>
    </div>
</form>
@stop
