<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Criar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            max-width: 600px;
            margin: auto;
        }
        form div {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            box-sizing: border-box;
        }
        textarea {
            min-height: 80px;
            resize: vertical;
        }
        button[type="submit"] {
            padding: 0.6rem 1.2rem;
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 4px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            color: red;
            padding-left: 1.2rem;
        }
    </style>
</head>
<body>
    <h1>Criar Produto</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input id="name" type="text" name="name" required />
        </div>
        <div>
            <label for="qty">Quantidade</label>
            <input id="qty" type="number" name="qty" required />
        </div>
        <div>
            <label for="price">Preço</label>
            <input id="price" type="number" step="0.01" name="price" required />
        </div>
        <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>
