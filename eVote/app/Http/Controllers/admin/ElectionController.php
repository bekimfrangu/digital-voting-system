<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use App\Models\ElectionType;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        $municipalities = Municipality::all();
        $electiontypes = ElectionType::all();
        return view('admin.election.index', compact('elections','municipalities','electiontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities = Municipality::all();
        $electiontypes = ElectionType::all();
        return view('admin.election.createElection', compact('municipalities','electiontypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'electiontype_id'=>'required',
            'municipality_id'=>'required',
            'date' => 'required|date',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i|after:start_time',
        ],
        [
            'electiontype_id.required'=>'Duhet te Zgjidhet nje Lloj i zgjedhjeve',
            'municipality_id.required'=>'Duhet te Zgjidhet nje Komune',
            'date.required' => 'Fusha Data duhet te plotesohet',
            'start_time.required'=>'Fusha Koha e Fillimit duhet te plotesohet',
            'end_time.required'=>'Fusha Koha e Mbarimit duhet te plotesohet',
        ]
    );

        $election = New Election();
        $election->electiontype_id = $request->electiontype_id;
        $election->municipality_id = $request->municipality_id;
        $election->date = $request->date;
        $election->start_time = $request->start_time;
        $election->end_time = $request->end_time;
        $election->save();
        return redirect('elections/create')->with('message', 'Zgjedhjet jane regjistruar me sukses!');
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
        $election = Election::findorFail($id);
        $municipalities = Municipality::all();
        $electiontypes = ElectionType::all();
        return view('admin.election.editElection', compact('election','municipalities','electiontypes'));
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
        $election = Election::findorFail($id);

        $request->validate([
            'electiontype_id'=>'required',
            'municipality_id'=>'required',
            'date' => 'required|date',
            'start_time'=>'required|date_format:H:i',
            'end_time'=>'required|date_format:H:i|after:start_time',
        ],
        [
            'electiontype_id.required'=>'Duhet te Zgjidhet nje Lloj i zgjedhjeve',
            'municipality_id.required'=>'Duhet te Zgjidhet nje Komune',
            'date.required' => 'Fusha Data duhet te plotesohet',
            'start_time.required'=>'Fusha Koha e Fillimit duhet te plotesohet',
            'end_time.required'=>'Fusha Koha e Mbarimit duhet te plotesohet',
        ]
    );

        $election->electiontype_id = $request->electiontype_id;
        $election->municipality_id = $request->municipality_id;
        $election->date = $request->date;
        $election->start_time = $request->start_time;
        $election->end_time = $request->end_time;
        $election->save();
        return redirect('elections/'.$id.'/edit')->with('message', 'Zgjedhjet jane modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $election = Election::findorFail($id);
        $election->delete();
        return redirect('elections')->with('message', 'Zgjedhjet jane fshire me sukses!');
    }

     //reset
     public function reset()
     {
         foreach(Election::all() as $election)
         {
             $election->delete();
         }
        return redirect('elections')->with('message','Te gjitha zgjedhjet jane fshire me sukses!');
     }
}
