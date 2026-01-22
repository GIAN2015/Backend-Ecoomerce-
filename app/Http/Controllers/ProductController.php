<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with(['marca','categoria','imagenes'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function show($id)
    {
        return Product::with([
            'marca','categoria','subcategoria','imagenes','metas'
        ])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_articulo' => 'required',
            'precio_publico' => 'required|numeric'
        ]);

        $producto = Product::create([
            'id_articulo' => Str::uuid(),
            'origen' => 'PROPIO',
            'nom_articulo' => $request->nom_articulo,
            'precio_publico' => $request->precio_publico,
            'id_usuario' => $request->user()->id_usuario,
            'estado_articulo' => 1
        ]);

        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        $producto = Product::findOrFail($id);
        $producto->update($request->all());

        return response()->json($producto);
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}
