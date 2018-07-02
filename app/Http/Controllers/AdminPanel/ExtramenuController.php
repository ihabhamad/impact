<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extramenu;
use App\Menuitem;
class ExtramenuController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function Show()
    {
		$extramenus = Extramenu::withTrashed()->get();
        return view('admin.extramenus.show',compact('extramenus'));
	}

	public function newextramenus()
	{
		 return view('admin.extramenus.new');
	}
	public function Store(request $Request)
	{
		$this->validate(request(),[
                'name'  =>  'required',
                'position'  =>  'required',
          ]);
         $new = new Extramenu;
         $new->name = $Request->name;
         $new->css     = $Request->css;
         $new->position     = $Request->position;
        
         $new->save();
           return redirect(route('Extramenus.manage'))->with('message','new Menu ['.$Request->name.'] has been created.');
        
         
        
	}
	public function Edit($itemId)
	{
		 $extramenu = Extramenu::find($itemId);
		 return View('admin.extramenus.edit',compact('extramenu'));	
	}
	public function Update($itemId,request $Request)
	{
	$this->validate(request(),[
                'name'  =>  'required',
                'position'  =>  'required',
          ]);
         $new =  Extramenu::find($itemId);
         $new->name = $Request->name;
         $new->css     = $Request->css;
         $new->position     = $Request->position;
         $new->save();
	     return redirect(route('Extramenus.manage'))->with('message','Menu [ '.$Request->name.' ] has been updated.');
	}
	public function delete($itemId)
	{
		$extramenu = Extramenu::find($itemId);
		$extramenu->delete();
		return redirect()->back()->with('message','Menu has been Deleted.');
	}
	public function forceDelete($itemId){
		$extramenu = Extramenu::onlyTrashed()->find($itemId);
		$menuitems = Menuitem::where('extramenu_id',$itemId)->withTrashed()->get();
		foreach($menuitems as $item){
			$item->forceDelete();
		}
		$extramenu->forceDelete();
		return redirect(route('Extramenus.manage'))->with('message','Menu has been force deleted.');
	}
	public function restore($itemId){
		$extramenu = Extramenu::onlyTrashed()->find($itemId);
		$extramenu->restore();
		return redirect(route('Extramenus.manage'))->with('message','Menu has been restored.');
	}
}
