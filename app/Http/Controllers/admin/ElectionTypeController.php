<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ElectionType;
use Illuminate\Http\Request;

class ElectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $electiontypes = ElectionType::paginate(10);
        return view('admin.electionType.index', compact('electiontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.electionType.createElectionType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['type'=>'required'],['type.required'=>'Fusha Lloji i zgjedhjeve duhet te plotesohet']);
        $electiontype = new ElectionType();
        $electiontype->type = $request->type;
        $electiontype->save();
        return redirect('election-types/create')->with('message', 'Lloji i zgjedhjeve eshte regjistruar me sukses!');
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
        $electiontype = ElectionType::findorFail($id);
        return view('admin.electionType.editElectionType', compact('electiontype'));
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
        $electiontype = ElectionType::findorFail($id); 
        $request->validate(['type'=>'required'],['type.required'=>'Fusha Lloji i zgjedhjeve duhet te plotesohet']);
        $electiontype->type = $request->type;
        $electiontype->save();
        return redirect('election-types/'.$id.'/edit')->with('message', 'Lloji i zgjedhjeve eshte modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electiontype = ElectionType::findorFail($id);
        $electiontype->delete();
        return redirect('election-types')->with('message', 'Lloji i zgjedhjeve eshte fshire me sukses!');
    }

      //reset
      public function reset()
      {
          foreach(ElectionType::all() as $electionType)
          {
              $electionType->delete();
          }
          return redirect('election-types')->with('message','Te gjitha llojet e zgjedhjeve jane fshire me sukses!');
      }
}
