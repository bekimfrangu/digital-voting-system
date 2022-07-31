<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Municipality;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //Search Voter

    public function searchVoter(Request $request)
    {
        $municipalities = Municipality::all();
        $municipalityId = $request->municipality_id;
        $fullname = $request->fullname;
        $voters = User::paginate(20);
        $voter = User::where('fullname', 'LIKE', '%'.$fullname.'%')->where('municipality_id', $municipalityId)->get();
        return view('admin.voter.index', compact('voter', 'municipalities','voters'));
    }

    public function index(Request $request)
    {   
        $municipalities = Municipality::all();
        $voters = User::orderBy('id','DESC')->paginate(10);
        $candidates = Candidate::all();

        $municipalityId = $request->municipality_id;
        $fullname = $request->fullname;
        $voter = User::where('fullname', 'LIKE', '%'.$fullname.'%')->where('municipality_id', $municipalityId)->get();
        return view('admin.voter.index', compact('voters', 'municipalities', 'voter', 'candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities = Municipality::all();
        return view('admin.voter.createVoter', compact('municipalities'));
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
            'fullname'=>'required',
            'municipality_id' => 'required',
            'password'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'personalnumber'=>'required|max:10|unique:users',
        ],
        [
            'fullname.required'=>'Fusha Emri dhe Mbiemri duhet te plotesohet',
            'municipality_id.required' => 'Duhet te zgjedhet nje Komune',
            'password.required'=>'Fusha Fjalekalimi duhet te plotesohet',
            'gender.required'=>'Fusha Gjinia duhet te Plotesohet si: Mashkull, Femer',
            'dob.required'=>'Fusha Datelindja duhet te plotesohet',
            'personalnumber.required'=>'Fusha Numri Personal Duhet te plotesohet',
        ]
    );

        $voter = new User();

        $voter->fullname = $request->fullname;
        $voter->municipality_id = $request->municipality_id;
        $voter->password = Hash::make($request->password);
        $voter->gender = $request->gender;
        $voter->dob = $request->dob;
        $voter->phonenumber = $request->phonenumber;
        $voter->address = $request->address;
        $voter->email = $request->email;
        $voter->personalnumber = $request->personalnumber;

        $image = $request->image;
        if($image)
        {
            $imageName = Carbon::now()->timestamp. '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('voters', $imageName);
            $voter->image = $imageName;

           
        } 
            $voter->save();
            return redirect('voters/create')->with('message', 'Votuesi eshte regjistruar me sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voter = User::findorFail($id);
        return view('admin.voter.showVoter', compact('voter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voter = User::findorFail($id);
        $municipalities = Municipality::all();
        return view('admin.voter.editVoter', compact('voter', 'municipalities'));
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
        $voter = User::findorFail($id);

        $request->validate([
            'fullname'=>'required',
            'municipality_id' => 'required',
            'password'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'personalnumber'=>'required|max:10',
        ],
        [
            'fullname.required'=>'Fusha Emri dhe Mbiemri duhet te plotesohet',
            'municipality_id.required' => 'Duhet te zgjedhet nje Komune',
            'password.required'=>'Fusha Fjalekalimi duhet te plotesohet',
            'gender.required'=>'Fusha Gjinia duhet te Plotesohet si: Mashkull, Femer',
            'dob.required'=>'Fusha Datelindja duhet te plotesohet',
            'personalnumber.required'=>'Fusha Numri Personal Duhet te plotesohet',
        ]
    );

        $voter->personalnumber = $request->personalnumber;
        $voter->municipality_id = $request->municipality_id;
        $voter->fullname = $request->fullname;
        $voter->gender = $request->gender;
        $voter->dob = $request->dob;
        $voter->phonenumber = $request->phonenumber;
        $voter->address = $request->address;
        $voter->email = $request->email;
       
        $image = $request->image;
        if($request->hasFile($image))
        {
            $imageName = Carbon::now()->timestamp. '.' .$image->getClientOriginalExtension();
            $request->image->storeAs('voters', $imageName);
            $voter->image = $imageName;
        }

        $voter->save();
        return redirect('voters/'.$id.'/edit')->with('message', 'Votuesi eshte modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voter = User::findorFail($id);

        if(Auth::user()->id === $id)
        {
            $voter->delete();
            session()->flush();
            return redirect('/');
        } else {
            $voter->delete();
             return redirect('voters')->with('message', 'Votuesi eshte fshire me sukses!');
        }
        
    }

    public function deleteCandidate($vid, $cid)
    {   
        $voter = User::findorFail($vid);
        $candidate = Candidate::findorFail($cid);
        $voter->role = 'voter';
        $voter->save();
        $candidate->delete();
        
        return redirect('voters')->with('message', 'Kandidati eshte fshire nga lista e kandidateve me sukses!');
    }
}
