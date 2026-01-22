<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreatedMail;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('cliente')->latest()->paginate(20);
    }

    public function show($id)
    {
        return Order::with(['cliente','items.producto'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'items' => 'required|array'
        ]);

        $order = Order::create([
            'id_cliente' => $request->id_cliente,
            'creado_por' => $request->user()->id_usuario,
            'estado_orden' => 'GENERADA'
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $producto = Product::findOrFail($item['id_articulo']);

            OrderItem::create([
                'id_orden' => $order->id_orden,
                'id_articulo' => $producto->id_articulo,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $producto->precio_publico,
                'subtotal' => $producto->precio_publico * $item['cantidad'],
            ]);

            $total += $producto->precio_publico * $item['cantidad'];
        }

        $order->update(['total' => $total]);

        // 📧 Email
        $cliente = Customer::find($request->id_cliente);
        Mail::to($cliente->email)->send(new OrderCreatedMail($order));

        return response()->json($order, 201);
    }
}
