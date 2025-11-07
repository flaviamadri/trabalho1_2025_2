<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1148ad;">

            <div class="container">

                <a class="navbar-brand fw-bold d-flex" href="#">
                    <span class="fs-1 me-4">Flavy</span>
                </a>
                
            </div>
        </nav>

    </header>

    <div class="container py-5">

        <h2 class="mt-3">Bem-vindo ao sistema de gestão!</h2>

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

</body>
