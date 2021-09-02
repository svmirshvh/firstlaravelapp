<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\{Country,State,City};


class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Auth Middleware
     
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        //
        $suppliers = Supplier::all();
        return view('suppliers.index')->with('suppliers', $suppliers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('suppliers.create' ,$data);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
         ]);
        

        $supplier = new Supplier;
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->phone_number = $request->input('phone');
        $supplier->email = $request->input('email');
        $supplier->city = $request->input('city');
        $supplier->state = $request->input('state');
        $supplier->country = $request->input('country');
        $supplier->save();

        return redirect('/suppliers')->with('success','Supplier added successfully');
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
        $data['supplier'] = Supplier::where('supplier_code', $id)->first();

        return view('suppliers.edit',$data);
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
        $supplier = Supplier::where('supplier_code', $id)->first();
        $supplier->name = $request->input('name');
        $supplier->address = $request->input('address');
        $supplier->phone_number = $request->input('phone');
        $supplier->email = $request->input('email');
        $supplier->city = $request->input('city');
        $supplier->state = $request->input('state');
        $supplier->country = $request->input('country');
        $supplier->save();

        return redirect('/suppliers')->with('success','Supplier updated successfully');
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
