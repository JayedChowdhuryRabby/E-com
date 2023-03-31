<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\RequestOrderToServiceProvider;
use App\Http\Requests\StoreRequestOrderToServiceProviderRequest;
use App\Http\Requests\UpdateRequestOrderToServiceProviderRequest;
use Illuminate\Http\Request;
class RequestOrderToServiceProviderController extends Controller
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
     * @param  \App\Http\Requests\StoreRequestOrderToServiceProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestOrderToServiceProviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestOrderToServiceProvider  $requestOrderToServiceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(RequestOrderToServiceProvider $requestOrderToServiceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestOrderToServiceProvider  $requestOrderToServiceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestOrderToServiceProvider $requestOrderToServiceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequestOrderToServiceProviderRequest  $request
     * @param  \App\Models\RequestOrderToServiceProvider  $requestOrderToServiceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequestOrderToServiceProviderRequest $request, RequestOrderToServiceProvider $requestOrderToServiceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestOrderToServiceProvider  $requestOrderToServiceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestOrderToServiceProvider $requestOrderToServiceProvider)
    {
        //
    }

    public function createRorder(){
        
        $message = "";
        return view('orderRequest.createRorder')->with('message', $message);
    }
    
    public function createRordersubmitted(Request $request)
    {
        $validate = $request->validate([
            "productname"=>"required|min:5|max:20",
            //"id"=>"required",
            'quantity'=>'required',
            'email'=>'email',
        ],
        ['productname.required'=>"Please put you product name here"]
    );
        $requestOrderToServiceProvider = new  RequestOrderToServiceProvider();
        $requestOrderToServiceProvider->productname = $request->productname;
        $requestOrderToServiceProvider->quantity = $request->quantity;
        $requestOrderToServiceProvider->productdetails = $request->productdetails;
        $requestOrderToServiceProvider->address=$request->address;
        $requestOrderToServiceProvider->phone=$request->phone;
        $requestOrderToServiceProvider->email = $request->email;
        
        $requestOrderToServiceProvider->save();

        return redirect('customer/dash');
    }

    public function requestOrderList(){
        $requestOrderToServiceProviders = RequestOrderToServiceProvider::all(); 
        return view('service.requestOrderList')->with('requestOrderToServiceProviders', $requestOrderToServiceProviders);

    }  

}
