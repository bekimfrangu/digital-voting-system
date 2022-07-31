<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrativeRegion;
use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::paginate(10);
        return view('admin.municipality.index', compact('municipalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = AdministrativeRegion::all();
        return view ('admin.municipality.createMunicipality', compact('regions'));
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
            'name'=>'required',
            'region_id' => 'required',
        ],
        [
            'name.required' => 'Fusha Komuna duhet te plotesohet',
            'region_id.required' => 'Nje Rajone duhet te selektohet'
        ]);

        $municipality = New Municipality();
        $municipality->name = $request->name;
        $municipality->region_id = $request->region_id;
        $municipality->save();
        return redirect('municipalities/create')->with('message', 'Komuna eshte regjistruar me sukses!');
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
        $municipality = Municipality::findorFail($id);
        $regions = AdministrativeRegion::all();
        return view('admin.municipality.editMunicipality', compact('municipality', 'regions'));
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
            'name'=>'required',
            'region_id' => 'required',
        ],
        [
            'name.required' => 'Fusha Komuna duhet te plotesohet',
            'region_id.required' => 'Nje Rajone duhet te selektohet'
        ]);

        
        $municipality = Municipality::findorFail($id);
        $municipality->name = $request->name;
        $municipality->region_id = $request->region_id;
        $municipality->save();
        return redirect('municipalities/'.$id.'/edit')->with('message', 'Komuna eshte modifikuar me sukses!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality = Municipality::findorFail($id);
        $municipality->delete();
        return redirect('municipalities')->with('message','Komuna eshte fshire me sukses!');
    }
}
