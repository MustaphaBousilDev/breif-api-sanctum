<?php

namespace App\Http\Controllers;
use App\Models\Paroless;
use Auth;
use Illuminate\Http\Request;
use App\Http\Resources\ParolesCollection;
class ParolesController extends Controller{
    //
    public function index(){
        $paroles = Paroless::all();
        
        return response()->json($paroles);
    }
    public function store(Request $request){
        $request->validate([
            'paroles'=>'required',
            'user_id'=>'required',
            'musiques_id' => 'required'
        ]);
        return Paroless::create($request->all());
        
    }
    public function show($id){
        return Paroless::find($id);
    }


    
    public function update(Request $request, $id){
        $parole =Paroless::find($id);
        ##dd($parole->user_id);
     
        if($parole && $parole->user_id==Auth::user()->id){
            $request->validate(['paroles' => 'required|string|max:255',]);
            $parole->paroles = $request->paroles;
            $parole->user_id = $request->user_id;
            $parole->musiques_id= $request->musiques_id;
            $parole->save();
            return response()->json(['message' => 'paroles updated successfully']);
        }else{
            return 'error';
        }
    }
    public function destroy($id){
        
        $parole =Paroless::find($id);
        if($parole && $parole->user_id==Auth::user()->id){
            Paroless::destroy($id);
            return response()->json(['message' => 'paroles delete successfully']);
        }else{
            return response()->json(['message'=>'you dont have authoruzation for delete this parole']);
        }
    }
}
