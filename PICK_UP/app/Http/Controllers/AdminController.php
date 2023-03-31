<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Customer;
use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreadminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreadminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateadminRequest  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateadminRequest $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }

    public function adminDash(){
        return view('admin.adminDash');

    }
    public function clientList(){
        $clients = Client::all(); 
        //$customers = Student::paginate(3);
        return view('admin.clientList')->with('clients', $clients);

    }  
    public function customerList(){
        $customers = Customer::all(); 
        //$customers = Student::paginate(3);
        return view('admin.customerList')->with('customers', $customers);

    }

    public function clientDelete(Request $request){
        $client = Client::where('email', $request->email)->first();
        $client->delete();
       
    }

    public function customerDelete(Request $request){
        $customer = Customer::where('name', $request->name)->first();
        $customer->delete();

        return redirect()->route('customerList');
    }
    public function clientEdit(Request $request){
        $client = Client::where('id', $request->id)->first();
        return view('admin.clientEdit')->with('client', $client);
        
    }
    public function clientEditSubmitted(Request $request){
        $client = Client::where('id', $request->id)->first();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        return redirect()->route('clientList');

    }

    public function customerEdit(Request $request){
        $customer = Customer::where('customer_id', $request->customer_id)->first();
        return view('admin.customerEdit')->with('customer', $customer);
        
    }
    public function customerEditSubmitted(Request $request){
        $customer = Customer::where('customer_id', $request->customer_id)->first();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password= $request->password;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customertList');

    }
   
       
}
