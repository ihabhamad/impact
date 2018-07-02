<?php

namespace App\Http\Controllers\AdminPanel;

use App\Experiance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {

        $this->middleware('auth:admin');

    }

    public function index()
    {
        $experiances = Experiance::withTrashed()->get();
        return view('admin.experiance.index',compact('experiances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experiance.create');
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
        $this->validate($request,[
            'experiance_name'  => 'required|unique:experiances,experiance|max:50'
        ]);

        $new = new Experiance;
        $new->experiance = $request->experiance_name;
        $new->save();
        return redirect()->back()->with('message', $new->experiance .' Experiance has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $experiance = Experiance::find($id);
        return view('admin.experiance.edit',compact('experiance'));
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


        $this->validate($request,[
            'experiance_name'  => 'required|max:50'
        ]);

        $new =  Experiance::find($id);
        $old = $new->experiance;
        $new->experiance = $request->experiance_name;
        $new->save();
        return redirect()->back()->with('message',' Experiance has been Updated From ['.$old.'] to ['.$new->experiance.']');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiance = Experiance::find($id);
        $experiance->delete();
        return redirect()->back()->with('message','experiance has been Deleted.');
    }

    public function froceDestroy($id){
        $experiance = Experiance::onlyTrashed()->find($id);
        $experiance->forceDelete();
        return redirect()->back()->with('message','experiance has been Force Deleted.');
    }
    public function restore($userId){
        $experiance = Experiance::onlyTrashed()->find($userId);
        $experiance->restore();
        return redirect()->back()->with('message','experiance has been restored.');
    }
}
