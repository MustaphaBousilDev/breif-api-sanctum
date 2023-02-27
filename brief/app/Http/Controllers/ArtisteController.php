<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Artiste;
class ArtisteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Artiste::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation 
        $request->validate([
            'name'=>'required',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['user_id']=Auth::user()->id;
       
        
        return Artiste::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Artiste::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
        $artiste=Artiste::find($id);
        $artiste->update([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id
        ]);
        
        return response()->json([
            'message'=> "updated successfuly",
            'artistes'=>$artiste
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Artiste::destroy($id);
    }

    public function search($name){
        return Artiste::where('name','like','%'.$name.'%')->get();
    }
}
