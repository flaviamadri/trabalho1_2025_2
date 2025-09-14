@extends ('base')
@section('titulo', 'Home')
@section('conteudo')

    <div class='container'>

        <h2 class='mt-5'>Sistema de Gestão - Hospital</h2>
        <h5>Bem-vindo ao sistema de gestão.</h5>

        <div class='row text-center mt-5'>

            <div class='col'>
                <div class="">
                    <h5 class="mt-2 mb-3 card-header">Médicos</h5>
                    <hr>
                </div>
                <div class="card p-3">
                    <a href='{{ route('medico.create') }}' class='btn mb-2'
                        style="background-color: #1148ad; color: white;">Cadastrar</a>
                    <a href='{{ route('medico.index') }}' class='btn'
                        style="background-color: #1148ad; color: white;">Listagem</a>
                </div>
            </div>

            <div class='col'>
                <div>
                    <h5 class="mt-2 mb-3 card-header">Pacientes</h5>
                    <hr>
                </div>
                <div class="card p-3">
                    <a href='{{ route('paciente.create') }}' class='btn mb-2'
                        style="background-color: #1148ad; color: white;">Cadastrar</a>
                    <a href='{{ route('paciente.index') }}' class='btn'
                        style="background-color: #1148ad; color: white;">Listagem</a>
                </div>
            </div>

            <div class='col'>
                <div class="">
                    <h5 class="mt-2 mb-3 card-header">Consultas</h5>
                    <hr>
                </div>
                <div class="card p-3">
                    <a href='{{ route('consulta.create') }}' class='btn mb-2'
                        style="background-color: #1148ad; color: white;">Cadastrar</a>
                    <a href='{{ route('consulta.index') }}' class='btn'
                        style="background-color: #1148ad; color: white;">Listagem</a>
                </div>
            </div>

        </div>
    </div>

@stop
