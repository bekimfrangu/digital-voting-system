<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdministrativeRegion;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = AdministrativeRegion::paginate(10);
        return view('admin.region.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.createRegion');
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
            'region'=>'required',
        ],
        [
            'region.required' => 'Fusha Rajoni duhet te plotesohet',
        ]
    );

        $region = new AdministrativeRegion();
        $region->region = $request->region;
        $region->save();
        return redirect('regions/create')->with('message', 'Rajoni eshte regjistruar me sukses!');
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
        $region = AdministrativeRegion::findorFail($id);
        return view('admin.region.editRegion', compact('region'));
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
            'region'=>'required',
        ],
        [
            'region.required' => 'Fusha Rajoni duhet te plotesohet',
        ]
    );

        $region = AdministrativeRegion::findorFail($id);
        $region->region = $request->region;
        $region->save();
        return redirect('regions/'.$id.'/edit')->with('message', 'Rajoni eshte modifikua me sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = AdministrativeRegion::findorFail($id);
        $region->delete();
        return redirect('regions')->with('message', 'Rajoni eshte fshire me sukses!');
    }
   
}
