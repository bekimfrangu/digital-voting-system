<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Municipality;
use App\Models\Number;
use App\Models\Subject;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $candidates = Candidate::all();
        $numbers = Number::all();
        $municipalities = Municipality::all();
        $elections = Election::all();
        $users = User::all();
        $user = Auth::user();
        $election = Election::where('municipality_id',$user->municipality_id)->get();

        $voted = Vote::where('voter_id', $user->id)->get();
        $votedV = Vote::where('voter_id', $user->id)->count();
        $votes = Vote::all();

        $timeElection = Election::select('date','start_time', 'end_time')->first();
        $electionF = Election::all()->first();
        return view('user.home', compact('subjects','municipalities','elections', 'numbers', 'candidates', 'user',
        'election', 'voted', 'votes', 'votedV', 'timeElection', 'electionF'
    ));
    }

    public function vote(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'candidate_id' => 'required'
        ]);

        $vote = new Vote();

        $vote->voter_id = $request->voter_id;
        $vote->subject_id = $request->subject_id;
        $vote->candidate_id = $request->candidate_id;
        if($vote->save())
        {
            return redirect('/home')->with('message', 'Vota juaj eshte regjistruar me sukses!');
        }
    }

    public function voteConvention(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'subject_id' => 'required',
            'candidate_id' => 'required'
        ]);

        $candidates = $request->candidate_id;
        foreach($candidates as $cand)
        {   
             $vote = new Vote();
             $vote->voter_id = $request->voter_id;
             $vote->subject_id = $request->subject_id;
             $vote->candidate_id = $cand;
             $vote->save();
        }

            return redirect('/home')->with('message', 'Vota juaj eshte regjistruar me sukses!');

    }
}
