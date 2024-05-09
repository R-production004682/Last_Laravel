<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::withCount('orders');

        if ($request->keyword) {
            $query->where('name', 'LIKE', '%'. $request->keyword . '%');
        }
        $customers = $query->orderBy('id', 'desc')->paginate(20);

        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        $customer = new Customer;
        return view('customers.create', ['customer' => $customer]);
    }

    public function store(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $customer->create($request->all());
        return redirect(route('customers.index'));
    }

    public function show(Customer $customer)
    {
        $orders = $customer->orders()->with('customer')->with('product')
            ->orderBy('created_at', 'desc')->paginate(20);
        return view('customers.show', [
            'customer' => $customer,
            'orders' => $orders,
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $customer->update($request->all());
        return redirect(route('customers.show', $customer));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customers.index'));
    }
}
