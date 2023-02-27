<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Musiques;
use Illuminate\Support\Facades\Validator;


class MusiqueController extends Controller{
    
    public function store(Request $request){
        $music = new Musiques();
        $music->title = $request->title;  
        $music->user_id = $request->user_id ;
        $music->albume_id = $request->albume_id;
        $music->save();
        return response()->json(['message' => 'Musique added successfully']);


        return response()->json($music);
    }
    public function index(){
        $music = Musiques::all();
        return response()->json($music);
        
    }
    public function update(Request $request, $id){
        $music =Musiques::find($id);
        if($music){
            $request->validate([
                'title' => 'required|string|max:255',
            ]);
            $music->title = $request->title;
            $music->user_id = $request->user_id;
            $music->albume_id= $request->albume_id;
            $music->save();
            return response()->json(['message' => 'Musique updated successfully']);
        }else{
            return 'لا يوجد شيئ';
        }
        
    }
    
    public function delete($id){
        $music = Musiques::find($id);
        if ($music){
            $test = $music->delete();
            if($test){
                return "ok";
            }
            else{
                return "no";
            }
        }
        else
        {
            return "لا يوجد شيئ";
        }
    }
}
