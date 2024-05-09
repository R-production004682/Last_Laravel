<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('product')->with('customer');
        if ($request->unship) {
            $query->whereNull('shipped_at');
        }
        $orders = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('orders.index', ['orders' => $orders]);
    }

    public function create(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);
        $products = Product::orderBy('id', 'desc')->get();
        return view('orders.create', [
            'customer' => $customer,
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'customer_id' => 'required',
            'count' => 'numeric|min:1|max:99',
        ]);
        $product = Product::findOrFail($request->product_id);
        $customer = Customer::findOrFail($request->customer_id);

        $order = new Order($request->all());
        $order->amount = $product->price * $request->count;
        $order->save();

        return redirect(route('customers.show', $request->customer_id));
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order]);
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'count' => 'numeric|min:1|max:99',
            'amount' => 'numeric|min:1',
            'shipped_at' => 'date|nullable|before_or_equal:today',
        ]);
        $order->update($request->all());

        return redirect(route('orders.index'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'));
    }

    public function update_shipping(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->shipped_at = \Carbon\Carbon::now();
        $order->save();

        return back();

    }
}
