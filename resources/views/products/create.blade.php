<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Produto</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="" method="POST">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" />
        </div>
        <div>
            <label>Quantity:</label>
            <input type="number" name="qty" value="{{ old('qty') }}" />
        </div>
        <div>
            <label>Price:</label>
            <input type="text" name="price" value="{{ old('price') }}" />
        </div>
        <div>
            <label>Description:</label>
            <input type="text" name="description" value="{{ old('description') }}" />
        </div>
        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('products.index') }}">Voltar</a>
</body>
</html>
