<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;


class CustomerController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function customer(){
        
        $message = "Welcome to customer page";
        return view('customer.customerCreate')->with('message', $message);
    }

    public function customerCreateSubmitted(Request $request)
    {
        $validate = $request->validate([
            "name"=>"required|min:5|max:30",
            "customer_id"=>"required",
            'password'=>'required',
            'email'=>'email',
        ],
        ['name.required'=>"Please put you name here"]
    );
        $customer = new  Customer();
        $customer->name = $request->name;
        $customer->customer_id = $request->customer_id;
        $customer->email = $request->email;
        $customer->password=$request->password;
        $customer->address=$request->address;
        $customer->phone=$request->phone;
        $customer->save();

        return redirect('login');
    }

    public function customerDash(){
        return view('customer.customerDash');

    }

    public function myOrders(){
        $customer_id = session()->get('user');
        $orders = Order::where('customer_id',$customer_id)->get();
        return view('customer.myorders')->with('orders',$orders);
    }

    
    public function orderdetails(Request $request){
        $id = $request->id;
        $order = Order::where('id',$id)->first();
        //return $order->products[0]->order->customer;
        return view('customer.orderdetails')->with('order',$order);
    }

    public function register(Request $req)
    {
        $customer=new Customer();
        $customer->name=$req->name;
        $customer->customer_id = $req->customer_id;
        $customer->email = $req->email;
        $customer->password=$req->password;
        $customer->address=$req->address;
        $customer->phone=$req->phone;

        $customer->save();
        return $customer;

    }

    
}


    

