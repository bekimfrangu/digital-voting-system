<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Municipality;
use App\Models\Number;
use App\Models\Position;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $candidates = Candidate::paginate(5);
        $voters = User::all();

        $subjects = Subject::all();
        $positions = Position::all();
        $subjectId = $request->subject_id;
        $positionId = $request->position_id;
        $candidate = Candidate::where('subject_id', $subjectId)->where('position_id', $positionId)->get();
        
        return view('admin.candidate.index', compact('candidates', 'voters','subjects','positions','candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::findorFail($id);
        return view('admin.candidate.showCandidate', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        $subjects = Subject::all();
        $positions = Position::all();
        $numbers = Number::all();
        return view('admin.candidate.editCandidate', compact('candidate', 'subjects', 'positions','numbers'));
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
        $request->validate([
            'subject_id'=>'required',
            'position_id'=>'required',
            'image'=>'required',
        ]);

        $candidate = Candidate::findorFail($id);
        $candidate->subject_id = $request->subject_id;
        $candidate->position_id = $request->position_id;

        $candidate->save();
        return redirect('candidates/'.$id.'/edit')->with('message', 'Kandidati eshte modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid, $vid)
    {
        $candidate = Candidate::findorFail($cid);
        $voter = User::findorFail($vid);
        $voter->role = 'voter';
        $voter->save();
        $candidate->delete();
        
        return redirect('candidates')->with('message', 'Kandidati eshte fshire me sukses!');
    }

    public function candidateView($id)
    {
        $voter = User::findorFail($id);
        $subjects = Subject::all();
        $positions = Position::all();
        $numbers = Number::all();
        return view('admin.candidate.createCandidate', compact('voter', 'subjects', 'positions', 'numbers'));
    }

    public function candidate(Request $request, $id)
    {
        $voter = User::findorFail($id);
        $voter->role = 'candidate';
       
        $request->validate([
            'number_id'=>'required|numeric|unique:numbers,number',
            'subject_id'=>'required',
            'position_id'=>'required',
            'image'=>'required',
        ],
        [
            'number_id.required'=>'Duhet te zgjidhet nje Numer',
            'subject_id.required'=>'Duhet te zgjidhet nje Subjekt',
            'position_id.required'=>'Duhet te zgjidhet nje Pozite',
            'image.required'=>'Duhet te vendoset nje Foto',
        ]
);
        
        $candidate = new Candidate();
        $voterC = $request->voter_id;
       
        $candidate->voter_id = $voterC;
        $candidate->number_id = $request->number_id;
        $candidate->subject_id = $request->subject_id;
        $candidate->position_id = $request->position_id;
       
        $image = $request->image;
        $imageName = Carbon::now()->timestamp. '.' . $image->getClientOriginalExtension();
        $request->image->storeAs('voters', $imageName);
        $voter->image = $imageName;

        $candidate->save();
        $voter->save();
        return redirect('voters')->with('message', 'Kandidati eshte regjistruar me sukses!');
    }

    //candidateList
    public function candidateList()
    {
        $subjects = Subject::all();
        return view('admin.candidate.showCandidateList', compact('subjects'));
    }
}
