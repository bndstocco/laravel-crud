<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
        input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
        }
        input[type="submit"] {
            padding: 0.6rem 1.2rem;
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 1rem;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            color: red;
            padding-left: 1.2rem;
        }
    </style>
</head>
<body>
    <h1>Edit Product</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $product->name }}">
        </div>

        <div>
            <label for="qty">Quantity</label>
            <input id="qty" type="text" name="qty" value="{{ $product->qty }}">
        </div>

        <div>
            <label for="price">Price</label>
            <input id="price" type="text" name="price" value="{{ $product->price }}">
        </div>

        <div>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="{{ $product->description }}">
        </div>

        <div>
            <input type="submit" value="Update Product">
        </div>
    </form>
</body>
</html>
