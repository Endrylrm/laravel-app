<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
    }

    public function edit(string $id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Produto não encontrado!');
        }

        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        if (!$product = Product::find($id)) {
            return back()->with('message', 'Produto não encontrado!');
        }

        $data = $request->only('name', 'value', 'amount');
        $data['updated_by'] = Auth::user()->id;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produto editado com sucesso.');
    }

    public function show(string $id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Produto não encontrado!');
        }

        return view('products.show', compact('product'));
    }

    public function destroy(string $id)
    {
        if (!$product = Product::find($id)) {
            return redirect()->route('products.index')->with('message', 'Produto não encontrado!');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso.');
    }
}
