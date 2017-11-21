<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomersController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('customers.index', compact('customers'));
    }

    public function create() {
        return view('customers.create');
    }

    public function store(StoreCustomerRequest $request) {
        Customer::create( $request->all() );
        return redirect()->route('customers.index')->with(
            [
                'msg'    => 'Cliente adicionado com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function edit($customer) {
        $customer = Customer::find($customer);
        return view('customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, $customer) {
        $customer = Customer::findOrFail($customer);
        $customer->fill( $request->all() );
        $customer->save();
        return redirect()->route('customers.index')->with(
            [
                'msg'    => 'Cliente editado com sucesso',
                'status' => 'success'
            ]
        );
    }

    public function destroy($customer) {
        $customer = Customer::findOrFail($customer);
        $customer->delete();
        return redirect()->route('customers.index')->with(
            [
                'msg'    => 'Cliente deletado com sucesso',
                'status' => 'success'
            ]
        );
    }
}
