<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Number;
use App\Models\Subject;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $numbers = Number::paginate(10);
        $candidates = Candidate::paginate(8);
        $subjects = Subject::all();

        return view('admin.number.index', compact('numbers', 'candidates', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.number.createNumber');
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
            'number'=>'required|numeric|unique:numbers,number',
        ],
        [
            'number.required' => 'Fusha Numri duhet te plotesohet',
        ]
    );

        $number = new Number();
        $number->number = $request->number;
        $number->save();
        return redirect('numbers/create')->with('message', 'Numri eshte regjistruar me sukses!');
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
        $number = Number::findorFail($id);
        return view('admin.number.editNumber', compact('number'));
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
        $number = Number::findorFail($id);
        $request->validate([
            'number'=>'required|numeric|unique:numbers,number',
        ],
        [
            'number.required' => 'Fusha Numri duhet te plotesohet',
        ]
    );

        $number->number = $request->number;
        $number->save();
        return redirect('numbers/'.$id.'/edit')->with('message', 'Numri eshte modifikuar me sukses!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $number = Number::findorFail($id);
        $number->delete();
        return redirect('numbers')->with('message','Numri eshte fshire me sukses!');
    }
}
