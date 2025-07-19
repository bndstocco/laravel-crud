<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            max-width: 900px;
            margin: auto;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            display: inline-block;
        }
        .btn-add:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        a.edit-link {
            color: #007bff;
            text-decoration: none;
        }
        a.edit-link:hover {
            text-decoration: underline;
        }
        form.delete-form {
            display: inline;
        }
        input.delete-btn {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
            font-weight: bold;
            padding: 0;
        }
        input.delete-btn:hover {
            text-decoration: underline;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 0.8rem 1rem;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <h1>Product List</h1>

    @if(session()->has('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Qtd</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
                <th>Adicionar</th> <!-- Coluna para o botão Adicionar -->
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="edit-link">Editar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="delete-form" onsubmit="return confirm('Confirmar exclusão?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir" class="delete-btn" />
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('products.create') }}" class="btn-add">Adicionar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
