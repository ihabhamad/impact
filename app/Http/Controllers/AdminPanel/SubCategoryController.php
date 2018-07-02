<?php

namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Formlabel;
use App\Forminput;

class SubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Show($parentId)
    {
		$subcategories = Category::withTrashed()->where('cat_parent',$parentId)->orderBy('cat_priority','asc')->get();
		$parentname = Category::where('id',$parentId)->first()->cat_en_name;
        return view('admin.subcategories.show',compact('subcategories','parentId','parentname'));
	}
	public function NewSubCat($parentId)
	{
		 $priority = Category::where('cat_parent', $parentId)->orderBy('cat_priority', 'desc')->max('cat_priority') +1;
		 return view('admin.subcategories.new')->with('parentId',$parentId)->with('priority',$priority);
	}
	public function Store($parentId,request $Request)
	{
		if($parentId){
			
		
		$this->validate(request(),[
                'category_english_name'  => 'required|max:50|unique:categories,cat_en_name',
                'category_arabic_name'  => 'required|max:50',
                'en_category_description' => 'required|min:20',
                'ar_category_description' => 'required|min:20',
                'category_priority' => 'required',
                'image'             => 'image|mimes:jpg,jpeg,gif,png|max:2000',
                'icon'             => 'required'
          ]);
        
        if($Request->hasFile('image')){
         $image_name = str_random(20).'.'.$Request->file('image')->getClientOriginalExtension();
         $Request->file('image')->move(public_path('uploads/cats/images'),$image_name);
         }else{
		 	$image_name = NULL;
		 }
         $new = new Category;
         $new->cat_en_name = $Request->category_english_name;
         $new->cat_ar_name = $Request->category_arabic_name;
         $new->en_description = $Request->en_category_description;
         $new->ar_description = $Request->ar_category_description;
         $new->cat_priority = $Request->category_priority;
         $new->cat_parent   = $parentId;
         $new->cat_image     = $image_name;
         $new->icon          = $Request->icon;
         $new->slug   = str_slug($Request->category_english_name, '-');
         $new->save();
            
            if($Request->adsfields == 'yes'){
	         $newads = new Formlabel;
             $newads->en_value = "First image";
             $newads->ar_value = "الصورة الاولى";
	         $newads->type = "images";
	         $newads->priority = 3;
	         $newads->category_id = $new->id;
	         $newads->save();
	         $newads = new Formlabel;
	         $newads->en_value = "second image";
	         $newads->ar_value = "الصورةالثانية ";
	         $newads->type = "images";
	         $newads->priority = 4;
	         $newads->category_id = $new->id;
	         $newads->save();
	         $newads = new Formlabel;
	         $newads->en_value = "third image";
	         $newads->ar_value = "الصورةالثالثة ";
	         $newads->type = "images";
	         $newads->priority = 5;
	         $newads->category_id = $new->id;
	         $newads->save();
		 }
		 if($Request->adscities == 'yes'){
		 	 $newads = new Formlabel;
	         $newads->en_value = "City";
	         $newads->ar_value = "المدينة";
	         $newads->type = "cities";
	         $newads->priority = 1;
	         $newads->category_id = $new->id;
	         $newads->save();
		 }
		 if($Request->adsregions == 'yes'){
		 	$newads = new Formlabel;
	         $newads->en_value = "Region";
	         $newads->ar_value = "المنطقة";
	         $newads->type = "regions";
	         $newads->priority = 2;
	         $newads->category_id = $new->id;
	         $newads->save();
		 }
            return redirect(route('subcategories.manage',$parentId))->with('message','new category has been created.');
         }else{
		 	return redirect(route('subcategories.manage',$parentId))->with('message','error.');
		 }
	}
	public function Edit($parentId,$catId)
	{
		 $category = Category::find($catId);
		 return View('admin.subcategories.edit',compact('category','parentId'));	
	}
	public function update($parentId,$catId,request $Request)
	{
	$this->validate(request(),[
                 'category_english_name'  => 'required|max:50',
                 'category_arabic_name'  => 'required|max:50',
                 'en_category_description' => 'required|min:20',
                 'ar_category_description' => 'required|min:20',
                 'category_priority' => 'required',
                 'image'             => 'image|mimes:jpg,jpeg,gif,png|max:2000',
                 'icon'             => 'required'
          ]);
          $new =  Category::find($catId);
          if($Request->hasFile('image')){
		  	$image_name = str_random(20).'.'.$Request->file('image')->getClientOriginalExtension();
		  	$Request->file('image')->move(public_path('uploads/cats/images'),$image_name);
		  	if($new->cat_image != NULL){
				if(file_exists( public_path('uploads/cats/images/').$new->cat_image))
					{
					    unlink(public_path('uploads/cats/images/').$new->cat_image);
					}
			}
		  }else{
		  	$image_name = $new->cat_image;
		  }

         $new->cat_en_name = $Request->category_english_name;
         $new->cat_ar_name = $Request->category_arabic_name;
         $new->en_description = $Request->en_category_description;
         $new->ar_description = $Request->ar_category_description;
         $new->cat_priority = $Request->category_priority;
         $new->cat_parent   = $parentId;
         $new->cat_image    = $image_name;
         $new->icon         = $Request->icon;
         $new->save();	
	     return redirect(route('subcategories.manage',$parentId))->with('message','category [ '.$Request->category_english_name.' ] has been updated.');
	}
	public function delete($parentId,$catId)
	{
		$category = Category::find($catId);
		$category->delete();
		return redirect()->back()->with('message','category has been Deleted.');
	}
	public function forceDelete($cat_id){
		$category = Category::onlyTrashed()->find($cat_id);
		if($category->cat_image != NULL){
				if(file_exists( public_path('uploads/cats/images/').$category->cat_image))
					{
					    unlink(public_path('uploads/cats/images/').$category->cat_image);
					}
			}

		$labels = Formlabel::where('category_id',$cat_id)->withTrashed()->get();
		if(count($labels) > 0){
			foreach($labels as $label){
				$forminputs = Forminput::where('formlabel_id',$label->id)->withTrashed()->get();
					if(count($forminputs)>0){
						foreach($forminputs as $inputs){
						$inputs->forceDelete();
					  }
					}
				$label->forceDelete();
			}
		}		
		$category->forceDelete();
		return redirect()->back()->with('message','Sub category has been force Deleted.');
	}
	public function restore($cat_id){
		$category = Category::onlyTrashed()->find($cat_id);
		$category->restore();
		return redirect()->back()->with('message','Sub category has been restored.');
	}
}
