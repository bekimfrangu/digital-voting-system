<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('admin.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.createPosition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['position'=>'required'],['position.required' => 'Fusha Pozita duhet te plotesohet']);
        $position = new Position();
        $position->position = $request->position;
        $position->save();
        return redirect('positions/create')->with('message', 'Pozita eshte regjistruar me sukses!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::findorFail($id);
        return view('admin.position.editPosition', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $position = Position::findorFail($id);
        $request->validate(['position'=>'required'],['position.required' => 'Fusha Pozita duhet te plotesohet']);
        $position->position = $request->position;
        $position->save();
        return redirect('positions/'.$id.'/edit')->with('message', 'Pozita eshte modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findorFail($id);
        $position->delete();
        return redirect('positions')->with('message','Pozita eshte fshire me sukses!');
    }

    
    //reset
    public function reset()
    {
        foreach(Position::all() as $position)
        {
            $position->delete();
        }
        return redirect('positions')->with('message','Te gjitha pozitat jane fshire me sukses!');
    }
}
