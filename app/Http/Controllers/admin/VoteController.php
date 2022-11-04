<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::paginate(20);
        $votesDistinct = Vote::orderBy('id','DESC')->distinct()->get(['voter_id', 'subject_id']);
        $candidates = Vote::all('candidate_id');
        return view('admin.vote.index', compact('votes', 'votesDistinct','candidates'));
    }
}
