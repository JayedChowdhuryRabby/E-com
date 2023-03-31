<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Client;
use App\Models\Token;
use App\Models\Admin;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=>"required|min:5|max:30",
            "customer_id"=>"required",
            'email'=>'email',
            'password'=>'required',
            'address'=>'required',
            'phone'=>'required',
    

        ]);
        if ($validator->fails())
        {
            return response()->json([
                'validation_errors'=>$validator->messages(),

            ]);
        }
        else
        {
            $customer =Customer::create([
                "name"=>$request->name,
                "customer_id"=>$request->customer_id,
                'email'=>$request->email,
                'password'=>$request->password,
                'address'=>$request->address,
                'phone'=>$request->phone,
        

            ]);
            $token =$customer->createToken($customer->email.'_Token')->plainTextToken;
            return response()->json([
                'status'=>200,
                'username'=>$customer->name,
                'token'=>$token,
                'message'=>'Registered Successfully',
                
                

                
            ]);
        }
    }

   
    public function  login(Request $request)
    {
     
        $customer = Customer::where('email',$request->email)->where('password',$request->password)->first();
        $client = Client::where('email',$request->email)->where('password',$request->password)->first();
        $admin = Admin::where('email',$request->email)->where('password',$request->password)->first();
    
        if($customer){
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $customer->customer_id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return "Customer found";
        }
        else if($client)
        {
           
            

            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $client->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return "Client found";
        }
        else if($admin)
        {    
            
            $api_token = Str::random(64);
            $token = new Token();
            $token->userid = $admin->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            $token->save();
            return "Admin found";

        
       
          
        }
        else
        {
            return "No user found";

        }

    }
    public function  logout(Request $req){

        $token = Token::where('token',$req->token)->first();
        if($token){
            $token->expired_at =new DateTime();
            $token->save();
            return $token;
        }
}
public function CustomerList(){

    $customers = Customer::all();
    return response()->json([
        'status'=>200,
        'clients'=>$customers
    ]);
  
}
}
