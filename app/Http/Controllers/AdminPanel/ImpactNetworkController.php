<?php

namespace App\Http\Controllers\AdminPanel;

use App\ImpactNetwork;
use Illuminate\Support\Facades\View;

use App\Experiance;
use App\Guidance;
use App\ImpactNetworksGuidance;
use App\ImpactNetworksExperiance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extramenu;


class ImpactNetworkController extends Controller
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
        $impactnetworks = ImpactNetwork::withTrashed()->get();
        return view('admin.impactnetworks.index',compact('impactnetworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guidances = Guidance::all();
        $experiances = Experiance::all();
        return view('admin.impactnetworks.create',compact('guidances','experiances'));
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
            'Full_Name'  => 'required|unique:impact_networks,Full_Name|max:50',
            'Current_Position'  => 'required|max:150',
            'Currently_based_on'  => 'required|max:150',
            'experiances'       => 'required',
            'guidances'         => 'required',
        ]);

        $new = new ImpactNetwork;
        $new->Full_Name = $request->Full_Name;
        $new->Current_Position = $request->Current_Position;
        $new->Currently_based_on = $request->Currently_based_on;
        $new->save();
        if(count($request->experiances) > 0){
            foreach ($request->experiances as $experiance){
                $user_experiance = new ImpactNetworksExperiance;
                $user_experiance->impact_network_id = $new->id;
                $user_experiance->experiance_id = $experiance;
                $user_experiance->save();

            }
        }
        if(count($request->guidances) > 0){
            foreach ($request->guidances as $guidance){
                $user_guidances =  new ImpactNetworksGuidance;
                $user_guidances->impact_network_id = $new->id;
                $user_guidances->guidance_id = $guidance;
                $user_guidances->save();

            }
        }
        return redirect()->back()->with('message', $new->Full_Name .'  has been added to Impact Networks.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guidances = Guidance::all();
        $experiances = Experiance::all();
        $impactnetwork = ImpactNetwork::find($id);
        return view('admin.impactnetworks.show',compact('impactnetwork','guidances','experiances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guidances = Guidance::all();
        $experiances = Experiance::all();
        $impactnetwork = ImpactNetwork::find($id);

        return view('admin.impactnetworks.edit',compact('impactnetwork','guidances','experiances'));
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
            'Full_Name'  => 'required|max:50',
            'Current_Position'  => 'required|max:150',
            'Currently_based_on'  => 'required|max:150'
        ]);

        $new =  ImpactNetwork::find($id);
        $new->Full_Name = $request->Full_Name;
        $new->Current_Position = $request->Current_Position;
        $new->Currently_based_on = $request->Currently_based_on;
        $new->save();
        if(count($request->experiances) > 0){
            $all_user_experiance =  ImpactNetworksExperiance::where('impact_network_id',$id)->pluck('experiance_id')->toArray();

            foreach ($request->experiances as $experiance){
                if(in_array($experiance,$all_user_experiance)){
                    unset($all_user_experiance[array_search($experiance, $all_user_experiance)]);
                }

                $user_experiance =  ImpactNetworksExperiance::where('experiance_id',$experiance)->first();
                if(!$user_experiance){
                    $user_experiance = new ImpactNetworksExperiance;
                }
                $user_experiance->impact_network_id = $id;
                $user_experiance->experiance_id = $experiance;
                $user_experiance->save();

            }
            if(count($all_user_experiance) > 0) {
                foreach ($all_user_experiance as $duexp) {
                    $deleted_user_experiance = ImpactNetworksExperiance::where('experiance_id', $duexp)->first();
                    $deleted_user_experiance->delete();
                }
            }
        }
        if(count($request->guidances) > 0){
            $all_user_guidances =  ImpactNetworksGuidance::where('impact_network_id',$id)->pluck('guidance_id')->toArray();
            foreach ($request->guidances as $guidance){
                if(in_array($guidance,$all_user_guidances)){
                    unset($all_user_guidances[array_search($guidance, $all_user_guidances)]);
                }
                $user_guidances =  ImpactNetworksGuidance::where('guidance_id',$guidance)->first();
                if(!$user_guidances){
                    $user_guidances = new ImpactNetworksGuidance;
                }
                $user_guidances->impact_network_id = $id;
                $user_guidances->guidance_id = $guidance;
                $user_guidances->save();

            }
            if(count($all_user_guidances) > 0) {
                foreach ($all_user_guidances as $duguid) {
                    $deleted_user_guidance = ImpactNetworksGuidance::where('guidance_id', $duguid)->first();
                    $deleted_user_guidance->delete();
                }
            }
        }
        return redirect()->back()->with('message',' Impact Network has been Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impactnetwork = ImpactNetwork::find($id);
        $impactnetwork->delete();
        return redirect()->back()->with('message','one item from Impact Network has been Deleted.');
    }
    public function froceDestroy($id){
        $impactnetwork = ImpactNetwork::onlyTrashed()->find($id);
        $impactnetwork->forceDelete();
        return redirect()->back()->with('message','one item from Impact Network has been Force Deleted.');
    }
    public function restore($userId){
        $impactnetwork = ImpactNetwork::onlyTrashed()->find($userId);
        $impactnetwork->restore();
        return redirect()->back()->with('message','one item from Deleted Impact Network has been restored.');
    }
}
