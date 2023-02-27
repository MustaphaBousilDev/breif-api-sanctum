<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index(){
        //
        $users= User::all();
        return $users;
    }
    public function show($id){
        //12|IiDq8VdJQb9n2weetx91mgNahdFaGAtUQfE8J9Mk
        return User::find($id);
    }
    public function destroy($id){
        //
        $user=User::find($id);
        if($user){
            $user->delete();
        return response()->json(['message'=>' user deleted successfully']);
        }else{
            return 'this user is not exists ';
        }
    }
    public function update(Request $request,$id){
        
        $user=User::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        
        return response()->json([
            'message'=> "updated successfuly",
            'user'=>$user
        ]);
        
        ###############################"
        



    }

}
