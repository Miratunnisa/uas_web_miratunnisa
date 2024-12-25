<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $shippingMethods = ShippingMethod::all();
        return view('admin.shipping_methods.index', compact('shippingMethods'));
    }

    public function create()
    {
        return view('admin.shipping_methods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
        ]);

        ShippingMethod::create($request->all());
        return redirect()->route('shipping-methods.index')->with('success', 'Shipping Method added successfully');
    }

    public function edit($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        return view('admin.shipping_methods.edit', compact('shippingMethod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
        ]);

        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->update($request->all());
        return redirect()->route('shipping-methods.index')->with('success', 'Shipping Method updated successfully');
    }

    public function destroy($id)
    {
        $shippingMethod = ShippingMethod::findOrFail($id);
        $shippingMethod->delete();
        return redirect()->route('shipping-methods.index')->with('success', 'Shipping Method deleted successfully');
    }
}
