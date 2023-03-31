<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Token;
use App\Models\Product;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class AuthControllerClient extends Controller
{
    public function clientregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=>"required|min:5|max:30",
            'shopname'=>'required',
            'email'=>'email',
            'password'=>'required',
            'address'=>'required',
            'mobileNumber'=>'required',
    

        ]);
        if ($validator->fails())
        {
            return response()->json([
                'validation_errors'=>$validator->messages(),

            ]);
        }
        else
        {
            $client =Client::create([
                "name"=>$request->name,
                'shopname'=>$request->shopname,
                'email'=>$request->email,
                'address'=>$request->address,
                'mobileNumber'=>$request->mobileNumber,
                'password'=>$request->password,

        

            ]);
            $token =$client->createToken($client->email.'_Token')->plainTextToken;
            return response()->json([
                'status'=>200,
                'username'=>$client->name,
                'token'=>$token,
                'message'=>'Registered Successfully',
                
                

                
            ]);
        }
    }

    public function ClientList(){

        $clients = Client::all();
        return response()->json([
            'status'=>200,
            'clients'=>$clients
        ]);
      
    }

   
   
}
