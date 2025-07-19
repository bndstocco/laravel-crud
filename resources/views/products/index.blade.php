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
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 0.8rem 1rem;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
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
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" onsubmit="return confirm('Confirmar exclusão?')">
                             @csrf
                             @method('DELETE')
                            <input type="submit" value="Delete" style="background:none; border:none; color:red; cursor:pointer;">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
