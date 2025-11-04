
<!DOCTYPE html>

<html>

<head>

    <title>Relatório - Listagem Médicos</title>

</head>

<body>

    <h1>{{ $titulo }}</h1>

    <table>
        <thead>
            <tr>
                <td>#ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>CRM</td>
                <td>Especialidade</td>
                <td>Telefone</td>
                <td>Email</td>
            </tr>
        </thead>
        <tbody>
             @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->crm }}</td>
                    <td>{{ $item->especialidade->nome }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->email }}</td>

                </tr>
               @endforeach
        </tbody>
    </table>
</body>

</html>
