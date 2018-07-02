<?php

namespace App\Http\Controllers\AdminPanel;

use App\Guidance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuidanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth:admin');

    }
    public function index()
    {
        $guidances = Guidance::withTrashed()->get();
        return view('admin.guidances.index',compact('guidances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guidances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'guidance_name'  => 'required|unique:guidances,guidance|max:50'
        ]);

        $new = new guidance;
        $new->guidance = $request->guidance_name;
        $new->save();
        return redirect()->back()->with('message', $new->guidance .' guidance has been added.');
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
        $guidance = Guidance::find($id);
        return view('admin.guidances.edit',compact('guidance'));
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
            'guidance_name'  => 'required|max:50'
        ]);

        $new =  Guidance::find($id);
        $old = $new->guidance;
        $new->guidance = $request->guidance_name;
        $new->save();
        return redirect()->back()->with('message',' guidance has been Updated From ['.$old.'] to ['.$new->guidance.']');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guidance = Guidance::find($id);
        $guidance->delete();
        return redirect()->back()->with('message','guidance has been Deleted.');
    }
    public function froceDestroy($id){
        $guidance = Guidance::onlyTrashed()->find($id);
        $guidance->forceDelete();
        return redirect()->back()->with('message','guidance has been Force Deleted.');
    }
    public function restore($userId){
        $guidance = Guidance::onlyTrashed()->find($userId);
        $guidance->restore();
        return redirect()->back()->with('message','guidance has been restored.');
    }
}
