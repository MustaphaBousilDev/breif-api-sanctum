<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albumes;
class AlbumeController extends Controller
{
    //
    public function index(){
        $album = Albumes::all();
        return response()->json($album);
    }
    public function store(Request $request){
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $album = new Albumes();
        $album->user_id = 1; // add authenticated user id here  
        $album->artiste_id = 1 ;
        $album->title = $request->title;
        $album->img_path = '/images/' . $imageName;
        $album->release_date = $request->release_date;
        $album->save();
        }
    public function show($id){
        $album = Albumes::find($id);
        return response()->json($album);
    }
    public function update(Request $request, $id){
        $album =Albumes::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'release_date' => 'required|date'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $album->title = $request->title;
        $album->img_path = '/images/' . $imageName;
        $album->release_date = $request->release_date;
        $album->save();
        return response()->json(['message' => 'User updated successfully']);
    }
    public function destroy($id){
        //
        $album = Albumes::find($id);
        $album->delete();
    }
}
