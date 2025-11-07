<!DOCTYPE html>
<html>
<head>
    <title>Relatório - Listagem Pacientes</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: separate; /* importante */
            border-spacing: 20px 10px;  /* espaçamento horizontal e vertical */
        }

        th, td {
            text-align: left;
            vertical-align: top;
        }

        thead td {
            font-weight: bold;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>{{ $titulo }}</h1>

    <table>
        <thead>
            <tr>
                <td>Imagem</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Data de nasc.</td>
                <td>Tipo Sanguíneo</td>
                <td>Telefone</td>
                <td>Endereço</td>
                <td>Email</td>
            </tr>
        </thead>
         <tbody>
            @foreach ($dados as $item)
                @php
                    $nome_imagem = !empty($item->imagem) ? $item->imagem : 'profile2.png';
                    //ou public_path('storage/' . $nome_imagem);
                    $imagemPath = storage_path('app/public/' . $nome_imagem);
                @endphp
                <tr>
                    <td><img src="{{ $imagemPath }}" width="100px" height="100px" alt="img"></td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cpf }}</td>
                    <td>{{ $item->nascimento }}</td>
                    <td>{{ $item->tiposanguineo->nome }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->endereco }}</td>
                    <td >{{ $item->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
