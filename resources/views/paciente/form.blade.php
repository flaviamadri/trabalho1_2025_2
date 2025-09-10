@extends ('base')
@section('titulo', 'Formulário Paciente')
@section ('conteudo')

@php
    if(!empty($dado->id)){
        $action = route('paciente.update', $dado->id);
    } else {
        $action = route('paciente.store');
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
            <label for="">Data de nascimento:</label>
        <input type="date" name="nascimento" value="{{old('nascimento',$dado->nascimento ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">Telefone:</label>
            <input type="text" name="telefone" value="{{old('telefone',$dado->telefone ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">Endereço:</label>
            <input type="text" name="endereco" value="{{old('endereco',$dado->endereco ?? '')}}">
        </div>
        <div class="col"><br>
            <label for="">E-mail</label>
            <input type="text" name="email" value="{{old('email',$dado->email ?? '')}}">
        </div>
    </div>
    <div class="row">
        <div class="col"><br>
            <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar'}}</button>
            <a type="submit" class="btn btn-success" href="{{ url ('paciente') }}">Voltar</a>
        </div>
    </div>
</form>
@stop
