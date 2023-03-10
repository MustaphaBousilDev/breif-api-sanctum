<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);
        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);
        $token=$user->createToken('mytoken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    public function login(Request $request){
        $fields=$request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        //check email 
        $user=User::where('email',$fields['email'])->first();
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'failed connect'
            ],401);
        }
        $token=$user->createToken('mytoken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message'=>'Deconnection'
        ];
    }
    public function roleUpdate($id , Request $request){
        //change role user
        $user=User::find($id);
        if(Auth::user()->utype=='ADM'){
            //update user role  method put
            $user->utype=$request->utype;
            $user->save();
            return response()->json(['message'=>'role changed']);
        }else{
            return response()->json(['message'=>'you are not admin']);
        }
    }

}
