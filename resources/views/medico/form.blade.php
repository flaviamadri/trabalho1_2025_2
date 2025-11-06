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

        <div class="mx-auto bg-white p-4 rounded" style="max-width: 800px;">

            <h2 class="mt-3 mb-3">Cadastro de Médicos</h2>

            <div class="border p-4 rounded">

                <div>
                    <label class="form-label" for=""><strong>Nome</strong></label>
                    <input class="form-control" type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
                </div>

                <div class="mt-3">
                    <label class="form-label" for=""><strong>CPF</strong></label>
                    <input class="form-control" type="text" placeholder="000.000.000-00" name="cpf"
                        value="{{ old('cpf', $dado->crm ?? '') }}">
                </div>

                <div class="mt-3">
                    <label class="form-label" for=""><strong>CRM</strong></label>
                    <input class="form-control" type="text" name="crm" value="{{ old('crm', $dado->crm ?? '') }}">
                </div>

                <div class="mt-3">

                    <label class="form-label" for=""><strong>Especialidade</strong></label>
                    <select class="form-select" name="especialidade_medico_id">

                        <option value="" disabled selected>Selecione</option>

                        @foreach ($especialidades as $item)
                            <option value="{{ $item->id }}"
                                {{ old('especialidade_id', $item->especialidade_id ?? '') == $item->id ? 'selected' : '' }}>
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
                    <label class="form-label" for=""><strong>E-mail</strong></label>
                    <input class="form-control" type="email" placeholder="Nome@gmail.com" name="email"
                        value="{{ old('email', $dado->email ?? '') }}">
                </div>

                @php
                    $nome_imagem = !empty($dado->imagem) ? $dado->imagem :'sem_imagem.png';
                @endphp
                <div class="col"><br>
                    <label for="">Imagem:</label>
                    <img src="/storage/{{$nome_imagem}}" width="200px" height="200px" alt="img">
                    <input class= "form-control" type="file" name="imagem" value="{{old('imagem',$dado->imagem ?? '')}}">
        </div>

                <div class="d-grid gap-3 mt-4">
                    <button type="submit"
                        class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                    <a type="submit" class="btn btn-success" href="{{ url('medico') }}">Voltar</a>
                </div>

            </div>

        </div>

    </form>
@stop
