<?php

namespace App\Http\Controllers\AdminPanel;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menuitem;
use App\Post;
use App\Advertisement;
use Carbon\Carbon;

class MenuitememController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Show($menuId)
    {
        $menus = Menuitem::Where('extramenu_id', $menuId)->withTrashed()->get();
        return view('admin.menutems.show', compact('menus', 'menuId'));
    }

    public function newItem($menuId)
    {
        $posts = Post::select('id', 'title')->get();
        $Apps = Application::select('id', 'title')->get();
        $parents = Menuitem::where('parentid',null)->get();

        return view('admin.menutems.new', compact('menuId', 'posts', 'Apps','parents'));
    }

    public function Store($menuId, request $Request)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $link_type = $Request->link_type;
        if ($link_type == "post") {
            $relative_id = $Request->link_to_post;
        } else if ($link_type == "application") {
            $relative_id = $Request->link_to_app;
        } else {
            $relative_id = null;
        }
        $is_child = $Request->is_child;
        if($is_child){
            $parentid = $Request->parentid;
        }else{
            $parentid = null;
        }
        $new = new Menuitem;
        $new->name = $Request->name;
        $new->parentid = $parentid;
        $new->link = $Request->link;
        $new->extramenu_id = $menuId;
        $new->link_type = $Request->link_type;
        $new->relative_id = $relative_id;
        $new->css = $Request->css;

        $new->save();
        return redirect(route('Items.manage', $menuId))->with('message', 'new Item has been created.');


    }

    public function Edit($menuId, $itemId)

    {
        $menuitem = Menuitem::find($itemId);
        $posts = Post::select('id', 'title')->get();
        $parents = Menuitem::where('parentid',null)->get();
        $Apps = Application::select('id', 'title')->get();
        return View('admin.menutems.edit', compact('menuitem', 'menuId','posts','Apps','parents'));
    }

    public function Update($menuId, $itemId, request $Request)
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);
        $link_type = $Request->link_type;
        if ($link_type == "post") {
            $relative_id = $Request->link_to_post;
        } else if ($link_type == "application") {
            $relative_id = $Request->link_to_app;
        } else {
            $relative_id = null;
        }
        $is_child = $Request->is_child;
        if($is_child){
            $parentid = $Request->parentid;
        }else{
            $parentid = null;
        }
        $new = Menuitem::find($itemId);
        $new->name = $Request->name;
        $new->link = $Request->link;
        $new->parentid = $parentid;
        $new->extramenu_id = $menuId;
        $new->link_type = $Request->link_type;
        $new->relative_id = $relative_id;
        $new->css = $Request->css;
        $new->save();
        return redirect(route('Items.manage', $menuId))->with('message', 'Item [ ' . $Request->name . ' ] has been updated.');
    }

    public function delete($menuId, $itemId)
    {
        $Menuitem = Menuitem::find($itemId);
        $Menuitem->delete();
        return redirect()->back()->with('message', 'Item has been Deleted.');
    }

    public function forceDelete($menuId, $itemId)
    {
        $Menuitem = Menuitem::onlyTrashed()->find($itemId);
        $Menuitem->forceDelete();
        return redirect(route('Items.manage', $menuId))->with('message', 'Item has been force deleted.');
    }

    public function restore($menuId, $itemId)
    {
        $Menuitem = Menuitem::onlyTrashed()->find($itemId);
        $Menuitem->restore();
        return redirect(route('Items.manage', $menuId))->with('message', 'Item has been restored.');
    }

}
