<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\{Country,State,City};



class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Auth Middleware
    
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        //
        $customers = Customer::all();
        return view('customers.index')->with('customers', $customers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['countries'] = Country::get(["name","id"]);
        return view('customers.create' ,$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
         ]);
        

        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->country = $request->input('country');
        $customer->save();

        return redirect('/customers')->with('success','Customer added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['countries'] = Country::get(["name","id"]);
        $data['customer'] = Customer::where('customer_id', $id)->first();

        return view('customers.edit',$data);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $customer = Customer::where('customer_id', $id)->first();
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->phone_number = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->country = $request->input('country');
        $customer->save();

        return redirect('/customers')->with('success','Customer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
