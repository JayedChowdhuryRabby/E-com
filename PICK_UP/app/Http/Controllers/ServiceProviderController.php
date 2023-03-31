<?php

namespace App\Http\Controllers;

use App\Models\serviceProvider;
use App\Http\Requests\StoreserviceProviderRequest;
use App\Http\Requests\UpdateserviceProviderRequest;
use Illuminate\Http\Request;
class ServiceProviderController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceProviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\serviceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(serviceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\serviceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(serviceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceProviderRequest  $request
     * @param  \App\Models\serviceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceProviderRequest $request, serviceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\serviceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(serviceProvider $serviceProvider)
    {
        //
    }
    public function create(){
        
        $message = "";
        return view('service.serviceprovidercreate')->with('message', $message);
    }
    
    public function createsubmitted(Request $request)
    {
        $validate = $request->validate([
            "name"=>"required|min:5|max:20",
            //"id"=>"required",
            'password'=>'required',
            'email'=>'email',
        ],
        ['name.required'=>"Please put you name here"]
    );
        $serviceProvider = new  ServiceProvider();
        $serviceProvider->name = $request->name;
       // $service->shopname = $request->shopname;
        //$service->id = $request->id;
        $serviceProvider->email = $request->email;
        $serviceProvider->password=$request->password;
        $serviceProvider->address=$request->address;
        $serviceProvider->mobileNumber=$request->mobileNumber;
        
        $serviceProvider->save();

        return redirect('login');
    }
    public function serviceDash(){
        return view('service.serviceDash');

    }


}
