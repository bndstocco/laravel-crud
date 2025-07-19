<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Exibe a lista de produtos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('products.create');
    }

    // Salva o novo produto no banco
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }
}
