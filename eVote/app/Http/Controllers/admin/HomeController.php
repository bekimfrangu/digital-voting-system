<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Subject;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $voters = User::all()->count();
        $vvoted = Vote::all();
        $candidates = Candidate::all();
        $subjects = Subject::all();
        $votes = Vote::all();
        $votesCount = Vote::all()->count();

        $vvotedCount = Vote::all()->count();
        $distinctVoters = Vote::distinct()->get(['voter_id'])->count();
        return view('admin.home', compact('user', 'voters','subjects', 'vvoted','candidates','votes', 'votesCount', 'vvotedCount','distinctVoters'));
    }
}
