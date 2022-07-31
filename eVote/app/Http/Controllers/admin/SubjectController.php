<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Number;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
class SubjectController extends Controller
{
    use WithFileUploads;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::paginate(5);
        return view('admin.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numbers = Number::all();
        return view('admin.subject.createSubject', compact('numbers'));
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
            'number_id'=>'required|numeric|unique:numbers,number',
            'name'=>'required',
            'abbreviation' => 'required',
            'slogan'=>'required',
            'description'=>'required',
            'logo'=>'required|',
        ],
        [
            'number_id.required' => 'Nje Numer duhet te selektohet',
            'name.required' => 'Fusha Subjekti duhet te plotesohet',
            'abbreviation.required' => 'Fusha Shkurtesa duhet te plotesohet',
            'slogan.required' => 'Fusha Sllogani duhet te plotesohet',
            'description.required' => 'Fusha Pershrimi duhet te plotesohet',
            'logo.required' => 'Nje Llogo duhet te vendoset'
        ]
    );

        $subject = New Subject();

        $subject->number_id = $request->number_id;
        $subject->name = $request->name;
        $subject->abbreviation = $request->abbreviation;
        $subject->slogan = $request->slogan;
        $subject->description = $request->description;

        $logo = $request->logo;
        $imageName = Carbon::now()->timestamp. '.' . $logo->getClientOriginalExtension();
        $request->logo->storeAs('subjects', $imageName);
        $subject->logo = $imageName;

        $subject->save();
        return redirect('subjects/create')->with('message', 'Subjekti politik eshte regjistruar me sukses!');
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
        $subject = Subject::findorFail($id);
        $image = $subject->logo;
        $numbers = Number::All();
        return view('admin.subject.editSubject', compact('subject', 'image', 'numbers'));
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
        $subject = Subject::findorFail($id);

        $request->validate([
            'number_id'=>'required|numeric|unique:numbers,number',
            'name'=>'required',
            'abbreviation' => 'required',
            'slogan'=>'required',
            'description'=>'required',
            'logo'=>'required|',
        ],
        [
            'number_id.required' => 'Nje Numer duhet te selektohet',
            'name.required' => 'Fusha Subjekti duhet te plotesohet',
            'abbreviation.required' => 'Fusha Shkurtesa duhet te plotesohet',
            'slogan.required' => 'Fusha Sllogani duhet te plotesohet',
            'description.required' => 'Fusha Pershrimi duhet te plotesohet',
            'logo.required' => 'Nje Llogo duhet te vendoset'
        ]
    );


        $subject->number_id = $request->number_id;
        $subject->name = $request->name;
        $subject->abbreviation = $request->abbreviation;
        $subject->slogan = $request->slogan;
        $subject->description = $request->description;

        $logo = $request->logo;
        $imageName = Carbon::now()->timestamp. '.' . $logo->getClientOriginalExtension();
        $request->logo->storeAs('subjects', $imageName);
        $subject->logo = $imageName;

        $subject->save();
        return redirect('subjects/'.$id.'/edit')->with('message', 'Subjekti politik eshte modifikuar me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findorFail($id);
        if($subject->logo)
        {
            unlink('admin/images/subjects/'.$subject->logo);
        }
        $subject->delete();
        return redirect('subjects')->with('message','Subjekti politik eshte fshire me sukses!');
    }

    //reset
    public function reset()
    {
        foreach(Subject::all() as $subject)
        {
            $subject->delete();
        }
        return redirect('subjects')->with('message','Te gjitha Partite jan fshire me sukses!');
    }
}
